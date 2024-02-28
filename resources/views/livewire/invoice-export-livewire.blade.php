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
    <div class="col-md-12">
        <label for="periode" class="col-md-12">Periode</label>
    </div>
    <div class="col-md-12">
        <input type="text" class="form-control form-control-line" name="periode" id="periode" wire:model="periode" placeholder="Masukkan Periode" required>
        @error('periode') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-12">
        <label for="layanan" class="col-md-12">Layanan</label>
    </div>
    <div class="col-md-12">
        <select class="form-control" name="layanan" id="layanan" wire:model="layanan" required>
            <option value="">-- Pilih Layanan --</option>
            @foreach($dataLayanan as $dl)
                <option value="{{$dl->nama_layanan}}">{{$dl->nama_layanan}} | SEGMENT {{$dl->segment}} </option>
            @endforeach
        </select>
        @error('layanan') <span class="error text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="col-md-12">
        <label for="area" class="col-md-12">Area</label>
    </div>
    <div class="col-md-12">
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
    <div class="col-md-12">
        <br><br>
        <button wire:click="invoiceExport" class="form-control form-control-line btn btn-success text-white">
            Export Excel
        </button>
    </div>
</div>
