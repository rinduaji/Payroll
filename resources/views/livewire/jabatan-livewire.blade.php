<div>
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
<div>
    <div class="input-group mb-3">
        <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addJabatan">
            <i class='fas fa-add'></i> Add Jabatan
        </button>
    </div>
</div>
<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="addJabatan" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add Jabatan</h5>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select wire:model="id_layanan" class="form-control" name="id_layanan" id="id_layanan">
                    <option value="" selected>--Pilih Layanan--</option>
                    @foreach ($dataLayanan as $l)
                        <option value="{{$l->id}}">{{$l->nama_layanan}} | SEGMENT {{$l->segment}} | {{$l->area}} ({{$l->kode}})</option>
                    @endforeach
                    @error('id_layanan') <span class="error text-danger">{{ $message }}</span> @enderror
                </select>
                <div class="mb-3">
                    <label for="nama_jabatan">Nama Jabatan</label>
                    <input type="text" wire:model="nama_jabatan" class="form-control" name="nama_jabatan" id="nama_jabatan" placeholder="Masukkan Nama Jabatan" required />
                    @error('nama_jabatan') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="gaji_pokok">Gaji Pokok</label>
                    <input type="number" wire:model="gaji_pokok" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Masukkan Gaji Pokok" required/>
                    @error('gaji_pokok') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="t_jabatan">Tunjangan jabatan</label>
                    <input type="number" wire:model="t_jabatan" class="form-control" name="t_jabatan" id="t_jabatan" placeholder="Masukkan Tunjangan Jabatan" required />
                    @error('t_jabatan') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="closeModal" class="btn btn-secondary btn-small text-white" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button wire:click="storeJabatan"  class="btn btn-success btn-small text-white"><i class="fa fa-check-square-o"></i> Add</button>
            </div>
        </div>
    </div>
</div>
    
   <div class="table-responsive">
        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
        width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Layanan</th>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan Jabatan</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                ?>
                @forelse ($dataJabatan as $j)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$j->nama_layanan}} | SEGMENT {{$j->segment}} | {{$j->area}} ({{$j->kode}})</td>
                    <td>{{ $j->nama_jabatan }}</td>
                    <td>{{$j->gaji_pokok}}</td>
                    <td>{{$j->t_jabatan}}</td>
                    <td>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#ubahJabatan" wire:click="editJabatan({{$j->id}})" data-bs-toggle="modal" class="btn btn-success"><i class='fas fa-edit'></i> Edit</button> 
                        <button type="button" data-bs-toggle="modal" data-bs-target="#hapusJabatan" wire:click="deleteJabatan({{$j->id}})" data-bs-toggle="modal" class="btn btn-danger"><i class='fas fa-trash'></i> Delete</button>
                        

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="ubahJabatan" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="myModalLabel">Edit Jabatan</h5>
<button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form wire:submit.prevent="update">
<div class="modal-body">
<input type="hidden" wire:model="idJabatan" class="form-control" name="idJabatan" id="idJabatan" required />
<div class="mb-3">
<label for="id_layanan">Nama Layanan</label>
<select wire:model="id_layanan" class="form-control" name="id_layanan" id="id_layanan">
    <option value="">--Pilih Layanan--</option>
    @foreach ($dataLayanan as $l)
        <option value="{{$l->id}}">{{$l->nama_layanan}} |  SEGMENT {{$l->segment}} | {{$l->area}} ({{$l->kode}})</option>
    @endforeach
    @error('id_layanan') <span class="error text-danger">{{ $message }}</span> @enderror
</select>
</div>
<div class="mb-3">
<label for="nama_jabatan">Nama Jabatan</label>
<input type="text" wire:model="nama_jabatan" class="form-control" name="nama_jabatan" id="nama_jabatan" required/>
@error('nama_jabatan') <span class="error text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
<label for="gaji_pokok">Gaji Pokok</label>
<input type="number" wire:model="gaji_pokok" class="form-control" name="gaji_pokok" id="gaji_pokok" required />
@error('gaji_pokok') <span class="error text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
<label for="t_jabatan">Tunjangan Jabatan</label>
<input type="number" wire:model="t_jabatan" class="form-control" name="t_jabatan" id="t_jabatan" required />
@error('t_jabatan') <span class="error text-danger">{{ $message }}</span> @enderror
</div>   
</div>
<div class="modal-footer">
<button type="button" wire:click="closeModal" class="btn btn-secondary btn-small text-white" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
<button type="button" wire:click="updateJabatan" class="btn btn-success btn-small text-white"><i class="fa fa-check-square-o"></i> Update</button>
</div>
</form>
</div>
</div>
</div>

<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="hapusJabatan" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="myModalLabel">Delete Jabatan</h5>
<button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form wire:submit.prevent="destroyJabatan">
<div class="modal-body">
    <input type="hidden" wire:model="idJabatan" class="form-control" name="idJabatan" id="idJabatan" required />
<h4 class="text-center">Are you sure you want to delete data jabatan?</h4>
<h5 class="text-center">Nama Layanan & Nama Jabatan: {{ $j->nama_layanan }} ({{ $j->nama_jabatan }})</h5>
</div>
<div class="modal-footer">
<button type="button" wire:click="closeModal" class="btn btn-secondary text-white" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
<button type="submit" class="btn btn-danger text-white"><i class="fa fa-trash"></i> Delete</button>
</div>
</form>
</div>
</div>
</div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-align">TIDAK ADA DATA</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    {{ $dataJabatan->withQueryString()->links() }}
    </div>

</div>
