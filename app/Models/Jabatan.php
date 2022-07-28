<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unitkerja;
use App\Models\Opd;
use App\Models\User;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatans';

    protected $fillable = [
        'id',
        'id_opd',
        'id_unitkerja',
        'nama_jabatan',
        'induk_jabatan'
    ];

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }

    public function unitkerja()
    {
        return $this->belongsTo(Unitkerja::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
