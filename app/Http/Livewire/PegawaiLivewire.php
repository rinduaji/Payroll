<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Login;
use App\Models\Jabatan;
use App\Models\Layanan;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class PegawaiLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $idPegawai, $user_id, $layanan, $area, $jabatan, $perner, $nama, $jenis_kelamin, $status_perkawinan, $jumlah_anak, $nomer_jamsostek, $asuransi_kesehatan,
    $kelas_asuransi, $no_asuransi, $tgl_kontrak, $tgl_endkontrak, $ppjp, $bank, $norek, $an_norek, $digit_rek, $npwp;
    public $dataArea, $dataJabatan;
    public $search = '';



    protected function rules()
    {
        return [
            'user_id' => 'required' ,
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
            'npwp' => 'required'

        ];
    }

    public function render()
    {
        $username = Session::get('username');
        
        $dPegawai = User::join('layanans', 'users.layanan_id', '=', 'layanans.id')
        ->select('*')
        ->where('users.username', $username)->first();
        $nama_layanan = $dPegawai->nama_layanan;

        if(!empty($this->search)) {
            $dataPegawai = Login::join('users', 'logins.user_id', '=', 'users.id')
            ->select('logins.*')
            ->where('logins.perner', 'like', '%'.$this->search.'%')->orderByRaw('logins.layanan, logins.area, logins.jabatan, logins.perner, logins.nama ASC')->paginate(10);
        }
        else {
            if($dPegawai->jabatan_id == 51 && $dPegawai->layanan_id == 21){
                $dataPegawai = Login::join('users', 'logins.user_id', '=', 'users.id')
                ->select('logins.*')
                ->orderByRaw('logins.layanan, logins.area, logins.jabatan, logins.perner, logins.nama ASC')->paginate(10);
            }
            else {
                $dataPegawai = User::join('logins', 'logins.user_id', '=', 'users.id')
                ->join('layanans', 'users.layanan_id', '=', 'layanans.id')
                ->select('logins.*')
                ->where('logins.layanan', $nama_layanan)->orderByRaw('logins.layanan, logins.area, logins.jabatan, logins.perner, logins.nama ASC')->paginate(10);
            }
        }
        $dataUser = User::all();
        $dataLayanan = Layanan::select('nama_layanan', 'segment')->distinct()->get();
        $dataJabatan = Jabatan::all();
        return view('livewire.pegawai-livewire',['dataPegawai' => $dataPegawai, 'dataUser' => $dataUser, 'dataLayanan' => $dataLayanan, 'dataJabatan' => $dataJabatan]);
    }

    private function resetInput()
    {
        $this->idPegawai = null;
        $this->user_id = null;
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
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);

        $this->dataArea = Layanan::where('nama_layanan',$this->layanan)->get();
        $this->dataJabatan = Layanan::join('jabatans', 'jabatans.id_layanan', '=', 'layanans.id')
                          ->where('layanans.area',$this->area)
                          ->where('layanans.nama_layanan',$this->layanan)->get();

        $this->digit_rek = strlen($this->norek);
        
    }

    public function updatedLayanan($layanan) {
        $this->dataArea = Layanan::where('nama_layanan',$layanan)->get();
    }

    public function updatedArea($area) {
        $this->dataJabatan = Layanan::join('jabatans', 'jabatans.id_layanan', '=', 'layanans.id')
                          ->where('layanans.area',$area)
                          ->where('layanans.nama_layanan',$this->layanan)->get();
    }

    public function editPegawai(int $idPegawai)
    {
        $dPegawai = Login::join('users', 'logins.user_id', '=', 'users.id')
        ->select('logins.*')
        ->where('logins.id', $idPegawai)->orderByRaw('logins.layanan, logins.area, logins.jabatan, logins.perner, logins.nama ASC')->first();
        // findOrFail($idPegawai);
        if($dPegawai){
            $this->dataArea = Layanan::where('nama_layanan',$dPegawai->layanan)->get();
            $this->dataJabatan = Layanan::join('jabatans', 'jabatans.id_layanan', '=', 'layanans.id')
                              ->where('layanans.area',$dPegawai->area)
                              ->where('layanans.nama_layanan',$dPegawai->layanan)->get();

            $this->idPegawai = $dPegawai->id;
            $this->user_id = $dPegawai->user_id;
            $this->layanan = $dPegawai->layanan;
            $this->area = $dPegawai->area;
            $this->jabatan = $dPegawai->jabatan;
            $this->perner = $dPegawai->perner;
            $this->nama = $dPegawai->nama;
            $this->jenis_kelamin = $dPegawai->jenis_kelamin;
            $this->status_perkawinan = $dPegawai->status_perkawinan;
            $this->jumlah_anak = $dPegawai->jumlah_anak;
            $this->nomer_jamsostek = $dPegawai->nomer_jamsostek;
            $this->asuransi_kesehatan = $dPegawai->asuransi_kesehatan;
            $this->kelas_asuransi = $dPegawai->kelas_asuransi;
            $this->no_asuransi = $dPegawai->no_asuransi;
            $this->tgl_kontrak = $dPegawai->tgl_kontrak;
            $this->tgl_endkontrak = $dPegawai->tgl_endkontrak;
            $this->ppjp = $dPegawai->ppjp;
            $this->bank = $dPegawai->bank;
            $this->norek = $dPegawai->norek;
            $this->an_norek = $dPegawai->an_norek;
            $this->digit_rek = $dPegawai->digit_rek;
            $this->npwp = $dPegawai->npwp;

            
        }else{
            return redirect()->to('/pegawai');
        }
    }

    public function updatePegawai()
    {
        $validatedData = $this->validate();

        $pegawai = Login::where('id',$this->idPegawai)->first();
        $cekUser = User::where('id',$pegawai->user_id)->first();
        $layanan = Layanan::where('nama_layanan',$validatedData['layanan'])->where('area',$validatedData['area'])->first();
        $jabatan = Jabatan::where('id_layanan',$layanan->id)->where('nama_jabatan',$validatedData['jabatan'])->first();
        $validatedData['user_id'] = $cekUser->id;
        $validatedData['jabatan'] = $jabatan->nama_jabatan;
        if(User::where('id',$pegawai->user_id)->update(['username' => $validatedData['perner'], 'name' => $validatedData['nama'], 'email' => strtolower(str_replace(" ","",$validatedData['nama'])."@gmail.com"),'jabatan_id'=>$jabatan->id,'layanan_id'=>$layanan->id])) {
            if(Login::where('id',$this->idPegawai)->update([
                'user_id' => $validatedData['user_id'],
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
            ])) {
                Session::flash('statuspegawai', 'success');
                Session::flash('messagepegawai', 'Anda Berhasil mengubah data!');
            }
            else {
                Session::flash('statuspegawai', 'gagal');
                Session::flash('messagepegawai', 'Anda Gagal mengubah data!');
            }
        }
        else {
            Session::flash('statuspegawai', 'gagal');
            Session::flash('messagepegawai', 'Anda Gagal mengubah data!');
        }

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deletePegawai(int $idPegawai)
    {
        $this->idPegawai = $idPegawai;
    }

    public function destroyPegawai()
    {
        $pegawais = Login::find($this->idPegawai);
        $users = User::where('username', $pegawais->perner)->get();

        Session::flash('statuspegawai', 'gagal');
        Session::flash('messagepegawai', 'Anda Gagal menghapus Data!');

        if($users->each->delete()) {
            if(Login::find($this->idPegawai)->delete()) {
                Session::flash('statuspegawai', 'success');
                Session::flash('messagepegawai', 'Anda Berhasil menghapus Data!');
            }
        }

        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

}
