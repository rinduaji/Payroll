<?php

namespace App\Exports;

use App\Models\Gaji;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class GajiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $periode;
    protected $layanan;
    protected $area;

    function __construct($periode, $layanan, $area) {
        $this->periode = $periode;
        $this->layanan = $layanan;
        $this->area = $area;
    }

    public function collection()
    {
        return Gaji::where('periode',$this->periode)->where('layanan',$this->layanan)->where('area',$this->area)->get(
            ['periode','layanan','area','jabatan','perner','nama','nik','status_kontrak','jenis_kelamin','status_perkawinan',
            'jumlah_anak','nomer_jamsostek','asuransi_kesehatan','kelas_asuransi','no_asuransi','tgl_kontrak','tgl_endkontrak','ppjp',
            'jamsostek_base','ump_area','gaji_pokok','tunjangan_jabatan','tunjangan_keahlian','tunjangan_bahasa','tunjangan_pulsa',
            'tunjangan_project','tunjangan_operasional','penyesuain_fix','keterangan_penyesuaian','total_fixed','hk_layanan','hk_real',
            'opname','keterangan_aktif','intensif_kehadiran','reward_kehadiran','t_produktivitas','t_kualitas','progresiv1','progresiv3',
            'progresiv6','reward_prestasi','t_makan','tot_t_makan','t_transport','upah_phl','t_prestasi','ot1','jml_ot1','ot2','jml_ot2',
            'ot3','jml_ot3','ot4','jml_ot4','lembur_maks','jml_ot','total_ot','lembur_aux','lembur_lain','lembur_khusus','lembur_natura',
            'hk_sa','sa','total_sa','penyesuaian_variabel','ket_variabel','total_variabel','tak','adjust_thr','thp','bank','norek',
            'an_norek','digit_rek','npwp']
        );
    }

    public function headings()
    {
        return ['periode','layanan','area','jabatan','perner','nama','nik','status_kontrak','jenis_kelamin','status_perkawinan',
        'jumlah_anak','nomer_jamsostek','asuransi_kesehatan','kelas_asuransi','no_asuransi','tgl_kontrak','tgl_endkontrak','ppjp',
        'jamsostek_base','ump_area','gaji_pokok','tunjangan_jabatan','tunjangan_keahlian','tunjangan_bahasa','tunjangan_pulsa',
        'tunjangan_project','tunjangan_operasional','penyesuain_fix','keterangan_penyesuaian','total_fixed','hk_layanan','hk_real',
        'opname','keterangan_aktif','intensif_kehadiran','reward_kehadiran','t_produktivitas','t_kualitas','progresiv1','progresiv3',
        'progresiv6','reward_prestasi','t_makan','tot_t_makan','t_transport','upah_phl','t_prestasi','ot1','jml_ot1','ot2','jml_ot2',
        'ot3','jml_ot3','ot4','jml_ot4','lembur_maks','jml_ot','total_ot','lembur_aux','lembur_lain','lembur_khusus','lembur_natura',
        'hk_sa','sa','total_sa','penyesuaian_variabel','ket_variabel','total_variabel','tak','adjust_thr','thp','bank','norek',
        'an_norek','digit_rek','npwp'];
    }
}
