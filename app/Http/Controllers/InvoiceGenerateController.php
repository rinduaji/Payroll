<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Login;
use App\Models\Invoice;
use App\Models\Variabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceGenerateController extends Controller
{
    public function index() {
        $login = Login::all();
        return view('admin.generate-invoice')->with(compact('login'));
    }

    public function deleteGenerateInvoice(Request $request)
    {
        $invoices = Invoice::where('periode',$request->periode);

        // dd($invoices);
        
        if($invoices->delete()) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda Berhasil menghapus data!');
        }
        else {
            Session::flash('status', 'gagal');
            Session::flash('message', 'Anda Gagal menghapus data!');    
        }

        return redirect('/generate-invoice');
    }
}
