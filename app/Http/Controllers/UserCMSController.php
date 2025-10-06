<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class UserCMSController extends Controller
{
    public function index()
    {
        return view('cms.setup.user-cms.index', [
            'title' => 'Setup User CMS',
            // 'users' => User::latest()->paginate(5)
        ]);
    }

    public function getUserCMS()
    {
        $data = User::latest()->get();
        return DataTables::of($data)
            ->addColumn('action', function ($user) {
                return '<a href="/setup/user-cms/' . $user->id . '/edit" class=" px-4 mb-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-cyan-500 text-white hover:bg-cyan-600"><i class="ti ti-pencil"></i>Edit</a>
                        <a href="/setup/user-cms/' . $user->id . '/confirm-delete" class=" px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md bg-red-500 text-white hover:bg-red-600"><i class="ti ti-trash"></i>Delete</a>';
            })
            ->addColumn('role_name', function ($user) {
                return $user->role->name;
            })
            ->addColumn('status', function ($user) {
                $status = $user->is_active;
                $status_name_active = '<span class="inline-flex items-center px-3 rounded-2xl font-semibold text-white bg-green-500">Aktif</span>';
                $status_name_nonactive = '<span class="inline-flex items-center px-3 rounded-2xl font-semibold text-white bg-red-500">Tidak Aktif</span>';
                if ($status == 1){
                    return $status_name_active;
                } else {
                    return $status_name_nonactive;
                }
            })
            ->editColumn('created_at', function ($user) {
                return $user->created_at->diffForHumans();
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    public function create()
    {
        return view('cms.setup.user-cms.create', [
            'title' => 'Create User CMS',
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required'],
            'username' => ['required', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'is_active' => ['required']
        ]);
        User::create([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active,
        ]);
        // return redirect('/roles')->with('session', 'Role has been created.');
        return Redirect::route('setup.user-cms')->with('success', 'User created successfully.');
    }
    
    public function edit(User $userCm)
    {
        return view('cms.setup.user-cms.edit', [
            'title' => 'Edit User CMS',
            'user' => $userCm,
            'roles' => Role::all()
        ]);
    }

    public function update(Request $request, User $userCm)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'role_id' => ['required'],
            'username' => ['required', 'max:255', 'unique:users,username,' . $userCm->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $userCm->id],
            'is_active' => ['required']
        ]);

        $userCm->update([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'username' => $request->username,
            'email' => $request->email,
            'is_active' => $request->is_active,
        ]);

        return Redirect::route('setup.user-cms')->with('success', 'User updated successfully.');
    }

    public function confirmDelete($id)
    {
        $user = User::findOrFail($id); // Temukan data berdasarkan ID
        return view('cms.setup.user-cms.confirm-delete',[
            'title' => 'Delete User CMS',
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->role_id == 1) {
            // Jika ada, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->route('setup.user-cms')
                ->with('error', 'Failed to delete! Role User is Administrator.');
        }

        $user->delete(); // Hapus data

        return redirect()->route('setup.user-cms')->with('success', 'User deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $userIds = explode(',', $request->input('ids'));

        $deletedCount = 0;
        $failedUsers = [];

        // Lakukan iterasi untuk setiap ID
        foreach ($userIds as $id) {
            $user = User::find($id); // Gunakan find() agar tidak error jika ID tidak valid

            if ($user) {
                // Jika tidak, hapus user tersebut
                $user->delete();
                $deletedCount++;
            }
            else {
                // Jika user tidak ditemukan, tambahkan ke daftar gagal
                $failedUsers[] = "User ID {$id} not found";
            }
        }

        // Siapkan pesan untuk ditampilkan ke user
        $messages = [];
        if ($deletedCount > 0) {
            $messages['success'] = "Berhasil menghapus {$deletedCount} user.";
        }

        if (!empty($failedUsers)) {
            $userNames = implode(', ', $failedUsers);
            $messages['error'] = "Gagal menghapus user berikut karena masih digunakan: {$userNames}.";
        }

        // Redirect kembali dengan pesan yang sesuai
        return redirect()->route('setup.user-cms')->with($messages);
    }
}
