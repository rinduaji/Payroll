<?php

namespace App\Http\Livewire;

use App\Models\Layanan;
use Livewire\Component;
use App\Exports\InvoiceExport;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceExportLivewire extends Component
{
    public $dataArea, $dataJabatan, $area, $layanan, $periode, $jabatan;

    protected function rules()
    {
        return [
            'periode' => 'required',
            'layanan' => 'required',
            'area' => 'required'
        ];
    }

    public function render()
    {
        $dataLayanan = Layanan::select('nama_layanan', 'segment')->distinct()->get();
        return view('livewire.invoice-export-livewire',['dataLayanan' => $dataLayanan]);
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

    public function invoiceExport() {
        $validatedData = $this->validate();
        if(empty($validatedData['periode'])){
            $validatedData['periode'] = '202208';
        }

        
        if(empty($validatedData['layanan'])){
            $validatedData['layanan'] = 'FBCC';
        }

        
        if(empty($validatedData['area'])){
            $validatedData['area'] = 'SEMARANG';
        }

        return Excel::download(new InvoiceExport($validatedData['periode'],$validatedData['layanan'],$validatedData['area']),'Data_Invoice-'.$validatedData['periode'].'-'.$validatedData['layanan'].'-'.$validatedData['area'].'.xlsx');
    }
}
