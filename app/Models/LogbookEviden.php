<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogbookEviden extends Model
{
    use HasFactory;
    protected $table = 'logbook_evidens';
    protected $fillable = ['filename', 'path'];

    public function logbook()
    {
        return $this->belongsTo(Logbook::class);
    }
}
