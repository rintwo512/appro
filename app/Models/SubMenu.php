<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    protected $table = 'submenus';

    protected $fillable = [
        'submenu_label',
        'submenu_url',
        'submenu_icon',
        'submenu_location',
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_submenu');
    }

    // public function features()
    // {
    //     return $this->belongsToMany(Feature::class, 'submenu_feature', 'submenu_id', 'feature_id');
    // }
}
