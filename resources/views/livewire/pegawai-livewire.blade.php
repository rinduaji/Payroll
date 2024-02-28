<div>
    @if (Session::has('statuspegawai')) 
                                        @if(Session::get('statuspegawai') == 'success')
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        @else
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @endif
                                        <strong>{{Session::get('messagepegawai')}}!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <div>
                                        <div class="input-group mb-3">
                                            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." />
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                                        width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>layanan</th>
                                                    <th>area</th>
                                                    <th>jabatan</th>
                                                    <th>perner</th>
                                                    <th>nama</th>
                                                    <th>jenis kelamin</th>
                                                    <th>status perkawinan</th>
                                                    <th>jumlah anak</th>
                                                    <th>nomer jamsostek</th>
                                                    <th>asuransi kesehatan</th>
                                                    <th>kelas asuransi</th>
                                                    <th>no asuransi</th>
                                                    <th>tgl kontrak</th>
                                                    <th>tgl end kontrak</th>
                                                    <th>ppjp</th>
                                                    <th>bank</th>
                                                    <th>no rekening</th>
                                                    <th>atas nama no rekening</th>
                                                    <th>digit rekening</th>
                                                    <th>npwp</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataPegawai as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$item->layanan}}</td>
                                                    <td>{{$item->area}}</td>
                                                    <td>{{$item->jabatan}}</td>
                                                    <td>{{$item->perner}}</td>
                                                    <td>{{$item->nama}}</td>
                                                    <td>{{$item->jenis_kelamin}}</td>
                                                    <td>{{$item->status_perkawinan}}</td>
                                                    <td>{{$item->jumlah_anak}}</td>
                                                    <td>{{$item->nomer_jamsostek}}</td>
                                                    <td>{{$item->asuransi_kesehatan}}</td>
                                                    <td>{{$item->kelas_asuransi}}</td>
                                                    <td>{{$item->no_asuransi}}</td>
                                                    <td>{{date("l, d F Y", strtotime($item->tgl_kontrak))}}</td>
                                                    <td>{{date("l, d F Y", strtotime($item->tgl_endkontrak))}}</td>
                                                    <td>{{$item->ppjp}}</td>
                                                    <td>{{$item->bank}}</td>
                                                    <td>{{$item->norek}}</td>
                                                    <td>{{$item->an_norek}}</td>
                                                    <td>{{$item->digit_rek}}</td>
                                                    <td>{{$item->npwp}}</td>
                                                    <td>
                                                        {{-- <a href="#edit{{$item->id}}" data-bs-toggle="modal" class="btn btn-success"><i class='fas fa-edit'></i> Edit</a> 
                                                        <a href="#delete{{$item->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fas fa-trash'></i> Delete</a>
                                                         --}}
                                                         <button type="button" data-bs-toggle="modal" data-bs-target="#ubahPegawai" wire:click="editPegawai({{$item->id}})" data-bs-toggle="modal" class="btn btn-success"><i class='fas fa-edit'></i> Edit</button> 
                                                         @if(Auth::user()->jabatan_id == 51 && Auth::user()->jabatan_id == 51) 
                                                         <button type="button" data-bs-toggle="modal" data-bs-target="#hapusPegawai" wire:click="deletePegawai({{$item->id}})" data-bs-toggle="modal" class="btn btn-danger"><i class='fas fa-trash'></i> Delete</button>
                                                         @endif

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="ubahPegawai" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        {{-- <form method="POST" action="{{ route('payroll.pegawaiUpdate', $item->id)">
        @csrf
        @method('PUT') --}}
        <form wire:submit.prevent="updatePegawai">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                        <input type="hidden" class="form-control" name="user_id" id="user_id" wire:model="user_id" required />
                        <div class="mb-3">
                            <label for="layanan">Layanan</label>
                            {{-- <input type="text" class="form-control" name="layanan" id="layanan" wire:model="layanan" required /> --}}
                            <select class="form-control" name="layanan" id="layanan" wire:model="layanan" required>
                                <option value="">-- Pilih Layanan --</option>
                                @foreach($dataLayanan as $dl)
                                    <option value="{{$dl->nama_layanan}}">{{$dl->nama_layanan}} | SEGMENT {{$dl->segment}} </option>
                                @endforeach
                            </select>
                            @error('layanan') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="area">Area</label>
                            {{-- <input type="text" class="form-control" name="area" id="area" wire:model="area" required /> --}}
                            <select class="form-control" name="area" id="area" wire:model="area" required>
                                <option value="">-- Pilih Area --</option>
                                @if(!is_null($dataArea))
                                @foreach($dataArea as $da)
                                    <option value="{{$da->area}}">{{$da->area}}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('area') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" name="jabatan" id="jabatan" wire:model="jabatan" required>
                                <option value="">-- Pilih Jabatan --</option>
                                @if(!is_null($dataJabatan))
                                @foreach($dataJabatan as $dj)
                                    <option value="{{$dj->nama_jabatan}}">{{$dj->nama_jabatan}}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('jabatan') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="perner">Perner</label>
                            <input type="text" class="form-control" name="perner" id="perner" wire:model="perner" required />
                            @error('perner') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" wire:model="nama" required />
                            @error('nama') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            {{-- <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" wire:model="jenis_kelamin" required /> --}}
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" wire:model="jenis_kelamin" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="PRIA">PRIA</option>
                                <option value="WANITA">WANITA</option>
                            </select>
                            @error('jenis_kelamin') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status_perkawinan">Status Perkawinan</label>
                            {{-- <input type="text" class="form-control" name="status_perkawinan" id="status_perkawinan" wire:model="status_perkawinan" required /> --}}
                            <select class="form-control" name="status_perkawinan" id="status_perkawinan" wire:model="status_perkawinan" required>
                                <option value="">-- Pilih Status perkawinan --</option>
                                <option value="SINGLE">SINGLE</option>
                                <option value="MENIKAH">MENIKAH</option>
                                <option value="CERAI">CERAI</option>
                            </select>
                            @error('status_perkawinan') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_anak">Jumlah Anak</label>
                            <input type="number" class="form-control" name="jumlah_anak" id="jumlah_anak" wire:model="jumlah_anak" required />
                            @error('jumlah_anak') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nomer_jamsostek">No Jamsostek</label>
                            <input type="text" class="form-control" name="nomer_jamsostek" id="nomer_jamsostek" wire:model="nomer_jamsostek" required />
                            @error('nomer_jamsostek') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="asuransi_kesehatan">Asuransi Kesehatan</label>
                            <input type="text" class="form-control" name="asuransi_kesehatan" id="asuransi_kesehatan" wire:model="asuransi_kesehatan" required />
                            @error('asuransi_kesehatan') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kelas_asuransi">Kelas Asuransi</label>
                            <input type="text" class="form-control" name="kelas_asuransi" id="kelas_asuransi" wire:model="kelas_asuransi" required />
                            @error('kelas_asuransi') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_asuransi">No Asuransi</label>
                            <input type="text" class="form-control" name="no_asuransi" id="no_asuransi" wire:model="no_asuransi" required />
                            @error('no_asuransi') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_kontrak">Tanggal Kontrak</label>
                            <input type="date" class="form-control" name="tgl_kontrak" id="tgl_kontrak" wire:model="tgl_kontrak" required />
                            @error('tgl_kontrak') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_endkontrak">Tanggal End Kontrak</label>
                            <input type="date" class="form-control" name="tgl_endkontrak" id="tgl_endkontrak" wire:model="tgl_endkontrak" required />
                            @error('tgl_endkontrak') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ppjp">PPJP</label>
                            <input type="text" class="form-control" name="ppjp" id="ppjp" wire:model="ppjp" required />
                            @error('ppjp') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bank">Bank</label>
                            <input type="text" class="form-control" name="bank" id="bank" wire:model="bank" required />
                            @error('bank') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="norek">No Rekening</label>
                            <input type="text" class="form-control" name="norek" id="norek" wire:model="norek" required />
                            @error('norek') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="an_norek">Atas Nama No Rekening</label>
                            <input type="text" class="form-control" name="an_norek" id="an_norek" wire:model="an_norek" required />
                            @error('an_norek') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="digit_rek">Digit Rekening</label>
                            <input type="text" class="form-control" name="digit_rek" id="digit_rek" wire:model="digit_rek" required readonly/>
                            @error('digit_rek') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="npwp">NPWP</label>
                            <input type="text" class="form-control" name="npwp" id="npwp" wire:model="npwp" required />
                            @error('npwp') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-small text-white" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-success btn-small text-white"><i class="fa fa-check-square-o"></i> Update</button>
            </div>
        </form>
    </div>
  </div>
</div>
 
<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="hapusPegawai" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        {{-- <form method="POST" action="{{ route('payroll.pegawaiDelete', $item->id) ">
        @csrf
        @method('DELETE') --}}
        <form wire:submit.prevent="destroyPegawai">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <h4 class="text-center">Are you sure you want to delete pegawai?</h4>
                    <h5 class="text-center">Nama & Perner: {{ $item->nama }} ({{ $item->perner }})</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-danger text-white"><i class="fa fa-trash"></i> Delete</button>
            </div>
        </form>
    </div>
  </div>
</div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    {{ $dataPegawai->withQueryString()->links() }}
                                    </div>
</div>
