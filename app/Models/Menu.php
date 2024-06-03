<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_label',
        'menu_url',
        'menu_icon',
        'menu_location',
        'is_active',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_menu');
    }

    public function submenus()
    {
        return $this->belongsToMany(SubMenu::class, 'menu_submenu', 'menu_id', 'submenu_id');
    }


    // public function features()
    // {
    //     return $this->belongsToMany(Feature::class, 'pivot_feature');
    // }

    public function submenus1()
    {
        return $this->hasMany(Submenu::class, 'menu_id');
    }

    public function users1()
    {
        return $this->belongsToMany(User::class, 'user_menu');
    }
}
