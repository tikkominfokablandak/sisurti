<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'suratmasuks';

    protected $fillable = [
        'id_pengirim',
        'nama_pengirim',
        'jabatan_pengirim',
        'instansi_pengirim',
        'id_jenissurat',
        'sifat_surat',
        'tingkat_urgen',
        'no_surat',
        'tgl_surat',
        'tgl_diterima',
        'perihal',
        'isi',
        'file_surat',
        'lamp_surat',
        'id_tujuan',
        'nama_tujuan',
        'jabatan_tujuan',
        'instansi_tujuan',
        'tembusan',
        'ket',
        'no_agenda',
        'id_status',
        'id_create'
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['tgl_surat'])->translateFormat('l, d F Y');
    }
}
