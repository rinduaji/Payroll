@extends('admin.layouts.main')
@section('title','Import Gaji')

@section('content')
                @if (Session::has('status')) 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                                <strong>IMPORT GAJI</strong>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" action="{{route('payroll.importgaji')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Template Excel</label>
                                        <div class="col-md-2">
                                            <a href="{{asset('TemplateGajiImport/template-gaji.xlsx')}}" class="form-control form-control-line btn btn-warning text-white">
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
                                    <strong>DATA GAJI</strong>
                                </div>
                                <div class="card-body">
                                    <div class="my-3 col-12 col-sm-8 col-md-5">
                                        <form action="" method="GET">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                                <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                                                <button class="input-group-text btn btn-primary">SEARCH</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                                        width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>periode</th>
                                                    <th>layanan</th>
                                                    <th>area</th>
                                                    <th>jabatan</th>
                                                    <th>perner</th>
                                                    <th>nama</th>
                                                    <th>nik</th>
                                                    <th>status_kontrak</th>
                                                    <th>jenis_kelamin</th>
                                                    <th>status_perkawinan</th>
                                                    <th>jumlah_anak</th>
                                                    <th>nomer_jamsostek</th>
                                                    <th>asuransi_kesehatan</th>
                                                    <th>kelas_asuransi</th>
                                                    <th>no_asuransi</th>
                                                    <th>tgl_kontrak</th>
                                                    <th>tgl_endkontrak</th>
                                                    <th>ppjp</th>
                                                    <th>jamsostek_base</th>
                                                    <th>ump_area</th>
                                                    <th>gaji_pokok</th>
                                                    <th>tunjangan_jabatan</th>
                                                    <th>tunjangan_keahlian</th>
                                                    <th>tunjangan_bahasa</th>
                                                    <th>tunjangan_pulsa</th>
                                                    <th>tunjangan_project</th>
                                                    <th>tunjangan_operasional</th>
                                                    <th>penyesuain_fix</th>
                                                    <th>keterangan_penyesuaian</th>
                                                    <th>total_fixed</th>
                                                    <th>hk_layanan</th>
                                                    <th>hk_real</th>
                                                    <th>opname</th>
                                                    <th>keterangan_aktif</th>
                                                    <th>intensif_kehadiran</th>
                                                    <th>reward_kehadiran</th>
                                                    <th>t_produktivitas</th>
                                                    <th>t_kualitas</th>
                                                    <th>progresiv1</th>
                                                    <th>progresiv3</th>
                                                    <th>progresiv6</th>
                                                    <th>reward_prestasi</th>
                                                    <th>t_makan</th>
                                                    <th>tot_t_makan</th>
                                                    <th>t_transport</th>
                                                    <th>upah_phl</th>
                                                    <th>t_prestasi</th>
                                                    <th>ot1</th>
                                                    <th>jml_ot1</th>
                                                    <th>ot2</th>
                                                    <th>jml_ot2</th>
                                                    <th>ot3</th>
                                                    <th>jml_ot3</th>
                                                    <th>ot4</th>
                                                    <th>jml_ot4</th>
                                                    <th>lembur_maks</th>
                                                    <th>jml_ot</th>
                                                    <th>total_ot</th>
                                                    <th>lembur_aux</th>
                                                    <th>lembur_lain</th>
                                                    <th>lembur_khusus</th>
                                                    <th>lembur_natura</th>
                                                    <th>hk_sa</th>
                                                    <th>sa</th>
                                                    <th>total_sa</th>
                                                    <th>penyesuaian_variabel</th>
                                                    <th>ket_variabel</th>
                                                    <th>total_variabel</th>
                                                    <th>tak</th>
                                                    <th>adjust_thr</th>
                                                    <th>thp</th>
                                                    <th>bank</th>
                                                    <th>norek</th>
                                                    <th>an_norek</th>
                                                    <th>digit_rek</th>
                                                    <th>npwp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gaji as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$item->periode}}</td>
                                                    <td>{{$item->layanan}}</td>
                                                    <td>{{$item->area}}</td>
                                                    <td>{{$item->jabatan}}</td>
                                                    <td>{{$item->perner}}</td>
                                                    <td>{{$item->nama}}</td>
                                                    <td>{{$item->nik}}</td>
                                                    <td>{{$item->status_kontrak}}</td>
                                                    <td>{{$item->jenis_kelamin}}</td>
                                                    <td>{{$item->status_perkawinan}}</td>
                                                    <td>{{$item->jumlah_anak}}</td>
                                                    <td>{{$item->nomer_jamsostek}}</td>
                                                    <td>{{$item->asuransi_kesehatan}}</td>
                                                    <td>{{$item->kelas_asuransi}}</td>
                                                    <td>{{$item->no_asuransi}}</td>
                                                    <td>{{$item->tgl_kontrak}}</td>
                                                    <td>{{$item->tgl_endkontrak}}</td>
                                                    <td>{{$item->ppjp}}</td>
                                                    <td>{{$item->jamsostek_base}}</td>
                                                    <td>{{$item->ump_area}}</td>
                                                    <td>{{$item->gaji_pokok}}</td>
                                                    <td>{{$item->tunjangan_jabatan}}</td>
                                                    <td>{{$item->tunjangan_keahlian}}</td>
                                                    <td>{{$item->tunjangan_bahasa}}</td>
                                                    <td>{{$item->tunjangan_pulsa}}</td>
                                                    <td>{{$item->tunjangan_project}}</td>
                                                    <td>{{$item->tunjangan_operasional}}</td>
                                                    <td>{{$item->penyesuain_fix}}</td>
                                                    <td>{{$item->keterangan_penyesuaian}}</td>
                                                    <td>{{$item->total_fixed}}</td>
                                                    <td>{{$item->hk_layanan}}</td>
                                                    <td>{{$item->hk_real}}</td>
                                                    <td>{{$item->opname}}</td>
                                                    <td>{{$item->keterangan_aktif}}</td>
                                                    <td>{{$item->intensif_kehadiran}}</td>
                                                    <td>{{$item->reward_kehadiran}}</td>
                                                    <td>{{$item->t_produktivitas}}</td>
                                                    <td>{{$item->t_kualitas}}</td>
                                                    <td>{{$item->progresiv1}}</td>
                                                    <td>{{$item->progresiv3}}</td>
                                                    <td>{{$item->progresiv6}}</td>
                                                    <td>{{$item->reward_prestasi}}</td>
                                                    <td>{{$item->t_makan}}</td>
                                                    <td>{{$item->tot_t_makan}}</td>
                                                    <td>{{$item->t_transport}}</td>
                                                    <td>{{$item->upah_phl}}</td>
                                                    <td>{{$item->t_prestasi}}</td>
                                                    <td>{{$item->ot1}}</td>
                                                    <td>{{$item->jml_ot1}}</td>
                                                    <td>{{$item->ot2}}</td>
                                                    <td>{{$item->jml_ot2}}</td>
                                                    <td>{{$item->ot3}}</td>
                                                    <td>{{$item->jml_ot3}}</td>
                                                    <td>{{$item->ot4}}</td>
                                                    <td>{{$item->jml_ot4}}</td>
                                                    <td>{{$item->lembur_maks}}</td>
                                                    <td>{{$item->jml_ot}}</td>
                                                    <td>{{$item->total_ot}}</td>
                                                    <td>{{$item->lembur_aux}}</td>
                                                    <td>{{$item->lembur_lain}}</td>
                                                    <td>{{$item->lembur_khusus}}</td>
                                                    <td>{{$item->lembur_natura}}</td>
                                                    <td>{{$item->hk_sa}}</td>
                                                    <td>{{$item->sa}}</td>
                                                    <td>{{$item->total_sa}}</td>
                                                    <td>{{$item->penyesuaian_variabel}}</td>
                                                    <td>{{$item->ket_variabel}}</td>
                                                    <td>{{$item->total_variabel}}</td>
                                                    <td>{{$item->tak}}</td>
                                                    <td>{{$item->adjust_thr}}</td>
                                                    <td>{{$item->thp}}</td>
                                                    <td>{{$item->bank}}</td>
                                                    <td>{{$item->norek}}</td>
                                                    <td>{{$item->an_norek}}</td>
                                                    <td>{{$item->digit_rek}}</td>
                                                    <td>{{$item->npwp}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    {{ $gaji->withQueryString()->links() }}
                                    </div>
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