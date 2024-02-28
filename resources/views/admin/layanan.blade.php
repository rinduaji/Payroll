@extends('admin.layouts.main')
@section('title','Layanan')

@section('content')
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div>
                        <div class="content">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <strong>DATA LAYANAN</strong>
                                </div>
                                <div class="card-body">
                                    <livewire:layanan-livewire />
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

        $('#addLayanan').modal('hide');
        $('#ubahLayanan').modal('hide');
        $('#hapusLayanan').modal('hide');
        
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });
    </script>
@endsection
