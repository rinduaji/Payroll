<div>
    @if (Session::has('statusvariabel')) 
                                        @if(Session::get('statusvariabel') == 'success')
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        @else
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @endif
                                        <strong>{{Session::get('messagevariabel')}}!</strong>
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
                                                    <th>Periode</th>
                                                    <th>Perner</th>
                                                    <th>Status kontrak</th>
                                                    <th>Jamsostek Base</th>
                                                    <th>UMP Area</th>
                                                    <th>Gaji Pokok</th>
                                                    <th>Tunjangan Jabatan</th>
                                                    <th>Tunjangan Keahlian</th>
                                                    <th>Tunjangan Bahasa</th>
                                                    <th>Tunjangan Pulsa</th>
                                                    <th>Tunjangan Project</th>
                                                    <th>Tunjangan Operasional</th>
                                                    <th>Penyesuain FIX</th>
                                                    <th>Keterangan Penyesuaian</th>
                                                    <th>Total Fixed</th>
                                                    <th>HK Layanan</th>
                                                    <th>HK Real</th>
                                                    <th>Opname</th>
                                                    <th>Keterangan Aktif</th>
                                                    <th>Intensif Kehadiran</th>
                                                    <th>Rumus Reward Kehadiran</th>
                                                    <th>Reward Kehadiran</th>
                                                    <th>Reward Produktivitas</th>
                                                    <th>Reward Kualitas</th>
                                                    <th>Sales Progressive N+1</th>
                                                    <th>Sales Progressive N+3</th>
                                                    <th>Sales Progressive N+6</th>
                                                    <th>Reward Prestasi</th>
                                                    <th>Tunjangan Makan</th>
                                                    <th>Total Tunjangan Makan</th>
                                                    <th>Tunjangan Transport</th>
                                                    <th>Upah PHL</th>
                                                    <th>Tunjangan Prestasi</th>
                                                    <th>OT1</th>
                                                    <th>Jumlah OT1 (Rp)</th>
                                                    <th>OT2</th>
                                                    <th>Jumlah OT2 (Rp)</th>
                                                    <th>OT3</th>
                                                    <th>Jumlah OT3 (Rp)</th>
                                                    <th>OT4</th>
                                                    <th>Jumlah OT4 (Rp)</th>
                                                    <th>Lembur Maksimal yang Dibayarkan</th>
                                                    <th>Jumlah OT (hours)</th>
                                                    <th>Total OT (Rp)</th>
                                                    <th>Lembur AUX</th>
                                                    <th>Lembur Lain-lain</th>
                                                    <th>Lembur Khusus</th>
                                                    <th>Lembur Natura</th>
                                                    <th>HK SA</th>
                                                    <th>Shift Alowance</th>
                                                    <th>Total Shift Alowance</th>
                                                    <th>Penyesuaian Variabel</th>
                                                    <th>Keterangan Variabel</th>
                                                    <th>Total Variabel</th>
                                                    <th>TAK</th>
                                                    <th>Adjust THR</th>
                                                    <th>THP</th>
                                                    <th>Jamsostek di Tanggung Karyawan</th>
                                                    <th>PPH Ditanggung Karyawan</th>
                                                    <th>Potongan BPJS (1%)</th>
                                                    <th>Potongan Karyawan JHT dan JP</th>
                                                    <th>THP Diterima Karyawan BPJS (1%) - JHT dan JP</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataVariabel as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $item->periode }}</td>
                                                    <td>{{ $item->perner }}</td>
                                                    <td>{{$item->status_kontrak}}</td>
                                                    <td>{{$item->jamsostek_base}}</td>
                                                    <td>{{$item->ump_area}}</td>
                                                    <td>{{$item->gaji_pokok}}</td>
                                                    <td>{{$item->tunjangan_jabatan}}</td>
                                                    <td>{{ $item->tunjangan_keahlian }}</td>
                                                    <td>{{ $item->tunjangan_bahasa }}</td>
                                                    <td>{{ $item->tunjangan_pulsa }}</td>
                                                    <td>{{ $item->tunjangan_project }}</td>
                                                    <td>{{ $item->tunjangan_operasional }}</td>
                                                    <td>{{ $item->penyesuain_fix }}</td>
                                                    <td>{{ $item->keterangan_penyesuaian }}</td>
                                                    <td>{{ $item->total_fixed }}</td>
                                                    <td>{{ $item->hk_layanan }}</td>
                                                    <td>{{ $item->hk_real }}</td>
                                                    <td>{{ $item->opname }}</td>
                                                    <td>{{ $item->keterangan_aktif }}</td>
                                                    <td>{{ $item->intensif_kehadiran }}</td>
                                                    <td>{{ $item->rumus_reward_kehadiran }}</td>
                                                    <td>{{ $item->reward_kehadiran }}</td>
                                                    <td>{{ $item->t_produktivitas }}</td>
                                                    <td>{{ $item->t_kualitas }}</td>
                                                    <td>{{ $item->progresiv1 }}</td>
                                                    <td>{{ $item->progresiv3 }}</td>
                                                    <td>{{ $item->progresiv6 }}</td>
                                                    <td>{{ $item->reward_prestasi }}</td>
                                                    <td>{{ $item->t_makan }}</td>
                                                    <td>{{ $item->tot_t_makan }}</td>
                                                    <td>{{ $item->t_transport }}</td>
                                                    <td>{{ $item->upah_phl }}</td>
                                                    <td>{{ $item->t_prestasi }}</td>
                                                    <td>{{ $item->ot1 }}</td>
                                                    <td>{{ $item->jml_ot1 }}</td>
                                                    <td>{{ $item->ot2 }}</td>
                                                    <td>{{ $item->jml_ot2 }}</td>
                                                    <td>{{ $item->ot3 }}</td>
                                                    <td>{{ $item->jml_ot3 }}</td>
                                                    <td>{{ $item->ot4 }}</td>
                                                    <td>{{ $item->jml_ot4 }}</td>
                                                    <td>{{ $item->lembur_maks }}</td>
                                                    <td>{{ $item->jml_ot }}</td>
                                                    <td>{{ $item->total_ot }}</td>
                                                    <td>{{ $item->lembur_aux }}</td>
                                                    <td>{{ $item->lembur_lain }}</td>
                                                    <td>{{ $item->lembur_khusus }}</td>
                                                    <td>{{ $item->lembur_natura }}</td>
                                                    <td>{{ $item->hk_sa }}</td>
                                                    <td>{{ $item->sa }}</td>
                                                    <td>{{ $item->total_sa }}</td>
                                                    <td>{{ $item->penyesuaian_variabel }}</td>
                                                    <td>{{ $item->ket_variabel }}</td>
                                                    <td>{{ $item->total_variabel }}</td>
                                                    <td>{{ $item->tak }}</td>
                                                    <td>{{ $item->adjust_thr }}</td>
                                                    <td>{{ $item->thp }}</td>    
                                                    <td>{{ $item->jamsostek_tanggung_karyawan }}</td>
                                                    <td>{{ $item->pph_tanggung_karyawan }}</td>
                                                    <td>{{ $item->potongan_bpjs }}</td>
                                                    <td>{{ $item->potongan_karyawan_jht_jp }}</td>
                                                    <td>{{ $item->thp_karyawan_bpjs_jht_jp }}</td>                                                    
                                                    <td>
                                                        {{-- <a href="#edit{{$item->id}}" data-bs-toggle="modal" class="btn btn-success"><i class='fas fa-edit'></i> Edit</a> 
                                                        <a href="#delete{{$item->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fas fa-trash'></i> Delete</a> --}}
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#ubahVariabel" wire:click="editVariabel({{$item->id}})" data-bs-toggle="modal" class="btn btn-success"><i class='fas fa-edit'></i> Edit</button> 
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#hapusVariabel" wire:click="deleteVariabel({{$item->id}})" data-bs-toggle="modal" class="btn btn-danger"><i class='fas fa-trash'></i> Delete</button>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="ubahVariabel" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        {{-- <form method="POST" action="{{ route('payroll.variabelUpdate', $item->id) }}"> --}}
        <form wire:submit.prevent="updateVariabel">
        {{-- @csrf
        @method('PUT') --}}
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Variabel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                        <input type="hidden" wire:model="idVariabel" class="form-control" name="idVariabel" id="idVariabel" required /> 
                        <input type="hidden" class="form-control" name="login_id" id="login_id" wire:model="login_id" required />
                        <div class="mb-3">
                            <label for="periode">Periode</label>
                            <input type="number" class="form-control" name="periode" id="periode" wire:model="periode" required />
                            @error('periode') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="perner">Perner</label>
                            <select class="form-control" name="perner" id="perner" wire:model="perner" required>
                                @foreach($dataLogin as $l)
                                    <option value="{{$l->perner}}"> {{$l->layanan}} | SEGMENT {{$l->segment}} | {{$l->area}} | {{$l->perner}} | {{$l->nama}} | {{$l->jabatan}}</option>
                                @endforeach
                            </select>
                            @error('perner') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status_kontrak">Status Kontrak</label>
                            <select class="form-control" name="status_kontrak" id="status_kontrak" wire:model="status_kontrak" required>
                                <option value="">-- Pilih Status Kontrak --</option>
                                <option value="NEW">NEW</option>
                                <option value="PKWT">PKWT</option>
                                <option value="KEMITRAAN">KEMITRAAN</option>
                                <option value="PART TIME">PART TIME</option>
                                <option value="PHL">PHL</option>
                                <option value="RESIGN">RESIGN</option>
                            </select>
                            @error('status_kontrak') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ump_area">Jamsostek Base</label>
                            <input type="text" class="form-control" name="jamsostek_base" id="jamsostek_base" wire:model="jamsostek_base" required readonly/>
                            @error('ump_area') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ump_area">UMP Area</label>
                            <input type="text" class="form-control" name="ump_area" id="ump_area" wire:model="ump_area" required />
                            @error('ump_area') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gaji_pokok">Gaji Pokok</label>
                            <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" wire:model="gaji_pokok" required readonly/>
                            @error('gaji_pokok') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tunjangan_jabatan">Tunjangan Jabatan</label>
                            <input type="text" class="form-control" name="tunjangan_jabatan" id="tunjangan_jabatan" wire:model="tunjangan_jabatan" required readonly/>
                            @error('tunjangan_jabatan') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tunjangan_keahlian">Tunjangan Keahlian</label>
                            <input type="number" class="form-control" name="tunjangan_keahlian" id="tunjangan_keahlian" wire:model="tunjangan_keahlian" required />
                            @error('tunjangan_keahlian') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tunjangan_bahasa">Tunjangan Bahasa</label>
                            <input type="number" class="form-control" name="tunjangan_bahasa" id="tunjangan_bahasa" wire:model="tunjangan_bahasa" required />
                            @error('tunjangan_bahasa') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tunjangan_pulsa">Tunjangan Pulsa</label>
                            <input type="number" class="form-control" name="tunjangan_pulsa" id="tunjangan_pulsa" wire:model="tunjangan_pulsa" required />
                            @error('tunjangan_pulsa') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tunjangan_project">Tunjangan Project</label>
                            <input type="number" class="form-control" name="tunjangan_project" id="tunjangan_project" wire:model="tunjangan_project" required />
                            @error('tunjangan_project') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tunjangan_operasional">Tunjangan Operasional</label>
                            <input type="number" class="form-control" name="tunjangan_operasional" id="tunjangan_operasional" wire:model="tunjangan_operasional" required />
                            @error('tunjangan_operasional') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="penyesuain_fix">Penyesuaian Fix</label>
                            <input type="number" class="form-control" name="penyesuain_fix" id="penyesuain_fix" wire:model="penyesuain_fix" required />
                            @error('penyesuain_fix') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_penyesuaian">Keterangan Penyesuaian</label>
                            <input type="text" class="form-control" name="keterangan_penyesuaian" id="keterangan_penyesuaian" wire:model="keterangan_penyesuaian" required />
                            @error('keterangan_penyesuaian') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="total_fixed">Total Fixed</label>
                            <input type="number" class="form-control" name="total_fixed" id="total_fixed" wire:model="total_fixed" required readonly/>
                            @error('total_fixed') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="hk_layanan">HK Layanan</label>
                            <input type="text" class="form-control" name="hk_layanan" id="hk_layanan" wire:model="hk_layanan" required />
                            @error('hk_layanan') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="hk_real">HK Real</label>
                            <input type="text" class="form-control" name="hk_real" id="hk_real" wire:model="hk_real" required />
                            @error('hk_real') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="opname">Opname</label>
                            <input type="text" class="form-control" name="opname" id="opname" wire:model="opname" required />
                            @error('opname') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_aktif">Keterangan (Resign/Aktif)</label>
                            <select class="form-control" name="keterangan_aktif" id="keterangan_aktif" wire:model="keterangan_aktif" required>

                                <option value="">-- Pilih Keterangan --</option>
                                <option value="AKTIF">AKTIF</option>
                                <option value="RESIGN">RESIGN</option>
                            </select>
                            @error('keterangan_aktif') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="intensif_kehadiran">Insentif Kehadiran</label>
                            <input type="number" class="form-control" name="intensif_kehadiran" id="intensif_kehadiran" wire:model="intensif_kehadiran" required />
                            @error('intensif_kehadiran') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rumus_reward_kehadiran">Rumus Reward Kehadiran</label>
                            <input type="number" class="form-control" name="rumus_reward_kehadiran" id="rumus_reward_kehadiran" wire:model="rumus_reward_kehadiran" required readonly />
                            @error('rumus_reward_kehadiran') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="reward_kehadiran">Reward Kehadiran</label>
                            <input type="number" class="form-control" name="reward_kehadiran" id="reward_kehadiran" wire:model="reward_kehadiran" required />
                            @error('reward_kehadiran') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="t_produktivitas">T. Produktivitas</label>
                            <input type="number" class="form-control" name="t_produktivitas" id="t_produktivitas" wire:model="t_produktivitas" required />
                            @error('t_produktivitas') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="t_kualitas">T. Qualitas</label>
                            <input type="number" class="form-control" name="t_kualitas" id="t_kualitas" wire:model="t_kualitas" required />
                            @error('t_kualitas') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="progresiv1">Sales Progressive N+1</label>
                            <input type="number" class="form-control" name="progresiv1" id="progresiv1" wire:model="progresiv1" required />
                            @error('progresiv1') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="progresiv3">Sales Progressive N+3</label>
                            <input type="number" class="form-control" name="progresiv3" id="progresiv3" wire:model="progresiv3" required />
                            @error('progresiv3') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="progresiv6">Sales Progressive N+6</label>
                            <input type="number" class="form-control" name="progresiv6" id="progresiv6" wire:model="progresiv6" required />
                            @error('progresiv6') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="reward_prestasi">Reward Prestasi</label>
                            <input type="number" class="form-control" name="reward_prestasi" id="reward_prestasi" wire:model="reward_prestasi" required />
                            @error('reward_prestasi') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="t_makan">Tunjangan Makan</label>
                            <input type="number" class="form-control" name="t_makan" id="t_makan" wire:model="t_makan" required />
                            @error('t_makan') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tot_t_makan">Total Tunjangan Makan</label>
                            <input type="number" class="form-control" name="tot_t_makan" id="tot_t_makan" wire:model="tot_t_makan" required readonly/>
                            @error('tot_t_makan') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="t_transport">Tunjangan Transport</label>
                            <input type="number" class="form-control" name="t_transport" id="t_transport" wire:model="t_transport" required />
                            @error('t_transport') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="upah_phl">UPAH PHL</label>
                            <input type="number" class="form-control" name="upah_phl" id="upah_phl" wire:model="upah_phl" required readonly/>
                            @error('upah_phl') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="t_prestasi">Tunjangan Prestasi</label>
                            <input type="number" class="form-control" name="t_prestasi" id="t_prestasi" wire:model="t_prestasi" required />
                            @error('t_prestasi') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ot1">OT1</label>
                            <input type="number" class="form-control" name="ot1" id="ot1" wire:model="ot1" required />
                            @error('ot1') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jml_ot1">Juml OT1 (Rp)</label>
                            <input type="number" class="form-control" name="jml_ot1" id="jml_ot1" wire:model="jml_ot1" required readonly/>
                            @error('jml_ot1') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ot2">OT2</label>
                            <input type="text" class="form-control" name="ot2" id="ot2" wire:model="ot2" required />
                            @error('ot2') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jml_ot2">Juml OT2 (Rp)</label>
                            <input type="number" class="form-control" name="jml_ot2" id="jml_ot2" wire:model="jml_ot2" required readonly/>
                            @error('jml_ot2') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ot3">OT3</label>
                            <input type="text" class="form-control" name="ot3" id="ot3" wire:model="ot3" required />
                            @error('ot3') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jml_ot3">Juml OT3 (Rp)</label>
                            <input type="text" class="form-control" name="jml_ot3" id="jml_ot3" wire:model="jml_ot3" required readonly/>
                            @error('jml_ot3') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ot4">OT4</label>
                            <input type="number" class="form-control" name="ot4" id="ot4" wire:model="ot4" required />
                            @error('ot4') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jml_ot4">Juml OT4 (Rp)</label>
                            <input type="number" class="form-control" name="jml_ot4" id="jml_ot4" wire:model="jml_ot4" required readonly/>
                            @error('jml_ot4') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lembur_maks">Lembur Maksimal yg Di bayarkan</label>
                            <input type="number" class="form-control" name="lembur_maks" id="lembur_maks" wire:model="lembur_maks" required />
                            @error('lembur_maks') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jml_ot">Jumlah OT (Hours)</label>
                            <input type="text" class="form-control" name="jml_ot" id="jml_ot" wire:model="jml_ot" required />
                            @error('jml_ot') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="total_ot">Total OT (Rp)</label>
                            <input type="number" class="form-control" name="total_ot" id="total_ot" wire:model="total_ot" required  readonly/>
                            @error('total_ot') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lembur_aux">Lembur AUX</label>
                            <input type="number" class="form-control" name="lembur_aux" id="lembur_aux" wire:model="lembur_aux" required />
                            @error('lembur_aux') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lembur_lain">Lembur Lain-lain</label>
                            <input type="number" class="form-control" name="lembur_lain" id="lembur_lain" wire:model="lembur_lain" required />
                            @error('lembur_lain') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lembur_khusus">Lembur Khusus</label>
                            <input type="number" class="form-control" name="lembur_khusus" id="lembur_khusus" wire:model="lembur_khusus" required />
                            @error('lembur_khusus') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lembur_natura">Lembur Natura</label>
                            <input type="number" class="form-control" name="lembur_natura" id="lembur_natura" wire:model="lembur_natura" required />
                            @error('lembur_natura') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="hk_sa">HK SA</label>
                            <input type="text" class="form-control" name="hk_sa" id="hk_sa" wire:model="hk_sa" required />
                            @error('hk_sa') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sa">Shift Alowance</label>
                            <input type="number" class="form-control" name="sa" id="sa" wire:model="sa" required />
                            @error('sa') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="total_sa">Total Shift Allowance</label>
                            <input type="number" class="form-control" name="total_sa" id="total_sa" wire:model="total_sa" required readonly/>
                            @error('total_sa') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="penyesuaian_variabel">Penyesuaian Variabel</label>
                            <input type="number" class="form-control" name="penyesuaian_variabel" id="penyesuaian_variabel" wire:model="penyesuaian_variabel" required />
                            @error('penyesuaian_variabel') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ket_variabel">Keterangan Variabel</label>
                            <input type="number" class="form-control" name="ket_variabel" id="ket_variabel" wire:model="ket_variabel" required />
                            @error('ket_variabel') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="total_variabel">Total Variabel</label>
                            <input type="number" class="form-control" name="total_variabel" id="total_variabel" wire:model="total_variabel" required readonly/>
                            @error('total_variabel') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tak">TAK</label>
                            <input type="number" class="form-control" name="tak" id="tak" wire:model="tak" required />
                            @error('tak') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="adjust_thr">Adjust THR</label>
                            <input type="text" class="form-control" name="adjust_thr" id="adjust_thr" wire:model="adjust_thr" required />
                            @error('adjust_thr') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="thp">THP</label>
                            <input type="number" class="form-control" name="thp" id="thp" wire:model="thp" required readonly/>
                            @error('thp') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jamsostek_tanggung_karyawan">Jamsostek di Tanggung Karyawan</label>
                            <input type="number" class="form-control" name="jamsostek_tanggung_karyawan" id="jamsostek_tanggung_karyawan" wire:model="jamsostek_tanggung_karyawan" required />
                            @error('jamsostek_tanggung_karyawan') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pph_tanggung_karyawan">PPH Ditanggung Karyawan</label>
                            <input type="number" class="form-control" name="pph_tanggung_karyawan" id="pph_tanggung_karyawan" wire:model="pph_tanggung_karyawan" required />
                            @error('pph_tanggung_karyawan') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="potongan_bpjs">Potongan BPJS (1%)</label>
                            <input type="text" class="form-control" name="potongan_bpjs" id="potongan_bpjs" wire:model="potongan_bpjs" required />
                            @error('potongan_bpjs') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="potongan_karyawan_jht_jp">Potongan Karyawan JHT dan JP</label>
                            <input type="number" class="form-control" name="potongan_karyawan_jht_jp" id="potongan_karyawan_jht_jp" wire:model="potongan_karyawan_jht_jp" required />
                            @error('potongan_karyawan_jht_jp') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="thp_karyawan_bpjs_jht_jp">THP Diterima Karyawan BPJS (1%) - JHT dan JP</label>
                            <input type="number" class="form-control" name="thp_karyawan_bpjs_jht_jp" id="thp_karyawan_bpjs_jht_jp" wire:model="thp_karyawan_bpjs_jht_jp" required readonly/>
                            @error('thp_karyawan_bpjs_jht_jp') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>   
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary btn-small text-white" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="button" wire:click="updateVariabel" class="btn btn-success btn-small text-white"><i class="fa fa-check-square-o"></i> Update</button>
            </div>
        </form>
    </div>
  </div>
</div>
 
<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="hapusVariabel" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        {{-- <form method="POST" action="{{ route('payroll.variabelDelete', $item->id) ">
        @csrf
        @method('DELETE') --}}
        <form>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Variabel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <input type="hidden" wire:model="idVariabel" class="form-control" name="idVariabel" id="idVariabel" required />
                    <h4 class="text-center">Are you sure you want to delete variabel?</h4>
                    <h5 class="text-center">Perner & Periode: {{ $item->perner }} ({{ $item->periode }})</h5>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary text-white" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="button" wire:click="destroyVariabel" class="btn btn-danger text-white"><i class="fa fa-trash"></i> Delete</button>
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
                                    {{ $dataVariabel->withQueryString()->links() }}
                                    </div>
</div>
