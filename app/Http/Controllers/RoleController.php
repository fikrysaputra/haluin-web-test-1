<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        return view('cms.setup.roles.index', [
            'title' => 'Setup Roles',
            // 'roles' => Role::latest()->paginate(5)
        ]);
    }

    public function getRoles()
    {
        $data = Role::latest()->get();
        return DataTables::of($data)
            ->addColumn('action', function ($role) {
                return '<a href="/setup/roles/' . $role->id . '/edit" class=" px-4 mb-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-cyan-500 text-white hover:bg-cyan-600"><i class="ti ti-pencil"></i>Edit</a>
                        <a href="/setup/roles/' . $role->id . '/confirm-delete" class=" px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md bg-red-500 text-white hover:bg-red-600"><i class="ti ti-trash"></i>Delete</a>';
            })
            ->editColumn('created_at', function ($role) {
                return $role->created_at->diffForHumans();
            })
            ->editColumn('updated_at', function ($role) {
                return $role->updated_at->diffForHumans();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('cms.setup.roles.create', [
            'title' => 'Create Role',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required']
        ]);
        Role::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        // return redirect('/roles')->with('session', 'Role has been created.');
        return Redirect::route('setup.roles')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        // dd($id);
        return view('cms.setup.roles.edit', [
            'title' => 'Edit Role',
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required']
        ]);

        $role->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => now()
        ]);

        return Redirect::route('setup.roles')->with('success', 'Role updated successfully.');
    }

    public function confirmDelete($id)
    {
        $role = Role::findOrFail($id); // Temukan data berdasarkan ID
        return view('cms.setup.roles.confirm-delete',[
            'title' => 'Hapus Role',
            'role' => $role
        ]);
    }
    
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if ($role->users()->exists()) {
        // Jika ada, kembalikan ke halaman sebelumnya dengan pesan error
        return redirect()->route('setup.roles')
                        ->with('error', 'Failed to delete! This role is still in use by the user.');
        }

        $role->delete(); // Hapus data

        return redirect()->route('setup.roles')->with('success', 'Role deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $roleIds = explode(',', $request->input('ids'));

        $deletedCount = 0;
        $failedRoles = [];

        // Lakukan iterasi untuk setiap ID
        foreach ($roleIds as $id) {
            $role = Role::find($id); // Gunakan find() agar tidak error jika ID tidak valid

            if ($role) {
                // Cek apakah role masih digunakan oleh user
                if ($role->users()->exists()) {
                    // Jika ya, tambahkan nama role ke array gagal
                    $failedRoles[] = $role->name; // Asumsi ada kolom 'name' di tabel roles
                } else {
                    // Jika tidak, hapus role tersebut
                    $role->delete();
                    $deletedCount++;
                }
            }
        }

        // Siapkan pesan untuk ditampilkan ke user
        $messages = [];
        if ($deletedCount > 0) {
            $messages['success'] = "Berhasil menghapus {$deletedCount} role.";
        }

        if (!empty($failedRoles)) {
            $roleNames = implode(', ', $failedRoles);
            $messages['error'] = "Gagal menghapus role berikut karena masih digunakan: {$roleNames}.";
        }

        // Redirect kembali dengan pesan yang sesuai
        return redirect()->route('setup.roles')->with($messages);
    }
}
