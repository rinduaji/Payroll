<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Login extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','jabatan','perner','user_id','nama','area','layanan','status_kontrak','jenis_kelamin','status_perkawinan',
        'nomer_jamsostek','asuransi_kesehatan','kelas_asuransi','no_asuransi','tgl_kontrak','tgl_endkontrak','jumlah_anak',
        'ppjp','bank','norek','an_norek','digit_rek','npwp',
        'created_at','updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
