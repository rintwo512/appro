<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'type',
        'action',
        'btn_id',
        'class',
        'icon',
        'toggle',
        'target',
        'location',
    ];
}
