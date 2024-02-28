<?php

namespace App\Http\Livewire;

use App\Models\Login;
use Livewire\Component;
use App\Models\Variabel;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class VariabelLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $idVariabel, $login_id, $periode  ,$perner  ,$status_kontrak ,$jamsostek_base ,$ump_area ,$gaji_pokok ,$tunjangan_jabatan ,$tunjangan_keahlian  ,$tunjangan_bahasa  ,
    $tunjangan_pulsa  ,$tunjangan_project  ,$tunjangan_operasional  ,$penyesuain_fix  ,$keterangan_penyesuaian  ,$total_fixed  ,$hk_layanan  ,$hk_real  ,$opname  ,
    $keterangan_aktif  ,$intensif_kehadiran  ,$rumus_reward_kehadiran  ,$reward_kehadiran  ,$t_produktivitas  ,$t_kualitas  ,$progresiv1  ,$progresiv3  ,$progresiv6  ,
    $reward_prestasi  ,$t_makan  ,$tot_t_makan  ,$t_transport  ,$upah_phl  ,$t_prestasi  ,$ot1  ,$jml_ot1  ,$ot2  ,$jml_ot2  ,$ot3  ,$jml_ot3  ,$ot4  ,$jml_ot4  ,
    $lembur_maks  ,$jml_ot  ,$total_ot  ,$lembur_aux  ,$lembur_lain  ,$lembur_khusus  ,$lembur_natura  ,$hk_sa  ,$sa  ,$total_sa  ,$penyesuaian_variabel  ,$ket_variabel  ,
    $total_variabel  ,$tak  ,$adjust_thr  ,$thp , $jamsostek_tanggung_karyawan  ,$pph_tanggung_karyawan  ,$potongan_bpjs  ,$potongan_karyawan_jht_jp  ,
    $thp_karyawan_bpjs_jht_jp;

    public $search = '';

    protected function rules()
    {
        return [
            'login_id' => 'required' ,
            'periode' => 'required' ,
            'perner' => 'required' ,
            'status_kontrak' => 'required' ,
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
            $dataVariabel = Variabel::join('logins', 'variabels.login_id', '=', 'logins.id')
            ->select('variabels.*', 'logins.nama', 'logins.jabatan', 'logins.area', 'logins.layanan')
            ->where('variabels.perner', 'like', '%'.$this->search.'%')->orderByRaw('logins.layanan, logins.area, logins.jabatan, variabels.perner, logins.nama ASC')->paginate(10);
        }
        else {
            $dataVariabel = Variabel::join('logins', 'variabels.login_id', '=', 'logins.id')
            ->select('variabels.*', 'logins.nama', 'logins.jabatan', 'logins.area', 'logins.layanan')
            ->orderByRaw('logins.layanan, logins.area, logins.jabatan, variabels.perner, logins.nama ASC')->paginate(10);
        }
        $dataLogin = Login::join('layanans', 'layanans.nama_layanan', '=', 'logins.layanan')->get();
        return view('livewire.variabel-livewire',['dataVariabel' => $dataVariabel, 'dataLogin' => $dataLogin]);
    }

    private function resetInput()
    {
        $this->idVariabel = null;
        $this->login_id = null;
        $this->periode = null;
        $this->perner = null;
        $this->status_kontrak = null;
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
        $this->total_variabel = ($this->t_produktivitas + $this->t_prestasi + $this->total_ot + $this->total_sa + $this->penyesuaian_variabel + $this->t_kualitas);
        $this->thp = ($this->total_fixed + $this->progresiv1 + $this->total_variabel + $this->tak + $this->adjust_thr);
        $this->thp_karyawan_bpjs_jht_jp = ($this->thp +  $this->jamsostek_tanggung_karyawan + $this->pph_tanggung_karyawan + $this->potongan_bpjs);
        $this->tot_t_makan = ($this->hk_layanan * $this->t_makan);
        $this->upah_phl = ($this->hk_layanan * $this->t_transport);
        // }
    }

    public function editVariabel(int $idVariabel)
    {
        $dVariabel = Variabel::join('logins', 'variabels.login_id', '=', 'logins.id')
        ->select('variabels.*', 'logins.nama', 'logins.jabatan', 'logins.area', 'logins.layanan')
        ->where('variabels.id', $idVariabel)->orderByRaw('logins.layanan, logins.area, logins.jabatan, variabels.perner, logins.nama ASC')->first();
        // findOrFail($idVariabel);
        if($dVariabel){

            $this->idVariabel = $dVariabel->id;
            $this->login_id = $dVariabel->login_id;
            $this->periode = $dVariabel->periode;
            $this->perner = $dVariabel->perner;
            $this->status_kontrak = $dVariabel->status_kontrak;
            $this->jamsostek_base = $dVariabel->jamsostek_base;
            $this->ump_area = $dVariabel->ump_area;
            $this->gaji_pokok = $dVariabel->gaji_pokok;
            $this->tunjangan_jabatan = $dVariabel->tunjangan_jabatan;
            $this->tunjangan_keahlian = $dVariabel->tunjangan_keahlian;
            $this->tunjangan_bahasa = $dVariabel->tunjangan_bahasa;
            $this->tunjangan_pulsa = $dVariabel->tunjangan_pulsa;
            $this->tunjangan_project = $dVariabel->tunjangan_project;
            $this->tunjangan_operasional = $dVariabel->tunjangan_operasional;
            $this->penyesuain_fix = $dVariabel->penyesuain_fix;
            $this->keterangan_penyesuaian = $dVariabel->keterangan_penyesuaian;
            $this->total_fixed = $dVariabel->total_fixed;
            $this->hk_layanan = $dVariabel->hk_layanan;
            $this->hk_real = $dVariabel->hk_real;
            $this->opname = $dVariabel->opname;
            $this->keterangan_aktif = $dVariabel->keterangan_aktif;
            $this->intensif_kehadiran = $dVariabel->intensif_kehadiran;
            $this->rumus_reward_kehadiran = $dVariabel->rumus_reward_kehadiran;
            $this->reward_kehadiran = $dVariabel->reward_kehadiran;
            $this->t_produktivitas = $dVariabel->t_produktivitas;
            $this->t_kualitas = $dVariabel->t_kualitas;
            $this->progresiv1 = $dVariabel->progresiv1;
            $this->progresiv3 = $dVariabel->progresiv3;
            $this->progresiv6 = $dVariabel->progresiv6;
            $this->reward_prestasi = $dVariabel->reward_prestasi;
            $this->t_makan = $dVariabel->t_makan;
            $this->tot_t_makan = $dVariabel->tot_t_makan;
            $this->t_transport = $dVariabel->t_transport;
            $this->upah_phl = $dVariabel->upah_phl;
            $this->t_prestasi = $dVariabel->t_prestasi;
            $this->ot1 = $dVariabel->ot1;
            $this->jml_ot1 = $dVariabel->jml_ot1;
            $this->ot2 = $dVariabel->ot2;
            $this->jml_ot2 = $dVariabel->jml_ot2;
            $this->ot3 = $dVariabel->ot3;
            $this->jml_ot3 = $dVariabel->jml_ot3;
            $this->ot4 = $dVariabel->ot4;
            $this->jml_ot4 = $dVariabel->jml_ot4;
            $this->lembur_maks = $dVariabel->lembur_maks;
            $this->jml_ot = $dVariabel->jml_ot;
            $this->total_ot = $dVariabel->total_ot;
            $this->lembur_aux = $dVariabel->lembur_aux;
            $this->lembur_lain = $dVariabel->lembur_lain;
            $this->lembur_khusus = $dVariabel->lembur_khusus;
            $this->lembur_natura = $dVariabel->lembur_natura;
            $this->hk_sa = $dVariabel->hk_sa;
            $this->sa = $dVariabel->sa;
            $this->total_sa = $dVariabel->total_sa;
            $this->penyesuaian_variabel = $dVariabel->penyesuaian_variabel;
            $this->ket_variabel = $dVariabel->ket_variabel;
            $this->total_variabel = $dVariabel->total_variabel;
            $this->tak = $dVariabel->tak;
            $this->adjust_thr = $dVariabel->adjust_thr;
            $this->thp = $dVariabel->thp;
            $this->jamsostek_tanggung_karyawan = $dVariabel->jamsostek_tanggung_karyawan;
            $this->pph_tanggung_karyawan = $dVariabel->pph_tanggung_karyawan;
            $this->potongan_bpjs = $dVariabel->potongan_bpjs;
            $this->potongan_karyawan_jht_jp = $dVariabel->potongan_karyawan_jht_jp;
            $this->thp_karyawan_bpjs_jht_jp = $dVariabel->thp_karyawan_bpjs_jht_jp;


        }else{
            return redirect()->to('/variabel');
        }
    }

    public function updateVariabel()
    {
        $validatedData = $this->validate();

        if(Variabel::where('id',$this->idVariabel)->update([
            'login_id' => $validatedData['login_id'],
            'periode' => $validatedData['periode'],
            'perner' => $validatedData['perner'],
            'status_kontrak' => $validatedData['status_kontrak'],
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
            Session::flash('statusvariabel', 'success');
            Session::flash('messagevariabel', 'Anda Berhasil merubah Data!');
        }
        else {
            Session::flash('statusvariabel', 'gagal');
            Session::flash('messagevariabel', 'Anda Gagal merubah Data!');
        }
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteVariabel(int $idVariabel)
    {
        $this->idVariabel = $idVariabel;
    }

    public function destroyVariabel()
    {
        if(Variabel::find($this->idVariabel)->delete()) {
            Session::flash('statusvariabel', 'success');
            Session::flash('messagevariabel', 'Anda Berhasil menghapus Data!');
        }
        else {
            Session::flash('statusvariabel', 'gagal');
            Session::flash('messagevariabel', 'Anda Gagal menghapus Data!');
        }
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

}
