<?php

namespace App\Models;

use App\Models\Login;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variabel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' ,'login_id' ,'periode' ,'perner' ,'status_kontrak','jamsostek_base' ,'ump_area','gaji_pokok','tunjangan_jabatan','tunjangan_keahlian' ,'tunjangan_bahasa' ,'tunjangan_pulsa' ,'tunjangan_project' ,
        'tunjangan_operasional' ,'penyesuain_fix' ,'keterangan_penyesuaian' ,'total_fixed' ,'hk_layanan' ,'hk_real' ,'opname' ,
        'keterangan_aktif' ,'intensif_kehadiran' ,'rumus_reward_kehadiran' ,'reward_kehadiran' ,'t_produktivitas' ,'t_kualitas' ,'progresiv1' ,'progresiv3' ,
        'progresiv6' ,'reward_prestasi' ,'t_makan' ,'tot_t_makan' ,'t_transport' ,'upah_phl' ,'t_prestasi' ,'ot1' ,'jml_ot1' ,'ot2' ,
        'jml_ot2' ,'ot3' ,'jml_ot3' ,'ot4' ,'jml_ot4' ,'lembur_maks' ,'jml_ot' ,'total_ot' ,'lembur_aux' ,'lembur_lain' ,
        'lembur_khusus' ,'lembur_natura' ,'hk_sa' ,'sa' ,'total_sa' ,'penyesuaian_variabel' ,'ket_variabel' ,'total_variabel' ,
        'tak' ,'adjust_thr' ,'thp' , 'jamsostek_tanggung_karyawan', 'pph_tanggung_karyawan', 'potongan_bpjs', 
        'potongan_karyawan_jht_jp', 'thp_karyawan_bpjs_jht_jp', 'created_at' ,'updated_at'
    ];
    

    public function login()
    {
        return $this->belongsTo(Login::class, 'login_id', 'id');
    }
}
