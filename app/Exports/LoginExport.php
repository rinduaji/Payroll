<?php

namespace App\Exports;

use App\Models\Login;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoginExport implements FromCollection, WithHeadings
{
     /**
    * @return \Illuminate\Support\Collection
    */
    protected $jabatan;
    protected $layanan;
    protected $area;

    function __construct($jabatan, $layanan, $area) {
        $this->jabatan = $jabatan;
        $this->layanan = $layanan;
        $this->area = $area;
    }

    public function collection()
    {
        return Login::where('jabatan',$this->jabatan)->where('layanan',$this->layanan)->where('area',$this->area)->get(
            ['layanan','area','jabatan','perner','nama','nik','status_kontrak','jenis_kelamin','status_perkawinan',
            'jumlah_anak','nomer_jamsostek','asuransi_kesehatan','kelas_asuransi','no_asuransi','tgl_kontrak','tgl_endkontrak','ppjp',
            'jamsostek_base','ump_area','gaji_pokok','tunjangan_jabatan','bank','norek','an_norek','digit_rek','npwp']
        );
    }

    public function headings()
    {
        return ['layanan','area','jabatan','perner','nama','nik','status_kontrak','jenis_kelamin','status_perkawinan',
        'jumlah_anak','nomer_jamsostek','asuransi_kesehatan','kelas_asuransi','no_asuransi','tgl_kontrak','tgl_endkontrak','ppjp',
        'jamsostek_base','ump_area','gaji_pokok','tunjangan_jabatan','bank','norek','an_norek','digit_rek','npwp'];
    }
}
