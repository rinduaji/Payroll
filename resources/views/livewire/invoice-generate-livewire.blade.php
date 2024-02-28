<div>
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
        <label for="jabatan" class="col-md-12">jabatan</label>
    </div>
    <div class="col-md-12">
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
    <div class="col-md-12">
        <br><br>
        <button wire:click="generateInvoice" class="form-control form-control-line btn btn-primary text-white">
            Generate
        </button>
    </div>
</div>
