<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ac extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ac';

    protected $fillable =
    [
        'user_id',
        'id_ac',
        'asset',
        'wing',
        'lantai',
        'ruangan',
        'status',
        'merk',
        'type',
        'jenis',
        'catatan',
        'kerusakan',
        'keterangan',
        'tgl_pemasangan',
        'petugas_pemasangan',
        'tgl_maintenance',
        'petugas_maint',
        'user_updated',
        'user_updated_time',
        'is_delete',
        'deleted_at',
        'qr_code',
    ];

    public function datasheetAc()
    {
        return $this->hasOne(DatasheetAc::class, 'ac_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
