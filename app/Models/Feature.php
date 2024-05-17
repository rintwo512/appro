<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'submenu_id',
        'name',
        'is_active',
        'icon',
        'location',
    ];



    public function submenu1()
    {
        return $this->belongsTo(SubMenu::class);
    }

    public function users1()
    {
        return $this->belongsToMany(User::class, 'user_feature');
    }
}
