<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMenuCMS extends Model
{
    use HasFactory;

    protected $table = 'role_menu_cms';

    protected $guarded = ['id'];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function menu() {
        return $this->belongsTo(MenuCMS::class);
    }
}
