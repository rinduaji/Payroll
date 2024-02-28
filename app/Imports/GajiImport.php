<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Gaji;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GajiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Gaji([
            'periode' => $row["periode"],
            'layanan' => $row["layanan"],
            'area' => $row["area"],
            'jabatan' => $row["jabatan"],
            'perner' => $row["perner"],
            'nama' => $row["nama"],
            'nik' => $row["nik"],
            'status_kontrak' => $row["status_kontrak"],
            'jenis_kelamin' => $row["jenis_kelamin"],
            'status_perkawinan' => $row["status_perkawinan"],
            'jumlah_anak' => $row["jumlah_anak"],
            'nomer_jamsostek' => $row["nomer_jamsostek"],
            'asuransi_kesehatan' => $row["asuransi_kesehatan"],
            'kelas_asuransi' => $row["kelas_asuransi"],
            'no_asuransi' => $row["no_asuransi"],
            'tgl_kontrak' => $row["tgl_kontrak"],
            'tgl_endkontrak' => $row["tgl_endkontrak"],
            'ppjp' => $row["ppjp"],
            'jamsostek_base' => $row["jamsostek_base"],
            'ump_area' => $row["ump_area"],
            'gaji_pokok' => $row["gaji_pokok"],
            'tunjangan_jabatan' => $row["tunjangan_jabatan"],
            'tunjangan_keahlian' => $row["tunjangan_keahlian"],
            'tunjangan_bahasa' => $row["tunjangan_bahasa"],
            'tunjangan_pulsa' => $row["tunjangan_pulsa"],
            'tunjangan_project' => $row["tunjangan_project"],
            'tunjangan_operasional' => $row["tunjangan_operasional"],
            'penyesuain_fix' => $row["penyesuain_fix"],
            'keterangan_penyesuaian' => $row["keterangan_penyesuaian"],
            'total_fixed' => $row["total_fixed"],
            'hk_layanan' => $row["hk_layanan"],
            'hk_real' => $row["hk_real"],
            'opname' => $row["opname"],
            'keterangan_aktif' => $row["keterangan_aktif"],
            'intensif_kehadiran' => $row["intensif_kehadiran"],
            'reward_kehadiran' => $row["reward_kehadiran"],
            't_produktivitas' => $row["t_produktivitas"],
            't_kualitas' => $row["t_kualitas"],
            'progresiv1' => $row["progresiv1"],
            'progresiv3' => $row["progresiv3"],
            'progresiv6' => $row["progresiv6"],
            'reward_prestasi' => $row["reward_prestasi"],
            't_makan' => $row["t_makan"],
            'tot_t_makan' => $row["tot_t_makan"],
            't_transport' => $row["t_transport"],
            'upah_phl' => $row["upah_phl"],
            't_prestasi' => $row["t_prestasi"],
            'ot1' => $row["ot1"],
            'jml_ot1' => $row["jml_ot1"],
            'ot2' => $row["ot2"],
            'jml_ot2' => $row["jml_ot2"],
            'ot3' => $row["ot3"],
            'jml_ot3' => $row["jml_ot3"],
            'ot4' => $row["ot4"],
            'jml_ot4' => $row["jml_ot4"],
            'lembur_maks' => $row["lembur_maks"],
            'jml_ot' => $row["jml_ot"],
            'total_ot' => $row["total_ot"],
            'lembur_aux' => $row["lembur_aux"],
            'lembur_lain' => $row["lembur_lain"],
            'lembur_khusus' => $row["lembur_khusus"],
            'lembur_natura' => $row["lembur_natura"],
            'hk_sa' => $row["hk_sa"],
            'sa' => $row["sa"],
            'total_sa' => $row["total_sa"],
            'penyesuaian_variabel' => $row["penyesuaian_variabel"],
            'ket_variabel' => $row["ket_variabel"],
            'total_variabel' => $row["total_variabel"],
            'tak' => $row["tak"],
            'adjust_thr' => $row["adjust_thr"],
            'thp' => $row["thp"],
            'bank' => $row["bank"],
            'norek' => $row["norek"],
            'an_norek' => $row["an_norek"],
            'digit_rek' => $row["digit_rek"],
            'npwp' => $row["npwp"],
            'created_at' => Carbon::now() ,
            'updated_at' => Carbon:: now()
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
