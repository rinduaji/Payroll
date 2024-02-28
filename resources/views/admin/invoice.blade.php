@extends('admin.layouts.main')
@section('title','Invoice')

@section('content')
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <strong>EXPORT GAJI</strong>
                            </div>
                            <div class="card-body">
                                <livewire:invoice-export-livewire />
                            </div>
                        </div>
                        <div class="content">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <strong>INVOICE</strong>
                                </div>
                                <div class="card-body">
                                   <livewire:invoice-livewire />
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

        $('#addInvoice').modal('hide');
        $('#ubahInvoice').modal('hide');
        $('#hapusInvoice').modal('hide');
        
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });
    </script>
@endsection
