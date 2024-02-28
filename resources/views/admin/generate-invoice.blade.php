@extends('admin.layouts.main')
@section('title','Generate Invoice')

@section('content')
                @if (Session::has('status')) 
                @if(Session::get('status') == 'success')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                @else
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @endif
                <strong>{{Session::get('message')}}!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <strong>GENERATE INVOICE</strong>
                            </div>
                            <div class="card-body">
                                {{-- <form class="form-horizontal form-material mx-2" action="{{route('payroll.create-generate-invoice')}}" method="POST" enctype="multipart/form-data">
                                @csrf --}}
                                    <div class="form-group">
                                        
                                        <div class="row g-3">
                                            
                                            <livewire:invoice-generate-livewire />
                                            
                                        </div>
                                    </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <strong>DELETE GENERATE INVOICE</strong>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" action="{{route('payroll.delete-generate-invoice')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        
                                        <div class="row g-3">
                                            <div class="col-md-2">
                                                <label for="file" class="col-md-12">Periode</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control form-control-line" name="periode" id="periode" placeholder="Masukkan Periode" required>
                                            </div>
                                            <div class="col-md-3">
                                                <button class="form-control form-control-line btn btn-danger text-white">
                                                    Delete Data Generate
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
@endsection
