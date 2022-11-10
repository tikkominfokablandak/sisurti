<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisis';

    protected $fillable = [
        'id_disp_ke',
        'disp_ket',
        'disp_note_sekretaris',
        'disp_note_kadis',
        'disp_pesan',
        'tgl_disp',
        'disp_jawaban',
        'id_status',
        'id_create'
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y H:i:s');
    }
}
