@extends('admin.layouts.main')
@section('title','Jabatan')

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
                                    <strong>DATA JABATAN</strong>
                                </div>
                                <div class="card-body">
                                    <livewire:jabatan-livewire />
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

        $('#addJabatan').modal('hide');
        $('#ubahJabatan').modal('hide');
        $('#hapusJabatan').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        // $('#hapusJabatan').modal('toggle');
    });
    </script>
@endsection
