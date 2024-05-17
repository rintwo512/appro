<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    protected $table = 'submenus';

    protected $fillable = [
        'menu_id',
        'submenu_label',
        'submenu_url',
        'submenu_icon',
        'submenu_location',
        'is_active',
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_submenu');
    }

    public function users()
    {
        return $this->belongsToMany(Menu::class, 'menu_submenu');
    }

    // public function features()
    // {
    //     return $this->belongsToMany(Feature::class, 'submenu_feature', 'submenu_id', 'feature_id');
    // }



    public function menu1()
    {
        return $this->belongsTo(Menu::class);
    }

    public function features1()
    {
        return $this->hasMany(Feature::class, 'submenu_id');
    }

    public function users1()
    {
        return $this->belongsToMany(User::class, 'user_submenu');
    }

    public function featuresLogbook()
    {
        return $this->hasMany(FeatureLogbook::class, 'submenu_id');
    }
}
