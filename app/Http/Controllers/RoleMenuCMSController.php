<?php

namespace App\Http\Controllers;

use App\Models\MenuCMS;
use App\Models\Role;
use App\Models\RoleMenuCMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class RoleMenuCMSController extends Controller
{
    public function index()
    {
        return view('cms.setup.rolemenus.index', [
            'title' => 'Setup Role Menu CMS',
            // 'roleMenus' => RoleMenuCMS::latest()->paginate(5)
        ]);
    }

    public function getRoleMenus(){
        $data = Role::latest();
        return DataTables::of($data)
            ->addColumn('action', function ($rolemenu) {
                return '<a href="/setup/rolemenus/' . $rolemenu->id . '/edit" class="px-4 mb-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-cyan-500 text-white hover:bg-cyan-600"><i class="ti ti-pencil"></i>Edit</a>';
            })
            ->addColumn('name', function ($rolemenu) {
                return $rolemenu->name;
            })
            ->addColumn('description', function ($rolemenu) {
                return $rolemenu->description;
            })
            ->editColumn('created_at', function ($rolemenu) {
                return $rolemenu->created_at->diffForHumans();
            })
            ->editColumn('updated_at', function ($rolemenu) {
                return $rolemenu->updated_at->diffForHumans();
            })
            ->make(true);
    }

    public function edit($id) {
        $role = Role::with('menus')->findOrFail($id);
        $menus = MenuCMS::with('children')->where('main_id', 0)->get();
        $selectedMenus = RoleMenuCMS::where('role_id', $id)->pluck('menu_id')->toArray();

        return view('cms.setup.rolemenus.edit', [
            'title' => 'Edit Role Menu CMS',
            'role' => $role,
            'menus' => $menus,
            'selectedMenus' => $selectedMenus
        ]);
    }

    public function update(Request $request, $id){
        $role = Role::findOrFail($id);

        // Sinkronisasi menu dengan menghapus data lama dan menambahkan data baru
        RoleMenuCMS::where('role_id', $role->id)->delete();
    
        $menus = $request->input('menus', []);
        foreach ($menus as $menuId) {
            RoleMenuCMS::create([
                'role_id' => $role->id,
                'menu_id' => $menuId
            ]);
        }

        return Redirect::route('setup.rolemenus')->with('success', 'Role Menu updated successfully.');
    }
}
