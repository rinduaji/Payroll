<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Variabel;
use Illuminate\Http\Request;
use App\Exports\VariabelExport;
use App\Imports\VariabelImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;


class VariabelController extends Controller
{
    public function index() {
        return view('admin.variabel');
    }

    public function variabelExport(Request $request) {
        if(empty($request->jabatan)){
            $request->jabatan = 'AGENT';
        }

        
        if(empty($request->layanan)){
            $request->layanan = 'FBCC';
        }

        
        if(empty($request->area)){
            $request->area = 'SEMARANG';
        }

        return Excel::download(new VariabelExport($request->jabatan,$request->layanan,$request->area),'Data_Login-'.$request->jabatan.'-'.$request->layanan.'-'.$request->area.'.xlsx');
    }

    public function variabelImport(Request $request) {
        $file = $request->file;
        $namaFile = $file->getClientOriginalName();
        $import = new VariabelImport;
        $file->move('DataImport/Variabel/',$namaFile);

        if(Excel::import($import, public_path('/DataImport/Variabel/'.$namaFile))){
            if($import->getRowCount() == 0) {
                Session::flash('status', 'gagal');
                Session::flash('message', 'Anda Gagal Import file '.$namaFile.' '.$import->getPenjelasan().'!');
            }
            else {
                Session::flash('status', 'success');
                Session::flash('message', 'Anda Berhasil Import file '.$namaFile.' sebanyak '.$import->getRowCount().' data!');
            }
        }
        else {
            Session::flash('status', 'gagal');
            Session::flash('message', 'Anda Gagal Import file '.$namaFile.' '.$import->getPenjelasan().'!');
        }

        return redirect('/variabel');
    }

    public function update(Request $request, $id){
        $variabel = Variabel::find($id);
        $input = $request->all();
        $login = Login::where('perner', $request->perner)->first();
        $perner_login = $login->id;
        if(Login::where('id',$request->login_id)->update(['perner' => $request->perner])) {
            $input['login_id'] = $perner_login;
            if($variabel->fill($input)->save()) {
                Session::flash('statusvariabel', 'success');
                Session::flash('messagevariabel', 'Anda Berhasil mengubah data!');
            }
            else {
                Session::flash('statusvariabel', 'gagal');
                Session::flash('messagevariabel', 'Anda Gagal mengubah data!');
            }
        }
        else {
            Session::flash('statusvariabel', 'gagal');
            Session::flash('messagevariabel', 'Anda Gagal mengubah data!');
        }
 
        return redirect('/variabel');
    }
 
    public function delete($id)
    {
        $variabels = Variabel::find($id);
        $logins = Login::where('perner', $variabels->perner)->get();
        
        Session::flash('statusvariabel', 'gagal');
        Session::flash('messagevariabel', 'Anda Gagal menghapus data!');

        if($variabels->delete()) {
            Session::flash('statusvariabel', 'success');
            Session::flash('messagevariabel', 'Anda Berhasil menghapus data!');
        }

        return redirect('/variabel');
    }
}