<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKoperasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_koperasi',
        'nik',
        'nib',
        'npwp',
        'jenis_koperasi',
    ];
}
