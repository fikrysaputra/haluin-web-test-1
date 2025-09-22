<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MenuCMS extends Model
{
    use HasFactory;

    protected $table = 'menu_cms';

    protected $guarded = ['id'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_menu_cms', 'menu_id', 'role_id');
    }

    public function parent()
    {
        return $this->belongsTo(MenuCMS::class, 'main_id');
    }

    public function children()
    {
        return $this->hasMany(MenuCMS::class, 'main_id')->orderBy('orderno');
    }
}
