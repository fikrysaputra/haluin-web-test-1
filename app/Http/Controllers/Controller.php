<?php

namespace App\Http\Controllers;

use App\Models\MenuCMS;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function getMenus()
    {
        $user = Auth::user();
        
        if (!$user || !$user->role) {
            return collect();
        }

        $role = $user->role;
        
        // Ambil menu berdasarkan role user
        $menus = MenuCMS::whereIn('id', $role->menus->pluck('id'))
                    ->where('main_id', 0) // Hanya menu induk
                    ->with(['children' => function($query) use ($role) {
                        $query->whereIn('id', $role->menus->pluck('id'))
                              ->orderBy('orderno');
                    }])
                    ->orderBy('orderno')
                    ->get();

        return $menus;
    }
}
