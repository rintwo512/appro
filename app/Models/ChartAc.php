<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartAc extends Model
{
    use HasFactory;
    protected $table = 'chart_ac';
    protected $fillable = [
        'tahun',
        'bulan',
        'total'
    ];
}
