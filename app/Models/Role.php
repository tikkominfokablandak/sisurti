<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'nama_role',
        'ket',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
