<style>
    table {
        border-style: solid;
    }

    th {
        font-weight: bold;
        text-transform: uppercase;
    }
</style>
<h4>DATA GAJI PT. INFOMEDIA NUSANTARA</h4>
<br>
<h4>SEGMENT : 5</h4>
<h4>TAGIHAN FIXED / VARIABEL {{ $layanan }}</h4>
<h4>SITE {{ $area }}</h4>
<h4>Periode : {{ $periode }}</h4>
<br>
<table class="table">
    <thead>
        <tr>
            <th rowspan="2">No.</th>
            <th colspan="3">Project</th>
            <th rowspan="2">Personal Number</th>
            <th colspan="12">Data Pribadi</th>
            <th rowspan="2">Jamsostek Base</th>
            <th rowspan="2">UMP Area</th>
            <th colspan="10">FIXED</th>
            <th colspan="38">Variabel</th>
            <th rowspan="2">TAK</th>
            <th rowspan="2">Adjust THR</th>
            <th rowspan="2">THP</th>
            <th rowspan="2">Jamsostek di tanggung karyawan</th>
            <th rowspan="2">PPH Ditanggung Karyawan</th>
            <th rowspan="2">Potongan BPJS (1%)</th>
            <th rowspan="2">Potongan Karyawan JHT DAN JP</th>
            <th rowspan="2">THP Diterima Karyawan - BPJS 1 %-JHT DAN JP</th>
            <th colspan="4">DATA BANK TRANSFER</th>
            <th rowspan="2">NPWP</th>
        </tr>
        <tr>
            <th>Layanan</th>
            <th>Area</th>
            <th>Jabatan</th>
            <th>Nama</th>
            <th>Status Kontrak</th>
            <th>Jenis Kelamin</th>
            <th>Menikah / Belum</th>
            <th>Jumlah Anak</th>
            <th>Nomor Jamsostek</th>
            <th>Asuransi Kesehatan(JPK / Asuransi)</th>
            <th>Kelas Asuransi</th>
            <th>No Asuransi / JPK</th>
            <th>Tanggal Mulai (Kontrak)</th>
            <th>End Kontrak</th>
            <th>PPJP</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan Jabatan</th>
            <th>Tunjangan Keahlian</th>
            <th>Tunjangan Bahasa</th>
            <th>Tunjangan Pulsa</th>
            <th>Tunjangan Project ( Laptop dan Internet )</th>
            <th>Tunjangan Operasional</th>
            <th>Penyesuain Fixed</th>
            <th>Keterangan Penyesuaian</th>
            <th>Total Fixed</th>
            <th>HK LAYANAN</th>
            <th>HK REAL</th>
            <th>Opname</th>
            <th>Keterangan (Resign / Aktif)</th>
            <th>Intensif Kehadiran</th>
            <th>Rumus Reward Kehadiran</th>
            <th>Reward Kehadiran</th>
            <th>Reward Produktivitas</th>
            <th>Sales Progressive N+1</th>
            <th>Sales Progressive N+3</th>
            <th>Sales Progressive N+6</th>
            <th>Reward Prestasi</th>
            <th>Tunjangan Makan</th>
            <th>Total Tunjangan Makan</th>
            <th>Tunjangan Transport</th>
            <th>UPAH PHL</th>
            <th>Tunjangan Prestasi</th>
            <th>OT1</th>
            <th>Juml OT1 (Rp)</th>
            <th>OT2</th>
            <th>Juml OT2 (Rp)</th>
            <th>OT3</th>
            <th>Juml OT3 (Rp)</th>
            <th>OT4</th>
            <th>Juml OT4 (Rp)</th>
            <th>LEMBUR Maksimal yg Di bayarkan</th>
            <th>Juml OT (Hours)</th>
            <th>Total OT (Rp)</th>
            <th>Lembur AUX</th>
            <th>Lembur Lain-lain</th>
            <th>Lembur Khusus</th>
            <th>Lembur Natura</th>
            <th>HK SA</th>
            <th>Shift Alowance</th>
            <th>Total Shift Allowance</th>
            <th>Penyesuaian Variabel</th>
            <th>Keterangan Variabel</th>
            <th>Total Variabel</th>
            <th>BANK</th>
            <th>Nomor Rekening</th>
            <th>An. Nomor Rekening</th>
            <th>Digit Rekening</th>

        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;

            $gaji_pokok = 0;
                $tunjangan_jabatan = 0;
                $tunjangan_keahlian = 0;
                $tunjangan_bahasa = 0;
                $tunjangan_pulsa = 0;
                $tunjangan_project = 0;
                $tunjangan_operasional = 0;
                $penyesuain_fix = 0;
                $keterangan_penyesuaian = 0;
                $total_fixed = 0;
                $hk_layanan = 0;
                $hk_real = 0;
                $opname = 0;
                $keterangan_aktif = 0;
                $intensif_kehadiran = 0;
                $rumus_reward_kehadiran = 0;
                $reward_kehadiran = 0;
                $t_produktivitas = 0;
                $progresiv1 = 0;
                $progresiv3 = 0;
                $progresiv6 = 0;
                $reward_prestasi = 0;
                $t_makan = 0;
                $tot_t_makan = 0;
                $t_transport = 0;
                $upah_phl = 0;
                $t_prestasi = 0;
                $ot1 = 0;
                $jml_ot1 = 0;
                $ot2 = 0;
                $jml_ot2 = 0;
                $ot3 = 0;
                $jml_ot3 = 0;
                $ot4 = 0;
                $jml_ot4 = 0;
                $lembur_maks = 0;
                $jml_ot = 0;
                $total_ot = 0;
                $lembur_aux = 0;
                $lembur_lain = 0;
                $lembur_khusus = 0;
                $lembur_natura = 0;
                $hk_sa = 0;
                $sa = 0;
                $total_sa = 0;
                $penyesuaian_variabel = 0;
                $ket_variabel = 0;
                $total_variabel = 0;
                $tak = 0;
                $adjust_thr = 0;
                $thp = 0;
                $jamsostek_tanggung_karyawan = 0;
                $pph_tanggung_karyawan = 0;
                $potongan_bpjs = 0;
                $potongan_karyawan_jht_jp = 0;
                $thp_karyawan_bpjs_jht_jp = 0;
        ?>
        @foreach($invoices as $invoice)
                <?php
                    $gaji_pokok += $invoice->gaji_pokok;
                $tunjangan_jabatan += $invoice->tunjangan_jabatan;
                $tunjangan_keahlian += $invoice->tunjangan_keahlian;
                $tunjangan_bahasa += $invoice->tunjangan_bahasa;
                $tunjangan_pulsa += $invoice->tunjangan_pulsa;
                $tunjangan_project += $invoice->tunjangan_project;
                $tunjangan_operasional += $invoice->tunjangan_operasional;
                $penyesuain_fix += $invoice->penyesuain_fix;
                // $keterangan_penyesuaian += (int) $invoice->keterangan_penyesuaian;
                $total_fixed += $invoice->total_fixed;
                $hk_layanan += $invoice->hk_layanan;
                $hk_real += $invoice->hk_real;
                $opname += $invoice->opname;
                // $keterangan_aktif += (int) $invoice->keterangan_aktif;
                $intensif_kehadiran += $invoice->intensif_kehadiran;
                $rumus_reward_kehadiran += $invoice->rumus_reward_kehadiran;
                $reward_kehadiran += $invoice->reward_kehadiran;
                $t_produktivitas += $invoice->t_produktivitas;
                $progresiv1 += $invoice->progresiv1;
                $progresiv3 += $invoice->progresiv3;
                $progresiv6 += $invoice->progresiv6;
                $reward_prestasi += $invoice->reward_prestasi;
                $t_makan += $invoice->t_makan;
                $tot_t_makan += $invoice->tot_t_makan;
                $t_transport += $invoice->t_transport;
                $upah_phl += $invoice->upah_phl;
                $t_prestasi += $invoice->t_prestasi;
                $ot1 += $invoice->ot1;
                $jml_ot1 += $invoice->jml_ot1;
                $ot2 += $invoice->ot2;
                $jml_ot2 += $invoice->jml_ot2;
                $ot3 += $invoice->ot3;
                $jml_ot3 += $invoice->jml_ot3;
                $ot4 += $invoice->ot4;
                $jml_ot4 += $invoice->jml_ot4;
                $lembur_maks += $invoice->lembur_maks;
                $jml_ot += $invoice->jml_ot;
                $total_ot += $invoice->total_ot;
                $lembur_aux += $invoice->lembur_aux;
                $lembur_lain += $invoice->lembur_lain;
                $lembur_khusus += $invoice->lembur_khusus;
                $lembur_natura += $invoice->lembur_natura;
                $hk_sa += $invoice->hk_sa;
                $sa += $invoice->sa;
                $total_sa += $invoice->total_sa;
                $penyesuaian_variabel += $invoice->penyesuaian_variabel;
                $ket_variabel += $invoice->ket_variabel;
                $total_variabel += $invoice->total_variabel;
                $tak += $invoice->tak;
                $adjust_thr += $invoice->adjust_thr;
                $thp += $invoice->thp;
                $jamsostek_tanggung_karyawan += $invoice->jamsostek_tanggung_karyawan;
                $pph_tanggung_karyawan += $invoice->pph_tanggung_karyawan;
                $potongan_bpjs += $invoice->potongan_bpjs;
                $potongan_karyawan_jht_jp += $invoice->potongan_karyawan_jht_jp;
                $thp_karyawan_bpjs_jht_jp += $invoice->thp_karyawan_bpjs_jht_jp;
                ?>
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $invoice->layanan }}</td>
                <td>{{ $invoice->area }}</td>
                <td>{{ $invoice->jabatan }}</td>
                <td>{{ $invoice->perner }}</td>
                <td>{{ $invoice->nama }}</td>
                <td>{{ $invoice->status_kontrak }}</td>
                <td>{{ $invoice->jenis_kelamin }}</td>
                <td>{{ $invoice->status_perkawinan }}</td>
                <td>{{ $invoice->jumlah_anak }}</td>
                <td>{{ $invoice->nomer_jamsostek }}</td>
                <td>{{ $invoice->asuransi_kesehatan }}</td>
                <td>{{ $invoice->kelas_asuransi }}</td>
                <td>{{ $invoice->no_asuransi }}</td>
                <td>{{ $invoice->tgl_kontrak }}</td>
                <td>{{ $invoice->tgl_endkontrak }}</td>
                <td>{{ $invoice->ppjp }}</td>
                <td>{{ $invoice->jamsostek_base }}</td>
                <td>{{ $invoice->ump_area }}</td>
                <td>{{ $invoice->gaji_pokok }}</td>
                <td>{{ $invoice->tunjangan_jabatan }}</td>
                <td>{{ $invoice->tunjangan_keahlian }}</td>
                <td>{{ $invoice->tunjangan_bahasa }}</td>
                <td>{{ $invoice->tunjangan_pulsa }}</td>
                <td>{{ $invoice->tunjangan_project }}</td>
                <td>{{ $invoice->tunjangan_operasional }}</td>
                <td>{{ $invoice->penyesuain_fix }}</td>
                <td>{{ $invoice->keterangan_penyesuaian }}</td>
                <td>{{ $invoice->total_fixed }}</td>
                <td>{{ $invoice->hk_layanan }}</td>
                <td>{{ $invoice->hk_real }}</td>
                <td>{{ $invoice->opname }}</td>
                <td>{{ $invoice->keterangan_aktif }}</td>
                <td>{{ $invoice->intensif_kehadiran }}</td>
                <td>{{ $invoice->rumus_reward_kehadiran }}</td>
                <td>{{ $invoice->reward_kehadiran }}</td>
                <td>{{ $invoice->t_produktivitas }}</td>
                <td>{{ $invoice->progresiv1 }}</td>
                <td>{{ $invoice->progresiv3 }}</td>
                <td>{{ $invoice->progresiv6 }}</td>
                <td>{{ $invoice->reward_prestasi }}</td>
                <td>{{ $invoice->t_makan }}</td>
                <td>{{ $invoice->tot_t_makan }}</td>
                <td>{{ $invoice->t_transport }}</td>
                <td>{{ $invoice->upah_phl }}</td>
                <td>{{ $invoice->t_prestasi }}</td>
                <td>{{ $invoice->ot1 }}</td>
                <td>{{ $invoice->jml_ot1 }}</td>
                <td>{{ $invoice->ot2 }}</td>
                <td>{{ $invoice->jml_ot2 }}</td>
                <td>{{ $invoice->ot3 }}</td>
                <td>{{ $invoice->jml_ot3 }}</td>
                <td>{{ $invoice->ot4 }}</td>
                <td>{{ $invoice->jml_ot4 }}</td>
                <td>{{ $invoice->lembur_maks }}</td>
                <td>{{ $invoice->jml_ot }}</td>
                <td>{{ $invoice->total_ot }}</td>
                <td>{{ $invoice->lembur_aux }}</td>
                <td>{{ $invoice->lembur_lain }}</td>
                <td>{{ $invoice->lembur_khusus }}</td>
                <td>{{ $invoice->lembur_natura }}</td>
                <td>{{ $invoice->hk_sa }}</td>
                <td>{{ $invoice->sa }}</td>
                <td>{{ $invoice->total_sa }}</td>
                <td>{{ $invoice->penyesuaian_variabel }}</td>
                <td>{{ $invoice->ket_variabel }}</td>
                <td>{{ $invoice->total_variabel }}</td>
                <td>{{ $invoice->tak }}</td>
                <td>{{ $invoice->adjust_thr }}</td>
                <td>{{ $invoice->thp }}</td>
                <td>{{ $invoice->jamsostek_tanggung_karyawan }}</td>
                <td>{{ $invoice->pph_tanggung_karyawan }}</td>
                <td>{{ $invoice->potongan_bpjs }}</td>
                <td>{{ $invoice->potongan_karyawan_jht_jp }}</td>
                <td>{{ $invoice->thp_karyawan_bpjs_jht_jp }}</td>
                <td>{{ $invoice->bank }}</td>
                <td>{{ $invoice->norek }}</td>
                <td>{{ $invoice->an_norek }}</td>
                <td>{{ $invoice->digit_rek }}</td>
                <td>{{ $invoice->npwp }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="19">Total</td>
            <td>{{ $gaji_pokok }}</td>
                <td>{{ $tunjangan_jabatan }}</td>
                <td>{{ $tunjangan_keahlian }}</td>
                <td>{{ $tunjangan_bahasa }}</td>
                <td>{{ $tunjangan_pulsa }}</td>
                <td>{{ $tunjangan_project }}</td>
                <td>{{ $tunjangan_operasional }}</td>
                <td>{{ $penyesuain_fix }}</td>
                <td></td>
                <td>{{ $total_fixed }}</td>
                <td>{{ $hk_layanan }}</td>
                <td>{{ $hk_real }}</td>
                <td>{{ $opname }}</td>
                <td></td>
                <td>{{ $intensif_kehadiran }}</td>
                <td>{{ $rumus_reward_kehadiran }}</td>
                <td>{{ $reward_kehadiran }}</td>
                <td>{{ $t_produktivitas }}</td>
                <td>{{ $progresiv1 }}</td>
                <td>{{ $progresiv3 }}</td>
                <td>{{ $progresiv6 }}</td>
                <td>{{ $reward_prestasi }}</td>
                <td>{{ $t_makan }}</td>
                <td>{{ $tot_t_makan }}</td>
                <td>{{ $t_transport }}</td>
                <td>{{ $upah_phl }}</td>
                <td>{{ $t_prestasi }}</td>
                <td>{{ $ot1 }}</td>
                <td>{{ $jml_ot1 }}</td>
                <td>{{ $ot2 }}</td>
                <td>{{ $jml_ot2 }}</td>
                <td>{{ $ot3 }}</td>
                <td>{{ $jml_ot3 }}</td>
                <td>{{ $ot4 }}</td>
                <td>{{ $jml_ot4 }}</td>
                <td>{{ $lembur_maks }}</td>
                <td>{{ $jml_ot }}</td>
                <td>{{ $total_ot }}</td>
                <td>{{ $lembur_aux }}</td>
                <td>{{ $lembur_lain }}</td>
                <td>{{ $lembur_khusus }}</td>
                <td>{{ $lembur_natura }}</td>
                <td>{{ $hk_sa }}</td>
                <td>{{ $sa }}</td>
                <td>{{ $total_sa }}</td>
                <td>{{ $penyesuaian_variabel }}</td>
                <td>{{ $ket_variabel }}</td>
                <td>{{ $total_variabel }}</td>
                <td>{{ $tak }}</td>
                <td>{{ $adjust_thr }}</td>
                <td>{{ $thp }}</td>
                <td>{{ $jamsostek_tanggung_karyawan }}</td>
                <td>{{ $pph_tanggung_karyawan }}</td>
                <td>{{ $potongan_bpjs }}</td>
                <td>{{ $potongan_karyawan_jht_jp }}</td>
                <td>{{ $thp_karyawan_bpjs_jht_jp }}</td>
            <td colspan="5"></td>

        </tr>
    </tfoot>
</table>

