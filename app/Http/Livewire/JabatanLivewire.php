<?php

namespace App\Http\Livewire;

use App\Models\Jabatan;
use App\Models\Layanan;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class JabatanLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $idJabatan, $id_layanan, $nama_layanan, $nama_jabatan, $gaji_pokok, $t_jabatan;
    public $search = '';

    protected function rules()
    {
        return [
            'id_layanan' => 'required',
            'nama_jabatan' => 'required',
            'gaji_pokok' => 'required',
            't_jabatan' => 'required'
        ];
    }

    public function render()
    {
        if(!empty($this->search)) {
            $dataJabatan = Jabatan::join('layanans', 'layanans.id', '=', 'jabatans.id_layanan')
                            ->select('jabatans.*', 'layanans.nama_layanan', 'layanans.segment', 'layanans.area', 'layanans.kode')
                            ->Where('jabatans.nama_jabatan','LIKE','%'.$this->search.'%')
                            ->orderBy('jabatans.nama_jabatan','ASC')->paginate(10);
        }
        else {
            $dataJabatan = Jabatan::join('layanans', 'layanans.id', '=', 'jabatans.id_layanan')
            ->select('jabatans.*', 'layanans.nama_layanan', 'layanans.segment', 'layanans.area', 'layanans.kode')
            ->orderBy('jabatans.nama_jabatan','ASC')->paginate(10);
        }
        $dataLayanan = Layanan::all();
        return view('livewire.jabatan-livewire',['dataJabatan' => $dataJabatan, 'dataLayanan' => $dataLayanan]);
    }

    private function resetInput()
    {
        $this->idJabatan = null;
        $this->id_layanan = null;
        $this->nama_layanan = null;
        $this->nama_jabatan = null;
        $this->gaji_pokok = null;
        $this->t_jabatan = null;
    }

    public function storeJabatan()
    {
        $validatedData = $this->validate();
        
        if(Jabatan::create($validatedData)) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda Berhasil menambah Data!');
        }
        else {
            Session::flash('status', 'gagal');
            Session::flash('message', 'Anda Gagal menambah Data!');
        }
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function updatedJabatan($fields)
    {
        $this->validateOnly($fields);
    }

    public function editJabatan(int $idJabatan)
    {
        $dJabatan = Jabatan::join('layanans', 'layanans.id', '=', 'jabatans.id_layanan')
        ->select('jabatans.*', 'layanans.nama_layanan', 'layanans.segment', 'layanans.area', 'layanans.kode')
        ->where('jabatans.id', $idJabatan)->orderBy('jabatans.nama_jabatan','ASC')->first();
        // dd($dJabatan);

        if($dJabatan){
            $this->idJabatan = $dJabatan->id;
            $this->id_layanan = $dJabatan->id_layanan;
            $this->nama_jabatan = $dJabatan->nama_jabatan;
            $this->gaji_pokok = $dJabatan->gaji_pokok;
            $this->t_jabatan = $dJabatan->t_jabatan;
        }else{
            return redirect()->to('/jabatan');
        }
    }

    public function updateJabatan()
    {
        $validatedData = $this->validate();

        if(Jabatan::where('id',$this->idJabatan)->update([
            'id_layanan' => $validatedData['id_layanan'],
            'nama_jabatan' => $validatedData['nama_jabatan'],
            'gaji_pokok' => $validatedData['gaji_pokok'],
            't_jabatan' => $validatedData['t_jabatan']
        ])) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda Berhasil merubah Data!');
        }
        else {
            Session::flash('status', 'gagal');
            Session::flash('message', 'Anda Gagal merubah Data!');
        }
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteJabatan(int $idJabatan)
    {
        $this->idJabatan = $idJabatan;
    }

    public function destroyJabatan()
    {
        if(Jabatan::find($this->idJabatan)->delete()) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda Berhasil menghapus Data!');
        }
        else {
            Session::flash('status', 'gagal');
            Session::flash('message', 'Anda Gagal menghapus Data!');
        }
        
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }
}
