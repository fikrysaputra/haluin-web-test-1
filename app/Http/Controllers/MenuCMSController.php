<?php

namespace App\Http\Controllers;

use App\Models\MenuCMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class MenuCMSController extends Controller
{
    public function index()
    {
        return view('cms.setup.menu-cms.index', [
            'title' => 'Setup Menu CMS',
            'menucms' => MenuCMS::latest()->paginate(5)
        ]);
    }

    public function getMenuCMS(){
        $data = MenuCMS::latest();
        return DataTables::of($data)
            ->addColumn('action', function ($menu) {
                return '<a href="/setup/menu-cms/' . $menu->id . '/edit" class="px-4 mb-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-cyan-500 text-white hover:bg-cyan-600"><i class="ti ti-pencil"></i>Edit</a>
                        <a href="/setup/menu-cms/' . $menu->id . '/confirm-delete" class="px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md bg-red-500 text-white hover:bg-red-600"><i class="ti ti-trash"></i>Delete</a>';
            })
            ->addColumn('is_induk', function ($menu) {
                $menu_induk = '<span class="inline-flex items-center px-3 rounded-2xl font-semibold bg-blue-500 text-white">Main Menu</span>';
                $menu_sub = '<span class="inline-flex items-center px-3 rounded-2xl font-semibold text-white bg-green-500">Submenu</span>';
                if ($menu->main_id == 0){
                    return $menu_induk;
                } else {
                    return $menu_sub;
                }
            })
            ->addColumn('status', function ($menu) {
                // Tambahkan logika untuk menandai induk
                return $menu->published == 1 ? 'Active' : 'Inactive';
            })
            ->editColumn('created_at', function ($menu) {
                return $menu->created_at->diffForHumans();
            })
            ->editColumn('updated_at', function ($menu) {
                return $menu->updated_at->diffForHumans();
            })
            ->rawColumns(['action','is_induk'])
            ->make(true);
    }

    public function create()
    {
        return view('cms.setup.menu-cms.create', [
            'title' => 'Create Menu',
            'menu_induk' => MenuCMS::where('main_id','0')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'orderno' => ['required', 'numeric'],
            'main_id' => ['required'],
            'published' => ['required']
        ]);
        MenuCMS::create([
            'name' => $request->name,
            'description' => $request->description,
            'orderno' => $request->orderno,
            'main_id' => $request->main_id,
            'link' => $request->link,
            'icon' => $request->icon,
            'published' => $request->published
        ]);

        return Redirect::route('setup.menu-cms')->with('success', 'Menu created successfully');
    }

    public function edit(MenuCMS $menuCm)
    {
        return view('cms.setup.menu-cms.edit', [
            'title' => 'Edit Menu CMS',
            'menu' => $menuCm,
            'menu_induk' => MenuCMS::where('main_id','0')->get()
        ]);
    }

    public function update(Request $request, MenuCMS $menuCm)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'orderno' => ['required', 'numeric'],
            'main_id' => ['required'],
            'published' => ['required']
        ]);

        $menuCm->update([
            'name' => $request->name,
            'description' => $request->description,
            'orderno' => $request->orderno,
            'main_id' => $request->main_id,
            'link' => $request->link,
            'icon' => $request->icon,
            'published' => $request->published
        ]);

        return redirect()->route('setup.menu-cms')->with('success', 'Menu updated successfully');
    }

    public function confirmDelete($id)
    {
        $menu = MenuCMS::findOrFail($id); // Temukan data berdasarkan ID
        return view('cms.setup.menu-cms.confirm-delete',[
            'title' => 'Delete Menu CMS',
            'menu' => $menu,
            'menu_induk' => MenuCMS::where('main_id','0')->get()
        ]);
    }

    public function destroy($id)
    {
        $menu = MenuCMS::findOrFail($id);

        if ($menu->roleMenus()->exists()) {
        // Jika ada, kembalikan ke halaman sebelumnya dengan pesan error
        return redirect()->route('setup.menu-cms')
                        ->with('error', 'Failed to delete! This menu is still in use.');
        }

        $menu->delete(); // Hapus data

        return redirect()->route('setup.menu-cms')->with('success', 'Menu deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $menuIds = explode(',', $request->input('ids'));

        $deletedCount = 0;
        $failedMenus = [];

        // Lakukan iterasi untuk setiap ID
        foreach ($menuIds as $id) {
            $menu = MenuCMS::find($id); // Gunakan find() agar tidak error jika ID tidak valid

            if ($menu) {
                // Cek apakah menu masih digunakan
                if ($menu->roleMenus()->exists()) {
                    // Jika ya, tambahkan nama menu ke array gagal
                    $failedMenus[] = $menu->name; // Asumsi ada kolom 'name' di tabel menu
                } else {
                    // Jika tidak, hapus menu tersebut
                    $menu->delete();
                    $deletedCount++;
                }
            }
        }

        // Siapkan pesan untuk ditampilkan ke user
        $messages = [];
        if ($deletedCount > 0) {
            $messages['success'] = "Berhasil menghapus {$deletedCount} menu.";
        }

        if (!empty($failedMenus)) {
            $menuNames = implode(', ', $failedMenus);
            $messages['error'] = "Gagal menghapus menu berikut karena masih digunakan: {$menuNames}.";
        }

        // Redirect kembali dengan pesan yang sesuai
        return redirect()->route('setup.menu-cms')->with($messages);
    }
}
