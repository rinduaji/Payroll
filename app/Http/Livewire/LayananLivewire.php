<?php

namespace App\Http\Livewire;

use App\Models\Layanan;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class LayananLivewire extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $idLayanan, $nama_layanan, $segment, $area, $kode;
    public $search = '';

    protected function rules()
    {
        return [
            'nama_layanan' => 'required',
            'segment' => 'required',
            'area' => 'required',
            'kode' => 'required'
        ];
    }

    public function render()
    {
        if(!empty($this->search)) {
            $dataLayanan = Layanan::where('nama_layanan', 'like', '%'.$this->search.'%')->orderBy('nama_layanan','ASC')->paginate(10);
        }
        else {
            $dataLayanan = Layanan::latest()->paginate(10);
        }
        // $dataLayanan = Layanan::all();
        return view('livewire.layanan-livewire',['dataLayanan' => $dataLayanan]);
    }

    private function resetInput()
    {
        $this->idLayanan = null;
        $this->nama_layanan = null;
        $this->segment = null;
        $this->area = null;
        $this->kode = null;
    }

    public function store()
    {
        $validatedData = $this->validate();
        
        if(Layanan::create($validatedData)) {
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

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editLayanan(int $idLayanan)
    {
        $dLayanan = Layanan::findOrFail($idLayanan);
        if($dLayanan){

            $this->idLayanan = $dLayanan->id;
            $this->nama_layanan = $dLayanan->nama_layanan;
            $this->segment = $dLayanan->segment;
            $this->area = $dLayanan->area;
            $this->kode = $dLayanan->kode;
        }else{
            return redirect()->to('/layanan');
        }
    }

    public function updateLayanan()
    {
        $validatedData = $this->validate();

        if(Layanan::where('id',$this->idLayanan)->update([
            'nama_layanan' => $validatedData['nama_layanan'],
            'segment' => $validatedData['segment'],
            'area' => $validatedData['area'],
            'kode' => $validatedData['kode']
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

    public function deleteLayanan(int $idLayanan)
    {
        $this->idLayanan = $idLayanan;
    }

    public function destroyLayanan()
    {
        if(Layanan::find($this->idLayanan)->delete()) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda Berhasil menghapus Data!');
        }
        else {
            Session::flash('status', 'gagal');
            Session::flash('message', 'Anda Gagal menghapus Data!');
        }
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }
}
