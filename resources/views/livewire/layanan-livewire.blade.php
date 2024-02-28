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
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addLayanan">
            <i class='fas fa-add'></i> Add Layanan
        </button>
    </div>
</div>
<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="addLayanan" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add Layanan</h5>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama_layanan">Nama Layanan</label>
                    <input type="text" wire:model="nama_layanan" class="form-control" name="nama_layanan" id="nama_layanan" placeholder="Masukkan Nama Layanan" required />
                    @error('nama_layanan') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="segment">Segment</label>
                    <input type="number" wire:model="segment" class="form-control" name="segment" id="segment" placeholder="Masukkan Segment" required/>
                    @error('segment') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="area">Area</label>
                    <input type="text" wire:model="area" class="form-control" name="area" id="area" placeholder="Masukkan Area" required />
                    @error('area') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="kode">Kode</label>
                    <input type="text" wire:model="kode" class="form-control" name="kode" id="kode" placeholder="Masukkan Kode" required />
                    @error('kode') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>   
            </div>
            <div class="modal-footer">
                <button wire:click="closeModal" class="btn btn-secondary btn-small text-white" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button wire:click="store"  class="btn btn-success btn-small text-white"><i class="fa fa-check-square-o"></i> Add</button>
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
                    <th>Segment</th>
                    <th>Area</th>
                    <th>Kode</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                ?>
                @forelse ($dataLayanan as $l)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{ $l->nama_layanan }}</td>
                    <td>{{ $l->segment }}</td>
                    <td>{{$l->area}}</td>
                    <td>{{$l->kode}}</td>
                    <td>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#ubahLayanan" wire:click="editLayanan({{$l->id}})" data-bs-toggle="modal" class="btn btn-success"><i class='fas fa-edit'></i> Edit</button> 
                        <button type="button" data-bs-toggle="modal" data-bs-target="#hapusLayanan" wire:click="deleteLayanan({{$l->id}})" data-bs-toggle="modal" class="btn btn-danger"><i class='fas fa-trash'></i> Delete</button>
                        

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="ubahLayanan" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="myModalLabel">Edit Layanan</h5>
<button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form wire:submit.prevent="update">
<div class="modal-body">
<input type="hidden" wire:model="idLayanan" class="form-control" name="idLayanan" id="idLayanan" required />
<div class="mb-3">
<label for="nama_layanan">Nama Layanan</label>
<input type="text" wire:model="nama_layanan" class="form-control" name="nama_layanan" id="nama_layanan" required />
@error('nama_layanan') <span class="error text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
<label for="segment">Segment</label>
<input type="number" wire:model="segment" class="form-control" name="segment" id="segment" required/>
@error('segment') <span class="error text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
<label for="area">Area</label>
<input type="text" wire:model="area" class="form-control" name="area" id="area" required />
@error('area') <span class="error text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
<label for="kode">Kode</label>
<input type="text" wire:model="kode" class="form-control" name="kode" id="kode" required />
@error('kode') <span class="error text-danger">{{ $message }}</span> @enderror
</div>   
</div>
<div class="modal-footer">
<button type="button" wire:click="closeModal" class="btn btn-secondary btn-small text-white" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
<button type="button" wire:click="updateLayanan" class="btn btn-success btn-small text-white"><i class="fa fa-check-square-o"></i> Update</button>
</div>
</form>
</div>
</div>
</div>

<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="hapusLayanan" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="myModalLabel">Delete Layanan</h5>
<button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form wire:submit.prevent="destroyLayanan">
<div class="modal-body">
    <input type="hidden" wire:model="idLayanan" class="form-control" name="idLayanan" id="idLayanan" required />
<h4 class="text-center">Are you sure you want to delete data layanan?</h4>
<h5 class="text-center">Nama Layanan & Segment: {{ $l->nama_layanan }} ({{ $l->segment }})</h5>
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
    {{ $dataLayanan->withQueryString()->links() }}
    </div>

</div>
