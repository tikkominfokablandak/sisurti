<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Log_surat extends Model
{
    use HasFactory;

    protected $table = 'logsurats';

    protected $fillable = [
        'id_sm',
        'id_sk',
        'id_tujuan',
        'id_pengirim',
        'id_tembusan',
        'id_verifikator',
        'id_ttd',
        'id_disposisi',
        'disp_ket',
        'disp_pesan',
        'id_status',
        'id_create'
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y H:i:s');
    }
}
