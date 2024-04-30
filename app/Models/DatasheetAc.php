<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatasheetAc extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'datasheet_ac';

    protected $fillable =
    [
        'ac_id',
        'daya_pk',
        'daya_listrik',
        'refrigerant',
        'product',
        'current',
        'phase',
        'daya_pendingin',
        'pipa',
        'seri_indoor',
        'seri_outdoor',
        'kebisingan_indoor',
        'kebisingan_outdoor',
        'dimensi_indoor',
        'dimensi_outdoor',
        'berat_indoor',
        'berat_outdoor',
        'deleted_at',
    ];

    public function ac()
    {
        return $this->belongsTo(Ac::class, 'ac_id', 'id');
    }
}
