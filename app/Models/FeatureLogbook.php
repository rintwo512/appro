<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureLogbook extends Model
{
    use HasFactory;
    protected $table = 'features_logbook';

    protected $fillable =
    [
        'submenu_id',
        'name',
        'is_active',
        'icon',
        'location',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_feature_logbook', 'feature_logbook_id', 'user_id')
            ->withTimestamps();
    }

    public function submenu()
    {
        return $this->belongsTo(SubMenu::class);
    }
}
