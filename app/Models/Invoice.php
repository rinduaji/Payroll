<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' ,'jabatan','perner','user_id','nama','area','layanan','status_kontrak','jenis_kelamin','status_perkawinan',
        'nomer_jamsostek','asuransi_kesehatan','kelas_asuransi','no_asuransi','tgl_kontrak','tgl_endkontrak','jumlah_anak',
        'ppjp','ump_area','gaji_pokok','tunjangan_jabatan','bank','norek','an_norek','digit_rek','npwp', 'jamsostek_base','login_id' ,
        'periode' ,'tunjangan_keahlian' ,'tunjangan_bahasa' ,'tunjangan_pulsa' ,'tunjangan_project' ,
        'tunjangan_operasional' ,'penyesuain_fix' ,'keterangan_penyesuaian' ,'total_fixed' ,'hk_layanan' ,'hk_real' ,'opname' ,
        'keterangan_aktif' ,'intensif_kehadiran' ,'reward_kehadiran' ,'t_produktivitas' ,'t_kualitas' ,'progresiv1' ,'progresiv3' ,
        'progresiv6' ,'reward_prestasi' ,'t_makan' ,'tot_t_makan' ,'t_transport' ,'upah_phl' ,'t_prestasi' ,'ot1' ,'jml_ot1' ,'ot2' ,
        'jml_ot2' ,'ot3' ,'jml_ot3' ,'ot4' ,'jml_ot4' ,'lembur_maks' ,'jml_ot' ,'total_ot' ,'lembur_aux' ,'lembur_lain' ,
        'lembur_khusus' ,'lembur_natura' ,'hk_sa' ,'sa' ,'total_sa' ,'penyesuaian_variabel' ,'ket_variabel' ,'total_variabel' ,
        'tak' ,'adjust_thr' ,'thp' , 'jamsostek_tanggung_karyawan', 'pph_tanggung_karyawan', 'potongan_bpjs', 
        'potongan_karyawan_jht_jp', 'thp_karyawan_bpjs_jht_jp', 'created_at','updated_at'
    ];

}
