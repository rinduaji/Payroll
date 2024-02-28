<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Login;
use App\Exports\LoginExport;
use App\Imports\LoginImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->keyword;
        $pegawai = Login::where('jabatan','LIKE','%'.$keyword.'%')
                    ->orWhere('layanan','LIKE','%'.$keyword.'%')
                    ->orWhere('area','LIKE','%'.$keyword.'%')
                    ->orWhere('jabatan','LIKE','%'.$keyword.'%')
                    ->orWhere('perner','LIKE','%'.$keyword.'%')
                    ->orWhere('nama','LIKE','%'.$keyword.'%')
                ->paginate(10);
        $role = Role::all();
        return view('admin.pegawai')->with(compact('pegawai'))->with(compact('role'));
    }

    public function pegawaiExport(Request $request) {
        if(empty($request->jabatan)){
            $request->jabatan = 'AGENT';
        }

        
        if(empty($request->layanan)){
            $request->layanan = 'FBCC';
        }

        
        if(empty($request->area)){
            $request->area = 'SEMARANG';
        }

        return Excel::download(new LoginExport($request->jabatan,$request->layanan,$request->area),'Data_Login-'.$request->jabatan.'-'.$request->layanan.'-'.$request->area.'.xlsx');
    }

    public function pegawaiImport(Request $request) {
        $file = $request->file;
        $namaFile = $file->getClientOriginalName();
        $import = new LoginImport;
        $file->move('DataImport/User/',$namaFile);

        if(Excel::import($import, public_path('/DataImport/User/'.$namaFile))){
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

        return redirect('/pegawai');
    }

    public function update(Request $request, $id){
        $pegawai = Login::find($id);
        $input = $request->all();
        $role = Role::find($request->jabatan);
        $nama_jabatan = $role->nama_jabatan;
        if(User::where('id',$request->user_id)->update(['username' => $request->perner, 'name' => $request->nama, 'email' => strtolower(str_replace(" ","",$request->nama)."@gmail.com"),'role_id'=>$request->jabatan])) {
            $input['jabatan'] = $nama_jabatan;
            if($pegawai->fill($input)->save()) {
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
 
        return redirect('/pegawai');
    }
 
    public function delete($id)
    {
        $pegawais = Login::find($id);
        $users = User::where('username', $pegawais->perner)->get();
        
        Session::flash('statuspegawai', 'gagal');
        Session::flash('messagepegawai', 'Anda Gagal menghapus data!');

        if($users->each->delete()) {
            if($pegawais->delete()) {
                Session::flash('statuspegawai', 'success');
                Session::flash('messagepegawai', 'Anda Berhasil menghapus data!');
            }
        }
        return redirect('/pegawai');
    }
}
