@extends('admin.layouts.main')
@section('title','Variabel')

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
                                <strong>IMPORT VARIABEL</strong>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" action="{{route('payroll.importvariabel')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Template Excel</label>
                                        <div class="col-md-2">
                                            <a href="{{asset('TemplateExcel/Variabel/template-variabel.xlsx')}}" class="form-control form-control-line btn btn-warning text-white">
                                                Template Excel
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="file" class="col-md-12">File Excel</label>
                                        <div class="row g-3">
                                            <div class="col-md-10">
                                                <input type="file" class="form-control form-control-line" name="file" id="file" required>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="form-control form-control-line btn btn-primary text-white">
                                                    Upload Excel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="content">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <strong>DATA VARIABEL</strong>
                                </div>
                                <div class="card-body">
                                    <livewire:variabel-livewire />
                                </div>
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
@section('script')
    <script>
    window.addEventListener('close-modal', event => {

        $('#addVariabel').modal('hide');
        $('#ubahVariabel').modal('hide');
        $('#hapusVariabel').modal('hide');
        
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });
    </script>
@endsection