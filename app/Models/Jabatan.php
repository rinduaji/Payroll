<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' ,'id_layanan' ,'nama_jabatan' ,'gaji_pokok' ,'t_jabatan', 'created_at' ,'updated_at'
    ];
}
