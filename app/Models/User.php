<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'user_menu');
    }


    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id', 'id_jabatan');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'pivot_feature');
    }

    public function ac()
    {
        return $this->hasOne(Ac::class);
    }

    public function logbooks()
    {
        return $this->belongsToMany(Logbook::class, 'user_logbook');
    }

    public function submenus()
    {
        return $this->belongsToMany(SubMenu::class, 'menu_submenu', 'menu_id', 'submenu_id', 'user_id');
    }




    public function menus1()
    {
        return $this->belongsToMany(Menu::class, 'user_menu');
    }

    public function submenus1()
    {
        return $this->belongsToMany(SubMenu::class, 'user_submenu');
    }

    public function features1()
    {
        return $this->belongsToMany(Feature::class, 'user_feature');
    }
}
