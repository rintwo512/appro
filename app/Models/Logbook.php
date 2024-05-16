<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logbook extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'logbook';

    protected $fillable =
    [
        'nama_tugas',
        'wing',
        'lantai',
        'lokasi',
        'tanggal',
        'status',
        'prioritas',
        'kategori',
        'jenis_pekerjaan',
        'type',
        'keterangan',
        'user_updated',
        'user_updated_time',
        'is_delete',
        'deleted_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_logbook');
    }

    public function evidens()
    {
        return $this->hasMany(LogbookEviden::class);
    }
}
