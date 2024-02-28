<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Exports\GajiExport;
use App\Imports\GajiImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class GajiController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->keyword;
        $gaji = Gaji::where('periode','LIKE','%'.$keyword.'%')
                ->orWhere('layanan','LIKE','%'.$keyword.'%')
                ->orWhere('area','LIKE','%'.$keyword.'%')
                ->orWhere('jabatan','LIKE','%'.$keyword.'%')
                ->orWhere('perner','LIKE','%'.$keyword.'%')
                ->orWhere('nama','LIKE','%'.$keyword.'%')
                ->orWhere('nik','LIKE','%'.$keyword.'%')
                ->paginate(10);
        return view('admin.gaji',compact('gaji'));
    }

    public function gajiExport(Request $request) {
        if(empty($request->periode)){
            $request->periode = '202208';
        }

        
        if(empty($request->layanan)){
            $request->layanan = 'FBCC';
        }

        
        if(empty($request->area)){
            $request->area = 'SEMARANG';
        }

        return Excel::download(new GajiExport($request->periode,$request->layanan,$request->area),'Invoice-'.$request->periode.'-'.$request->layanan.'-'.$request->area.'.xlsx');
    }

    public function gajiImport(Request $request) {
        $file = $request->file;
        $namaFile = $file->getClientOriginalName();
        $file->move('DataGajiImport',$namaFile);

        Excel::import(new GajiImport, public_path('/DataGajiImport/'.$namaFile));

        Session::flash('status', 'success');
        Session::flash('message', 'Anda Berhasil Import file '.$namaFile.' dan insert data!');
        return redirect('/gaji');
    }

    
    public function reportGaji(Request $request) {
        $keyword = $request->keyword;
        $gaji = Gaji::where('periode','LIKE','%'.$keyword.'%')
                ->orWhere('layanan','LIKE','%'.$keyword.'%')
                ->orWhere('area','LIKE','%'.$keyword.'%')
                ->orWhere('jabatan','LIKE','%'.$keyword.'%')
                ->orWhere('perner','LIKE','%'.$keyword.'%')
                ->orWhere('nama','LIKE','%'.$keyword.'%')
                ->orWhere('nik','LIKE','%'.$keyword.'%')
                ->paginate(10);
        return view('admin.report-gaji',compact('gaji'));
    }
}
