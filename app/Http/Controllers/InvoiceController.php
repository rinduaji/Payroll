<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Login;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Exports\InvoiceExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    public function index() {
        return view('admin.invoice');
    }
}
