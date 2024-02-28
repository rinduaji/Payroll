<?php

namespace App\Http\Livewire;

use App\Models\Login;
use App\Models\Invoice;
use App\Models\Layanan;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class InvoiceLivewire extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $idInvoice, $layanan, $area, $jabatan, $nama, $jenis_kelamin, $status_perkawinan, $jumlah_anak, $nomer_jamsostek, $asuransi_kesehatan,
    $kelas_asuransi, $no_asuransi, $tgl_kontrak, $tgl_endkontrak, $ppjp, $bank, $norek, $an_norek, $digit_rek, $npwp, $periode  ,$perner  ,$status_kontrak ,$jamsostek_base ,$ump_area ,$gaji_pokok ,$tunjangan_jabatan ,$tunjangan_keahlian  ,$tunjangan_bahasa  ,
    $tunjangan_pulsa  ,$tunjangan_project  ,$tunjangan_operasional  ,$penyesuain_fix  ,$keterangan_penyesuaian  ,$total_fixed  ,$hk_layanan  ,$hk_real  ,$opname  ,
    $keterangan_aktif  ,$intensif_kehadiran  ,$rumus_reward_kehadiran  ,$reward_kehadiran  ,$t_produktivitas  ,$t_kualitas  ,$progresiv1  ,$progresiv3  ,$progresiv6  ,
    $reward_prestasi  ,$t_makan  ,$tot_t_makan  ,$t_transport  ,$upah_phl  ,$t_prestasi  ,$ot1  ,$jml_ot1  ,$ot2  ,$jml_ot2  ,$ot3  ,$jml_ot3  ,$ot4  ,$jml_ot4  ,
    $lembur_maks  ,$jml_ot  ,$total_ot  ,$lembur_aux  ,$lembur_lain  ,$lembur_khusus  ,$lembur_natura  ,$hk_sa  ,$sa  ,$total_sa  ,$penyesuaian_variabel  ,$ket_variabel  ,
    $total_variabel  ,$tak  ,$adjust_thr  ,$thp , $jamsostek_tanggung_karyawan  ,$pph_tanggung_karyawan  ,$potongan_bpjs  ,$potongan_karyawan_jht_jp  ,
    $thp_karyawan_bpjs_jht_jp;
    public $dataArea, $dataJabatan;
    public $search = '';

    protected function rules()
    {
        return [
            'periode' => 'required' ,
            'perner' => 'required' ,
            'status_kontrak' => 'required' ,
            'layanan' => 'required',
            'area' => 'required',
            'jabatan' => 'required',
            'perner' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'jumlah_anak' => 'required',
            'nomer_jamsostek' => 'required',
            'asuransi_kesehatan' => 'required',
            'kelas_asuransi' => 'required',
            'no_asuransi' => 'required',
            'tgl_kontrak' => 'required',
            'tgl_endkontrak' => 'required',
            'ppjp' => 'required',
            'bank' => 'required',
            'norek' => 'required',
            'an_norek' => 'required',
            'digit_rek' => 'required',
            'npwp' => 'required',
            'jamsostek_base' => 'required' ,
            'ump_area' => 'required' ,
            'gaji_pokok' => 'required' ,
            'tunjangan_jabatan' => 'required' ,
            'tunjangan_keahlian' => 'required' ,
            'tunjangan_bahasa' => 'required' ,
            'tunjangan_pulsa' => 'required' ,
            'tunjangan_project' => 'required' ,
            'tunjangan_operasional' => 'required' ,
            'penyesuain_fix' => 'required' ,
            'keterangan_penyesuaian' => 'required' ,
            'total_fixed' => 'required' ,
            'hk_layanan' => 'required' ,
            'hk_real' => 'required' ,
            'opname' => 'required' ,
            'keterangan_aktif' => 'required' ,
            'intensif_kehadiran' => 'required' ,
            'rumus_reward_kehadiran' => 'required' ,
            'reward_kehadiran' => 'required' ,
            't_produktivitas' => 'required' ,
            't_kualitas' => 'required' ,
            'progresiv1' => 'required' ,
            'progresiv3' => 'required' ,
            'progresiv6' => 'required' ,
            'reward_prestasi' => 'required' ,
            't_makan' => 'required' ,
            'tot_t_makan' => 'required' ,
            't_transport' => 'required' ,
            'upah_phl' => 'required' ,
            't_prestasi' => 'required' ,
            'ot1' => 'required' ,
            'jml_ot1' => 'required' ,
            'ot2' => 'required' ,
            'jml_ot2' => 'required' ,
            'ot3' => 'required' ,
            'jml_ot3' => 'required' ,
            'ot4' => 'required' ,
            'jml_ot4' => 'required' ,
            'lembur_maks' => 'required' ,
            'jml_ot' => 'required' ,
            'total_ot' => 'required' ,
            'lembur_aux' => 'required' ,
            'lembur_lain' => 'required' ,
            'lembur_khusus' => 'required' ,
            'lembur_natura' => 'required' ,
            'hk_sa' => 'required' ,
            'sa' => 'required' ,
            'total_sa' => 'required' ,
            'penyesuaian_variabel' => 'required' ,
            'ket_variabel' => 'required' ,
            'total_variabel' => 'required' ,
            'tak' => 'required' ,
            'adjust_thr' => 'required' ,
            'thp' => 'required' ,
            'jamsostek_tanggung_karyawan' => 'required' ,
            'pph_tanggung_karyawan' => 'required' ,
            'potongan_bpjs' => 'required' ,
            'potongan_karyawan_jht_jp' => 'required' ,
            'thp_karyawan_bpjs_jht_jp' => 'required'
        ];
    }

    public function render()
    {
        if(!empty($this->search)) {
            $invoice = Invoice::where('perner','LIKE','%'.$this->search.'%')
                    ->orWhere('periode','LIKE','%'.$this->search.'%')
                    ->orderBy('periode','ASC')->paginate(10);
        }
        else {
            $invoice = Invoice::orderBy('periode','ASC')->paginate(10);
        }
        $dataLayanan = Layanan::select('nama_layanan', 'segment')->distinct()->get();
        return view('livewire.invoice-livewire',['invoice' => $invoice, 'dataLayanan' => $dataLayanan]);
    }

    private function resetInput()
    {
        $this->idInvoice = null;
        $this->periode = null;
        $this->perner = null;
        $this->status_kontrak = null;
        $this->layanan = null;
        $this->area = null;
        $this->jabatan = null;
        $this->perner = null;
        $this->nama = null;
        $this->jenis_kelamin = null;
        $this->status_perkawinan = null;
        $this->jumlah_anak = null;
        $this->nomer_jamsostek = null;
        $this->asuransi_kesehatan = null;
        $this->kelas_asuransi = null;
        $this->no_asuransi = null;
        $this->tgl_kontrak = null;
        $this->tgl_endkontrak = null;
        $this->ppjp = null;
        $this->bank = null;
        $this->norek = null;
        $this->an_norek = null;
        $this->digit_rek = null;
        $this->npwp = null;
        $this->jamsostek_base = null;
        $this->ump_area = null;
        $this->gaji_pokok = null;
        $this->tunjangan_jabatan = null;
        $this->tunjangan_keahlian = null;
        $this->tunjangan_bahasa = null;
        $this->tunjangan_pulsa = null;
        $this->tunjangan_project = null;
        $this->tunjangan_operasional = null;
        $this->penyesuain_fix = null;
        $this->keterangan_penyesuaian = null;
        $this->total_fixed = null;
        $this->hk_layanan = null;
        $this->hk_real = null;
        $this->opname = null;
        $this->keterangan_aktif = null;
        $this->intensif_kehadiran = null;
        $this->rumus_reward_kehadiran = null;
        $this->reward_kehadiran = null;
        $this->t_produktivitas = null;
        $this->t_kualitas = null;
        $this->progresiv1 = null;
        $this->progresiv3 = null;
        $this->progresiv6 = null;
        $this->reward_prestasi = null;
        $this->t_makan = null;
        $this->tot_t_makan = null;
        $this->t_transport = null;
        $this->upah_phl = null;
        $this->t_prestasi = null;
        $this->ot1 = null;
        $this->jml_ot1 = null;
        $this->ot2 = null;
        $this->jml_ot2 = null;
        $this->ot3 = null;
        $this->jml_ot3 = null;
        $this->ot4 = null;
        $this->jml_ot4 = null;
        $this->lembur_maks = null;
        $this->jml_ot = null;
        $this->total_ot = null;
        $this->lembur_aux = null;
        $this->lembur_lain = null;
        $this->lembur_khusus = null;
        $this->lembur_natura = null;
        $this->hk_sa = null;
        $this->sa = null;
        $this->total_sa = null;
        $this->penyesuaian_variabel = null;
        $this->ket_variabel = null;
        $this->total_variabel = null;
        $this->tak = null;
        $this->adjust_thr = null;
        $this->thp = null;
        $this->jamsostek_tanggung_karyawan = null;
        $this->pph_tanggung_karyawan = null;
        $this->potongan_bpjs = null;
        $this->potongan_karyawan_jht_jp = null;
        $this->thp_karyawan_bpjs_jht_jp = null;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
        // dd($key);
        // if(in_array($key,['hk_sa','sa'])){
            // dd($this->hk_sa * $this->sa);
        $this->dataArea = Layanan::where('nama_layanan',$this->layanan)->get();
        $this->dataJabatan = Layanan::join('jabatans', 'jabatans.id_layanan', '=', 'layanans.id')
                              ->where('layanans.area',$this->area)
                              ->where('layanans.nama_layanan',$this->layanan)->get();
    
        $this->digit_rek = strlen($this->norek);
        
        $cekIdJabatan = Login::where('logins.perner',$this->perner)->first();
        if(isset($cekIdJabatan)){
            $queryGajiPokokTJabatan = Login::join('layanans', 'layanans.nama_layanan', '=', 'logins.layanan')
            ->join('jabatans', 'jabatans.id_layanan', '=', 'layanans.id')
            ->select('logins.*', 'layanans.nama_layanan', 'layanans.segment', 'layanans.area','layanans.segment', 'layanans.kode','jabatans.nama_jabatan','jabatans.gaji_pokok','jabatans.t_jabatan')
            ->where('logins.perner', $this->perner)
            ->where('jabatans.nama_jabatan', $cekIdJabatan->jabatan)
            ->where('layanans.area', $cekIdJabatan->area)
            ->where('layanans.nama_layanan', $cekIdJabatan->layanan)->first();
        
            // dd($queryGajiPokokTJabatan);
            if($queryGajiPokokTJabatan){
                $this->gaji_pokok = $queryGajiPokokTJabatan->gaji_pokok;
                $this->tunjangan_jabatan = $queryGajiPokokTJabatan->t_jabatan;
                $this->login_id = $queryGajiPokokTJabatan->id;
            }
        }
        
        if($this->status_kontrak == "NEW" OR $this->status_kontrak == "RESIGN") {
        $this->total_fixed = ($this->gaji_pokok + $this->tunjangan_jabatan + $this->tunjangan_keahlian + $this->tunjangan_bahasa 
                        + $this->tunjangan_pulsa + $this->tunjangan_project + $this->tunjangan_operasional) 
                        * ($this->hk_real / $this->hk_layanan);
        }
        else {
        $this->total_fixed = ($this->gaji_pokok + $this->tunjangan_jabatan + $this->tunjangan_keahlian + $this->tunjangan_bahasa 
                        + $this->tunjangan_pulsa + $this->tunjangan_project + $this->tunjangan_operasional + $this->penyesuain_fix); 
        }

        if($this->opname > 0) {
        if($this->hk_real == "0") {
            $this->rumus_reward_kehadiran = $this->intensif_kehadiran;
        }
        elseif($this->hk_real == "1") {
            $this->rumus_reward_kehadiran = $this->intensif_kehadiran * (75 / 100);
        }
        elseif($this->hk_real == "2") {
            $this->rumus_reward_kehadiran = $this->intensif_kehadiran * (50 / 100);
        }
        elseif($this->hk_real == "3") {
            $this->rumus_reward_kehadiran = $this->intensif_kehadiran * (25 / 100);
        }
        else {
            $this->rumus_reward_kehadiran = 0;
        }
        }

        $v_tot_t_ot = $this->gaji_pokok + $this->tunjangan_jabatan + $this->tunjangan_keahlian + $this->tunjangan_bahasa + $this->tunjangan_project + $this->tunjangan_operasional;
        if($v_tot_t_ot > $this->ump_area) {
        $this->jml_ot1 = (1 / 173) * ($v_tot_t_ot) * 1.5 * $this->ot1;
        }
        else {
        $this->jml_ot1 = (1 / 173) * ($this->ump_area) * 1.5 * $this->ot1;
        }

        if($v_tot_t_ot > $this->ump_area) {
        $this->jml_ot2 = (1 / 173) * ($v_tot_t_ot) * 2 * $this->ot2;
        }
        else {
        $this->jml_ot2 = (1 / 173) * ($this->ump_area) * 2 * $this->ot2;
        }

        if($v_tot_t_ot > $this->ump_area) {
        $this->jml_ot3 = (1 / 173) * ($v_tot_t_ot) * 3 * $this->ot3;
        }
        else {
        $this->jml_ot3 = (1 / 173) * ($this->ump_area) * 3 * $this->ot3;
        }

        if($v_tot_t_ot > $this->ump_area) {
        $this->jml_ot4 = (1 / 173) * ($v_tot_t_ot) * 4 * $this->ot4;
        }
        else {
        $this->jml_ot4 = (1 / 173) * ($this->ump_area) * 4 * $this->ot4;
        }

        $this->jamsostek_base = ((($this->total_fixed - $this->tunjangan_pulsa) > $this->ump_area) ? ($this->total_fixed - $this->tunjangan_pulsa) : $this->ump_area);
        $this->total_ot = $this->jml_ot1 + $this->jml_ot2 + $this->jml_ot3 + $this->jml_ot4;
        $this->total_sa = $this->hk_sa * $this->sa;
        $this->total_variabel = ($this->t_produktivitas + $this->t_prestasi + $this->total_ot + $this->total_sa + $this->penyesuaian_variabel);
        $this->thp = ($this->total_fixed + $this->progresiv1 + $this->total_variabel + $this->tak + $this->adjust_thr);
        $this->thp_karyawan_bpjs_jht_jp = ($this->thp +  $this->jamsostek_tanggung_karyawan + $this->pph_tanggung_karyawan + $this->potongan_bpjs);
        $this->tot_t_makan = ($this->hk_layanan * $this->t_makan);
        $this->upah_phl = ($this->hk_layanan * $this->t_transport);
        // }
    }

    public function editInvoice(int $idInvoice)
    {
        $dInvoice = Invoice::where('id', $idInvoice)->first();
        // findOrFail($idVariabel);
        if($dInvoice){
            $this->idInvoice = $dInvoice->id;
            $this->periode = $dInvoice->periode;
            $this->perner = $dInvoice->perner;
            $this->status_kontrak = $dInvoice->status_kontrak;
            $this->layanan = $dInvoice->layanan;
            $this->area = $dInvoice->area;
            $this->jabatan = $dInvoice->jabatan;
            $this->perner = $dInvoice->perner;
            $this->nama = $dInvoice->nama;
            $this->jenis_kelamin = $dInvoice->jenis_kelamin;
            $this->status_perkawinan = $dInvoice->status_perkawinan;
            $this->jumlah_anak = $dInvoice->jumlah_anak;
            $this->nomer_jamsostek = $dInvoice->nomer_jamsostek;
            $this->asuransi_kesehatan = $dInvoice->asuransi_kesehatan;
            $this->kelas_asuransi = $dInvoice->kelas_asuransi;
            $this->no_asuransi = $dInvoice->no_asuransi;
            $this->tgl_kontrak = $dInvoice->tgl_kontrak;
            $this->tgl_endkontrak = $dInvoice->tgl_endkontrak;
            $this->ppjp = $dInvoice->ppjp;
            $this->bank = $dInvoice->bank;
            $this->norek = $dInvoice->norek;
            $this->an_norek = $dInvoice->an_norek;
            $this->digit_rek = $dInvoice->digit_rek;
            $this->npwp = $dInvoice->npwp;
            $this->jamsostek_base = $dInvoice->jamsostek_base;
            $this->ump_area = $dInvoice->ump_area;
            $this->gaji_pokok = $dInvoice->gaji_pokok;
            $this->tunjangan_jabatan = $dInvoice->tunjangan_jabatan;
            $this->tunjangan_keahlian = $dInvoice->tunjangan_keahlian;
            $this->tunjangan_bahasa = $dInvoice->tunjangan_bahasa;
            $this->tunjangan_pulsa = $dInvoice->tunjangan_pulsa;
            $this->tunjangan_project = $dInvoice->tunjangan_project;
            $this->tunjangan_operasional = $dInvoice->tunjangan_operasional;
            $this->penyesuain_fix = $dInvoice->penyesuain_fix;
            $this->keterangan_penyesuaian = $dInvoice->keterangan_penyesuaian;
            $this->total_fixed = $dInvoice->total_fixed;
            $this->hk_layanan = $dInvoice->hk_layanan;
            $this->hk_real = $dInvoice->hk_real;
            $this->opname = $dInvoice->opname;
            $this->keterangan_aktif = $dInvoice->keterangan_aktif;
            $this->intensif_kehadiran = $dInvoice->intensif_kehadiran;
            $this->rumus_reward_kehadiran = $dInvoice->rumus_reward_kehadiran;
            $this->reward_kehadiran = $dInvoice->reward_kehadiran;
            $this->t_produktivitas = $dInvoice->t_produktivitas;
            $this->t_kualitas = $dInvoice->t_kualitas;
            $this->progresiv1 = $dInvoice->progresiv1;
            $this->progresiv3 = $dInvoice->progresiv3;
            $this->progresiv6 = $dInvoice->progresiv6;
            $this->reward_prestasi = $dInvoice->reward_prestasi;
            $this->t_makan = $dInvoice->t_makan;
            $this->tot_t_makan = $dInvoice->tot_t_makan;
            $this->t_transport = $dInvoice->t_transport;
            $this->upah_phl = $dInvoice->upah_phl;
            $this->t_prestasi = $dInvoice->t_prestasi;
            $this->ot1 = $dInvoice->ot1;
            $this->jml_ot1 = $dInvoice->jml_ot1;
            $this->ot2 = $dInvoice->ot2;
            $this->jml_ot2 = $dInvoice->jml_ot2;
            $this->ot3 = $dInvoice->ot3;
            $this->jml_ot3 = $dInvoice->jml_ot3;
            $this->ot4 = $dInvoice->ot4;
            $this->jml_ot4 = $dInvoice->jml_ot4;
            $this->lembur_maks = $dInvoice->lembur_maks;
            $this->jml_ot = $dInvoice->jml_ot;
            $this->total_ot = $dInvoice->total_ot;
            $this->lembur_aux = $dInvoice->lembur_aux;
            $this->lembur_lain = $dInvoice->lembur_lain;
            $this->lembur_khusus = $dInvoice->lembur_khusus;
            $this->lembur_natura = $dInvoice->lembur_natura;
            $this->hk_sa = $dInvoice->hk_sa;
            $this->sa = $dInvoice->sa;
            $this->total_sa = $dInvoice->total_sa;
            $this->penyesuaian_variabel = $dInvoice->penyesuaian_variabel;
            $this->ket_variabel = $dInvoice->ket_variabel;
            $this->total_variabel = $dInvoice->total_variabel;
            $this->tak = $dInvoice->tak;
            $this->adjust_thr = $dInvoice->adjust_thr;
            $this->thp = $dInvoice->thp;
            $this->jamsostek_tanggung_karyawan = $dInvoice->jamsostek_tanggung_karyawan;
            $this->pph_tanggung_karyawan = $dInvoice->pph_tanggung_karyawan;
            $this->potongan_bpjs = $dInvoice->potongan_bpjs;
            $this->potongan_karyawan_jht_jp = $dInvoice->potongan_karyawan_jht_jp;
            $this->thp_karyawan_bpjs_jht_jp = $dInvoice->thp_karyawan_bpjs_jht_jp;


        }else{
            return redirect()->to('/invoice');
        }
    }

    public function updateInvoice()
    {
        $validatedData = $this->validate();

        if(Invoice::where('id',$this->idInvoice)->update([
            'periode' => $validatedData['periode'],
            'perner' => $validatedData['perner'],
            'status_kontrak' => $validatedData['status_kontrak'],
            'layanan' => $validatedData['layanan'],
            'area' => $validatedData['area'],
            'jabatan' => $validatedData['jabatan'],
            'perner' => $validatedData['perner'],
            'nama' => $validatedData['nama'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'status_perkawinan' => $validatedData['status_perkawinan'],
            'jumlah_anak' => $validatedData['jumlah_anak'],
            'nomer_jamsostek' => $validatedData['nomer_jamsostek'],
            'asuransi_kesehatan' => $validatedData['asuransi_kesehatan'],
            'kelas_asuransi' => $validatedData['kelas_asuransi'],
            'no_asuransi' => $validatedData['no_asuransi'],
            'tgl_kontrak' => $validatedData['tgl_kontrak'],
            'tgl_endkontrak' => $validatedData['tgl_endkontrak'],
            'ppjp' => $validatedData['ppjp'],
            'bank' => $validatedData['bank'],
            'norek' => $validatedData['norek'],
            'an_norek' => $validatedData['an_norek'],
            'digit_rek' => $validatedData['digit_rek'],
            'npwp' => $validatedData['npwp'],
            'jamsostek_base' => $validatedData['jamsostek_base'],
            'ump_area' => $validatedData['ump_area'],
            'gaji_pokok' => $validatedData['gaji_pokok'],
            'tunjangan_jabatan' => $validatedData['tunjangan_jabatan'],
            'tunjangan_keahlian' => $validatedData['tunjangan_keahlian'],
            'tunjangan_bahasa' => $validatedData['tunjangan_bahasa'],
            'tunjangan_pulsa' => $validatedData['tunjangan_pulsa'],
            'tunjangan_project' => $validatedData['tunjangan_project'],
            'tunjangan_operasional' => $validatedData['tunjangan_operasional'],
            'penyesuain_fix' => $validatedData['penyesuain_fix'],
            'keterangan_penyesuaian' => $validatedData['keterangan_penyesuaian'],
            'total_fixed' => $validatedData['total_fixed'],
            'hk_layanan' => $validatedData['hk_layanan'],
            'hk_real' => $validatedData['hk_real'],
            'opname' => $validatedData['opname'],
            'keterangan_aktif' => $validatedData['keterangan_aktif'],
            'intensif_kehadiran' => $validatedData['intensif_kehadiran'],
            'rumus_reward_kehadiran' => $validatedData['rumus_reward_kehadiran'],
            'reward_kehadiran' => $validatedData['reward_kehadiran'],
            't_produktivitas' => $validatedData['t_produktivitas'],
            't_kualitas' => $validatedData['t_kualitas'],
            'progresiv1' => $validatedData['progresiv1'],
            'progresiv3' => $validatedData['progresiv3'],
            'progresiv6' => $validatedData['progresiv6'],
            'reward_prestasi' => $validatedData['reward_prestasi'],
            't_makan' => $validatedData['t_makan'],
            'tot_t_makan' => $validatedData['tot_t_makan'],
            't_transport' => $validatedData['t_transport'],
            'upah_phl' => $validatedData['upah_phl'],
            't_prestasi' => $validatedData['t_prestasi'],
            'ot1' => $validatedData['ot1'],
            'jml_ot1' => $validatedData['jml_ot1'],
            'ot2' => $validatedData['ot2'],
            'jml_ot2' => $validatedData['jml_ot2'],
            'ot3' => $validatedData['ot3'],
            'jml_ot3' => $validatedData['jml_ot3'],
            'ot4' => $validatedData['ot4'],
            'jml_ot4' => $validatedData['jml_ot4'],
            'lembur_maks' => $validatedData['lembur_maks'],
            'jml_ot' => $validatedData['jml_ot'],
            'total_ot' => $validatedData['total_ot'],
            'lembur_aux' => $validatedData['lembur_aux'],
            'lembur_lain' => $validatedData['lembur_lain'],
            'lembur_khusus' => $validatedData['lembur_khusus'],
            'lembur_natura' => $validatedData['lembur_natura'],
            'hk_sa' => $validatedData['hk_sa'],
            'sa' => $validatedData['sa'],
            'total_sa' => $validatedData['total_sa'],
            'penyesuaian_variabel' => $validatedData['penyesuaian_variabel'],
            'ket_variabel' => $validatedData['ket_variabel'],
            'total_variabel' => $validatedData['total_variabel'],
            'tak' => $validatedData['tak'],
            'adjust_thr' => $validatedData['adjust_thr'],
            'thp' => $validatedData['thp'],
            'jamsostek_tanggung_karyawan' => $validatedData['jamsostek_tanggung_karyawan'],
            'pph_tanggung_karyawan' => $validatedData['pph_tanggung_karyawan'],
            'potongan_bpjs' => $validatedData['potongan_bpjs'],
            'potongan_karyawan_jht_jp' => $validatedData['potongan_karyawan_jht_jp'],
            'thp_karyawan_bpjs_jht_jp' => $validatedData['thp_karyawan_bpjs_jht_jp'],
        ])) {
            Session::flash('statusinvoice', 'success');
            Session::flash('messageinvoice', 'Anda Berhasil merubah Data!');
        }
        else {
            Session::flash('statusinvoice', 'gagal');
            Session::flash('messageinvoice', 'Anda Gagal merubah Data!');
        }
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteInvoice(int $idInvoice)
    {
        $this->idInvoice = $idInvoice;
    }

    public function destroyInvoice()
    {
        if(Invoice::find($this->idInvoice)->delete()) {
            Session::flash('statusinvoice', 'success');
            Session::flash('messageinvoice', 'Anda Berhasil menghapus Data!');
        }
        else {
            Session::flash('statusinvoice', 'gagal');
            Session::flash('messageinvoice', 'Anda Gagal menghapus Data!');
        }
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }
}
