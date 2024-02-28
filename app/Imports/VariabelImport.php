<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Login;
use App\Models\Variabel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VariabelImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    private $baris = 0;
    private $penjelasan = "";

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
           $perner = $row["perner"];

           
           $login = Login::where('perner', $perner)->first();
           if(isset($login->id)) {
                $queryGajiPokokTJabatan = Login::join('layanans', 'layanans.nama_layanan', '=', 'logins.layanan')
                ->join('jabatans', 'jabatans.id_layanan', '=', 'layanans.id')
                ->select('logins.*', 'layanans.nama_layanan', 'layanans.segment', 'layanans.area','layanans.segment', 'layanans.kode','jabatans.nama_jabatan','jabatans.gaji_pokok','jabatans.t_jabatan')
                ->where('logins.perner', $perner)
                ->where('jabatans.nama_jabatan', $login->jabatan)
                ->where('layanans.area', $login->area)
                ->where('layanans.nama_layanan', $login->layanan)->first();

                $gaji_pokok = $queryGajiPokokTJabatan->gaji_pokok;
                $t_jabatan = $queryGajiPokokTJabatan->t_jabatan;

                $v_rumus_reward_kehadiran = 0;
                $v_jml_ot1 = 0;
                $v_jml_ot2 = 0;
                $v_jml_ot3 = 0;
                $v_jml_ot4 = 0;
                $v_tot_ot = 0;
                $v_total_fixed = 0;

                if($row["status_kontrak"] == "NEW" OR $row["status_kontrak"] == "RESIGN") {
                    $v_total_fixed = ($gaji_pokok + $t_jabatan + $row["tunjangan_keahlian"] + $row["tunjangan_bahasa"] 
                                    + $row["tunjangan_pulsa"] + $row["tunjangan_project"] + $row["tunjangan_operasional"]) 
                                    * ($row["hk_real"] / $row["hk_layanan"]);
                }
                else {
                    $v_total_fixed = ($gaji_pokok + $t_jabatan + $row["tunjangan_keahlian"] + $row["tunjangan_bahasa"] 
                                    + $row["tunjangan_pulsa"] + $row["tunjangan_project"] + $row["tunjangan_operasional"] + $row["penyesuain_fix"]); 
                }

                if($row["opname"] > 0) {
                    if($row["hk_real"] == "0") {
                        $v_rumus_reward_kehadiran = $row["intensif_kehadiran"];
                    }
                    elseif($row["hk_real"] == "1") {
                        $v_rumus_reward_kehadiran = $row["intensif_kehadiran"] * (75 / 100);
                    }
                    elseif($row["hk_real"] == "2") {
                        $v_rumus_reward_kehadiran = $row["intensif_kehadiran"] * (50 / 100);
                    }
                    elseif($row["hk_real"] == "3") {
                        $v_rumus_reward_kehadiran = $row["intensif_kehadiran"] * (25 / 100);
                    }
                    else {
                        $v_rumus_reward_kehadiran = 0;
                    }
                }

                $v_tot_t_ot = $gaji_pokok + $t_jabatan + $row["tunjangan_keahlian"] + $row["tunjangan_bahasa"] + $row["tunjangan_project"] + $row["tunjangan_operasional"];
                if($v_tot_t_ot > $row["ump_area"]) {
                    $v_jml_ot1 = (1 / 173) * ($v_tot_t_ot) * 1.5 * $row["ot1"];
                }
                else {
                    $v_jml_ot1 = (1 / 173) * ($row["ump_area"]) * 1.5 * $row["ot1"];
                }

                if($v_tot_t_ot > $row["ump_area"]) {
                    $v_jml_ot2 = (1 / 173) * ($v_tot_t_ot) * 2 * $row["ot2"];
                }
                else {
                    $v_jml_ot2 = (1 / 173) * ($row["ump_area"]) * 2 * $row["ot2"];
                }

                if($v_tot_t_ot > $row["ump_area"]) {
                    $v_jml_ot3 = (1 / 173) * ($v_tot_t_ot) * 3 * $row["ot3"];
                }
                else {
                    $v_jml_ot3 = (1 / 173) * ($row["ump_area"]) * 3 * $row["ot3"];
                }

                if($v_tot_t_ot > $row["ump_area"]) {
                    $v_jml_ot4 = (1 / 173) * ($v_tot_t_ot) * 4 * $row["ot4"];
                }
                else {
                    $v_jml_ot4 = (1 / 173) * ($row["ump_area"]) * 4 * $row["ot4"];
                }

                $v_jamsostek_base = ((($v_total_fixed - $row["tunjangan_pulsa"]) > $row["ump_area"]) ? ($v_total_fixed - $row["tunjangan_pulsa"]) : $row["ump_area"]);
                $v_tot_ot = $v_jml_ot1 + $v_jml_ot2 + $v_jml_ot3 + $v_jml_ot4;
                $v_total_sa = $row["hk_sa"] * $row["sa"];
                $v_total_variabel = ($row["t_produktivitas"] + $row["t_prestasi"] + $v_tot_ot + $v_total_sa + $row["penyesuaian_variabel"] + $row["t_kualitas"]);
                $v_thp = ($v_total_fixed + $row["progresiv1"] + $v_total_variabel + $row["tak"] + $row["adjust_thr"]);
                $v_thp_karyawan_bpjs_jht_jp = ($v_thp +  $row["jamsostek_tanggung_karyawan"] + $row["pph_tanggung_karyawan"] + $row["potongan_bpjs"]);
                $v_tot_t_makan = ($row["hk_layanan"] * $row["t_makan"]);
                $v_upah_phl = ($row["hk_layanan"] * $row["t_transport"]);

                $variabel = Variabel::create([
                        'login_id' => $login->id,
                        'periode' => $row["periode"],
                        'perner' => $row["perner"],
                        'status_kontrak' => $row["status_kontrak"],
                        'jamsostek_base' => $v_jamsostek_base,
                        'ump_area' => $row["ump_area"],
                        'gaji_pokok' => $gaji_pokok,
                        'tunjangan_jabatan' => $t_jabatan,
                        'tunjangan_keahlian' => $row["tunjangan_keahlian"],
                        'tunjangan_bahasa' => $row["tunjangan_bahasa"],
                        'tunjangan_pulsa' => $row["tunjangan_pulsa"],
                        'tunjangan_project' => $row["tunjangan_project"],
                        'tunjangan_operasional' => $row["tunjangan_operasional"],
                        'penyesuain_fix' => $row["penyesuain_fix"],
                        'keterangan_penyesuaian' => $row["keterangan_penyesuaian"],
                        'total_fixed' => $v_total_fixed,
                        'hk_layanan' => $row["hk_layanan"],
                        'hk_real' => $row["hk_real"],
                        'opname' => $row["opname"],
                        'keterangan_aktif' => $row["keterangan_aktif"],
                        'intensif_kehadiran' => $row["intensif_kehadiran"],
                        'rumus_reward_kehadiran' => $v_rumus_reward_kehadiran,
                        'reward_kehadiran' => $row["reward_kehadiran"],
                        't_produktivitas' => $row["t_produktivitas"],
                        't_kualitas' => $row["t_kualitas"],
                        'progresiv1' => $row["progresiv1"],
                        'progresiv3' => $row["progresiv3"],
                        'progresiv6' => $row["progresiv6"],
                        'reward_prestasi' => $row["reward_prestasi"],
                        't_makan' => $row["t_makan"],
                        'tot_t_makan' => $v_tot_t_makan,
                        't_transport' => $row["t_transport"],
                        'upah_phl' => $v_upah_phl,
                        't_prestasi' => $row["t_prestasi"],
                        'ot1' => $row["ot1"],
                        'jml_ot1' => $v_jml_ot1,
                        'ot2' => $row["ot2"],
                        'jml_ot2' => $v_jml_ot2,
                        'ot3' => $row["ot3"],
                        'jml_ot3' => $v_jml_ot3,
                        'ot4' => $row["ot4"],
                        'jml_ot4' => $v_jml_ot4,
                        'lembur_maks' => $row["lembur_maks"],
                        'jml_ot' => $row["jml_ot"],
                        'total_ot' => $v_tot_ot,
                        'lembur_aux' => $row["lembur_aux"],
                        'lembur_lain' => $row["lembur_lain"],
                        'lembur_khusus' => $row["lembur_khusus"],
                        'lembur_natura' => $row["lembur_natura"],
                        'hk_sa' => $row["hk_sa"],
                        'sa' => $row["sa"],
                        'total_sa' => $v_total_sa,
                        'penyesuaian_variabel' => $row["penyesuaian_variabel"],
                        'ket_variabel' => $row["ket_variabel"],
                        'total_variabel' => $v_total_variabel,
                        'tak' => $row["tak"],
                        'adjust_thr' => $row["adjust_thr"],
                        'thp' => $v_thp,
                        'jamsostek_tanggung_karyawan' => $row["jamsostek_tanggung_karyawan"],
                        'pph_tanggung_karyawan' => $row["pph_tanggung_karyawan"],
                        'potongan_bpjs' => $row["potongan_bpjs"],
                        'potongan_karyawana_jht_jp' => $row["potongan_karyawan_jht_jp"],
                        'thp_karyawan_bpjs_jht_jp' => $v_thp_karyawan_bpjs_jht_jp,
                        'created_at' => Carbon::now() ,
                        'updated_at' => Carbon:: now()
                ]);
                ++$this->baris;
           }
           else {
                $this->penjelasan = "login pada file excel ada yang tidak ada pada Menu pegawai";
           }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function getRowCount(): int
    {
        return $this->baris;
    }

    public function getPenjelasan()
    {
        return $this->penjelasan;
    }
}
