<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Layanan;
use Livewire\Component;
use App\Models\Variabel;
use Illuminate\Support\Facades\Session;

class InvoiceGenerateLivewire extends Component
{
    public $dataArea, $dataJabatan, $area, $layanan, $periode, $jabatan;

    protected function rules()
    {
        return [
            'periode' => 'required',
            'layanan' => 'required',
            'area' => 'required',
            'jabatan' => 'required'
        ];
    }

    public function render()
    {
        $dataLayanan = Layanan::select('nama_layanan', 'segment')->distinct()->get();
        return view('livewire.invoice-generate-livewire',['dataLayanan' => $dataLayanan]);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);

        $this->dataArea = Layanan::where('nama_layanan',$this->layanan)->get();
        $this->dataJabatan = Layanan::join('jabatans', 'jabatans.id_layanan', '=', 'layanans.id')
                          ->where('layanans.area',$this->area)
                          ->where('layanans.nama_layanan',$this->layanan)->get();
        
    }

    public function updatedLayanan($layanan) {
        $this->dataArea = Layanan::where('nama_layanan',$layanan)->get();
    }

    public function updatedArea($area) {
        $this->dataJabatan = Layanan::join('jabatans', 'jabatans.id_layanan', '=', 'layanans.id')
                          ->where('layanans.area',$area)
                          ->where('layanans.nama_layanan',$this->layanan)->get();
    }

    public function generateInvoice(){
        $validatedData = $this->validate();
        $total = 0;
        $invoice = Variabel::join('logins', 'logins.id', '=', 'variabels.login_id')
                    ->where('variabels.periode',$validatedData['periode'])
                    ->where('logins.area',$validatedData['area'])
                    ->where('logins.layanan',$validatedData['layanan'])
                    ->where('logins.jabatan',$validatedData['jabatan'])
                    ->get();
        $tot_invoice = Variabel::join('logins', 'logins.id', '=', 'variabels.login_id')
                    ->where('variabels.periode',$validatedData['periode'])
                    ->where('logins.area',$validatedData['area'])
                    ->where('logins.layanan',$validatedData['layanan'])
                    ->where('logins.jabatan',$validatedData['jabatan'])
                    ->count();
        if($tot_invoice > 0) {
            foreach($invoice as $inv) {
                    $cek_invoice = Invoice::where('periode',$validatedData['periode'])->where('perner',$inv->perner)->count();
                    // dd($cek_invoice);
                    if($cek_invoice == 0 ) {
                        $data_variabel_login = Variabel::join('logins', 'logins.id', '=', 'variabels.login_id')
                                                ->where('variabels.periode',$validatedData['periode'])
                                                ->where('variabels.perner',$inv->perner)
                                                ->count();
                        // dd($invoice);
                        if($data_variabel_login != 0) {
                            $data_insert_invoice = [
                                'periode' => $inv["periode"],
                                'perner' => $inv["perner"],
                                'layanan' => $inv["layanan"],
                                'area' => $inv["area"],
                                'nama' => $inv["nama"],
                                'jabatan' => $inv["jabatan"],
                                'status_kontrak' => $inv["status_kontrak"],
                                'jenis_kelamin' => $inv["jenis_kelamin"],
                                'status_perkawinan' => $inv["status_perkawinan"],
                                'jumlah_anak' => $inv["jumlah_anak"],
                                'nomer_jamsostek' => $inv["nomer_jamsostek"],
                                'asuransi_kesehatan' => $inv["asuransi_kesehatan"],
                                'kelas_asuransi' => $inv["kelas_asuransi"],
                                'no_asuransi' => $inv["no_asuransi"],
                                'tgl_kontrak' => $inv["tgl_kontrak"],
                                'tgl_endkontrak' => $inv["tgl_endkontrak"],
                                'ppjp' => $inv["ppjp"],
                                'jamsostek_base' => $inv["jamsostek_base"],
                                'ump_area' => $inv["ump_area"],
                                'gaji_pokok' => $inv["gaji_pokok"],
                                'tunjangan_jabatan' => $inv["tunjangan_jabatan"],
                                'tunjangan_keahlian' => $inv["tunjangan_keahlian"],
                                'tunjangan_bahasa' => $inv["tunjangan_bahasa"],
                                'tunjangan_pulsa' => $inv["tunjangan_pulsa"],
                                'tunjangan_project' => $inv["tunjangan_project"],
                                'tunjangan_operasional' => $inv["tunjangan_operasional"],
                                'penyesuain_fix' => $inv["penyesuain_fix"],
                                'keterangan_penyesuaian' => $inv["keterangan_penyesuaian"],
                                'total_fixed' => $inv["total_fixed"],
                                'hk_layanan' => $inv["hk_layanan"],
                                'hk_real' => $inv["hk_real"],
                                'opname' => $inv["opname"],
                                'keterangan_aktif' => $inv["keterangan_aktif"],
                                'intensif_kehadiran' => $inv["intensif_kehadiran"],
                                'rumus_reward_kehadiran' => $inv["rumus_reward_kehadiran"],
                                'reward_kehadiran' => $inv["reward_kehadiran"],
                                't_produktivitas' => $inv["t_produktivitas"],
                                't_kualitas' => $inv["t_kualitas"],
                                'progresiv1' => $inv["progresiv1"],
                                'progresiv3' => $inv["progresiv3"],
                                'progresiv6' => $inv["progresiv6"],
                                'reward_prestasi' => $inv["reward_prestasi"],
                                't_makan' => $inv["t_makan"],
                                'tot_t_makan' => $inv["tot_t_makan"],
                                't_transport' => $inv["t_transport"],
                                'upah_phl' => $inv["upah_phl"],
                                't_prestasi' => $inv["t_prestasi"],
                                'ot1' => $inv["ot1"],
                                'jml_ot1' => $inv["jml_ot1"],
                                'ot2' => $inv["ot2"],
                                'jml_ot2' => $inv["jml_ot2"],
                                'ot3' => $inv["ot3"],
                                'jml_ot3' => $inv["jml_ot3"],
                                'ot4' => $inv["ot4"],
                                'jml_ot4' => $inv["jml_ot4"],
                                'lembur_maks' => $inv["lembur_maks"],
                                'jml_ot' => $inv["jml_ot"],
                                'total_ot' => $inv["total_ot"],
                                'lembur_aux' => $inv["lembur_aux"],
                                'lembur_lain' => $inv["lembur_lain"],
                                'lembur_khusus' => $inv["lembur_khusus"],
                                'lembur_natura' => $inv["lembur_natura"],
                                'hk_sa' => $inv["hk_sa"],
                                'sa' => $inv["sa"],
                                'total_sa' => $inv["total_sa"],
                                'penyesuaian_variabel' => $inv["penyesuaian_variabel"],
                                'ket_variabel' => $inv["ket_variabel"],
                                'total_variabel' => $inv["total_variabel"],
                                'tak' => $inv["tak"],
                                'adjust_thr' => $inv["adjust_thr"],
                                'thp' => $inv["thp"],
                                'jamsostek_tanggung_karyawan' => $inv["jamsostek_tanggung_karyawan"],
                                'pph_tanggung_karyawan' => $inv["pph_tanggung_karyawan"],
                                'potongan_bpjs' => $inv["potongan_bpjs"],
                                'potongan_karyawana_jht_jp' => $inv["potongan_karyawan_jht_jp"],
                                'thp_karyawan_bpjs_jht_jp' => $inv["thp_karyawan_bpjs_jht_jp"],
                                'bank' => $inv["bank"],
                                'norek' => $inv["norek"],
                                'an_norek' => $inv["an_norek"],
                                'digit_rek' => $inv["digit_rek"],
                                'npwp' => $inv["npwp"],
                                'jabatan' => $inv["jabatan"],
                                'created_at' => Carbon::now() ,
                                'updated_at' => Carbon:: now()
                            ];
                            // dd($data_insert_invoice);
                            $invoiceCreate = Invoice::create($data_insert_invoice);

                            $total++;
                    
                        if($data_variabel_login) {
                            Session::flash('status', 'success');
                            Session::flash('message', 'Anda Berhasil generate data invoice sebanyak ('.$total.') pada periode ('.$validatedData['periode'].')!');
                        }
                        else {
                            Session::flash('status', 'gagal');
                            Session::flash('message', 'Anda Gagal generate data invoice sebanyak ('.$total.') pada periode ('.$validatedData['periode'].')!');
                        }
                    }
                    else {
                        Session::flash('status', 'gagal');
                        Session::flash('message', 'Data Variabel tidak ada pada periode ('.$validatedData['periode'].') atau Data Pegawai belum ada!');
                    }
                }
                else {
                    Session::flash('status', 'gagal');
                    Session::flash('message', 'Data sudah pernah digenerate pada table invoice pada ('.$validatedData['periode'].')!');
                }
            }
        }
        else {
            Session::flash('status', 'gagal');
            Session::flash('message', 'Data Variabel tidak ada pada periode ('.$validatedData['periode'].') atau Data Pegawai belum ada!');
        }
 
        return redirect('/generate-invoice');
    }
}
