@extends('layouts.admin.main')

@section('content')
    <div class="section">

        {{-- section header --}}
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/motor') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
             </div>
            <h1>Detail Motor {{ $detailMotor->nama_motor }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/motor') }}">Daftar Motor</a></div>
                <div class="breadcrumb-item active">Detail Motor {{ $detailMotor->nama_motor }}</div>
            </div>
        </div>

        {{-- section body --}}
        <div class="section-body">

            {{-- notifikasi form sukses --}}
            @if (session('status'))
                <div class="alert alert-info alert-dismissible show fade" id="alert">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                        </button>
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            {{-- script hide otomatis alert --}}
            <script>
                setTimeout(function () {
                    document.getElementById('alert').style.display='none';}, 
                    5000
                );
            </script>
            
            {{-- detail motor --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                {{-- kategori motor --}}
                                <div class="form-group col-md-4">
                                    <label name="nama_motor">Kategori Motor</label>
                                    <input type="text" class="form-control" name="nama_motor" value="{{ $detailMotor->tipe->kategori->nama_kategori }}" disabled>
                                </div>

                                {{-- tipe motor --}}
                                <div class="form-group col-md-4">
                                    <label name="nama_motor">Tipe Motor</label>
                                    <input type="text" class="form-control" name="nama_motor" value="{{ $detailMotor->tipe->nama_tipe }}" disabled>
                                </div>

                                {{-- harga otr motor --}}
                                <div class="form-group col-md-4">
                                    <label name="nama_motor">Harga OTR</label>
                                    <input type="text" class="form-control" name="nama_motor" value="Rp {{ number_format($detailMotor->harga_otr) }}" disabled>
                                </div>
                                
                                {{-- warna motor --}}
                                <div class="form-group col-md-4">
                                    <label name="nama_motor">Warna Motor</label><br>
                                    @forelse (json_decode($detailMotor->warna) as $warna)
                                        <span class="btn btn-outline-dark">{{ ucwords($warna) }}</span>
                                    @empty
                                        Warna belum tersedia.
                                    @endforelse
                                </div>

                            </div>
                            {{-- row --}}
                        </div>
                        {{-- card body --}}
                    </div>
                    {{-- card --}}
                </div>
                {{-- col 12 detail motor --}}
            </div>

            {{-- detail harga motor --}}
            <div class="row">
				<div class="col-12">
					<div class="card">
                        <div class="card-header">
                            <h4>Daftar Harga dan Cicilan Motor</h4>
                            <a class="btn btn-primary mr-2" href="{{ url('/pricelists/').'/'.$detailMotor->slug.'/create' }}">Tambah Harga</a>
                            <button class="btn btn-danger" id="idHapusSemuaPricelist" title="Hapus Semua Pricelist Motor" data-toggle="modal" data-target="#hapusPricelist" data-url="{{ url('/pricelists').'/'.$detailMotor->slug.'/delete' }}">Delete Semua Harga Motor</button>
						</div>
						<div class="card-body">

							<div class="table-responsive">
								<table class="table table-striped">
								<tr>
									<th>Nomor</th>
									<th>Uang Muka</th>
									<th>Uang Muka Setelah Diskon</th>
									<th>Bulan 11</th>
									<th>Bulan 17</th>
									<th>Bulan 23</th>
									<th>Bulan 27</th>
                                    <th>Bulan 29</th>
                                    <th>Bulan 33</th>
                                    <th>Bulan 35</th>
                                    <th>Bulan 47</th>
                                    <th>Bulan 59</th>
                                    <th>Action</th>
								</tr>
								@forelse ($detailMotor->pricelists as $pricelist)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>Rp {{ number_format($pricelist->uang_muka) }}</td>
                                    <td>Rp {{ number_format($pricelist->diskon) }}</td>
                                    <td>Rp {{ number_format($pricelist->bulan_11) }}</td>
                                    <td>Rp {{ number_format($pricelist->bulan_17) }}</td>
                                    <td>Rp {{ number_format($pricelist->bulan_23) }}</td>
                                    <td>Rp {{ number_format($pricelist->bulan_27) }}</td>
                                    <td>Rp {{ number_format($pricelist->bulan_29) }}</td>
                                    <td>Rp {{ number_format($pricelist->bulan_33) }}</td>
                                    <td>Rp {{ number_format($pricelist->bulan_35) }}</td>
                                    <td>Rp {{ number_format($pricelist->bulan_47) }}</td>
                                    <td>Rp {{ number_format($pricelist->bulan_59) }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info mb-1 mt-1" href="{{ url('/pricelists').'/'.$detailMotor->slug.'/'.$pricelist->id.'/edit' }}"><i class="fa fa-edit"></i> Ubah</a>
                                        <button class="btn btn-sm btn-danger mb-1 mt-1" id="idHapusPricelist" title="Hapus Pricelist Motor" data-toggle="modal" data-target="#hapusPricelist" data-url="{{ url('/pricelists').'/'.$detailMotor->slug.'/'.$pricelist->id.'/delete' }}"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                 </tr>
                                @empty
                                    Daftar harga belum tersedia.
                                @endforelse
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>

        </div>
          
    </div>

    {{-- modal --}}
    <div class="modal fade" id="hapusPricelist" tabindex="-1" role="dialog" aria-labelledby="hapusPricelistLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"></h6>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form id="formHapusPricelist" action="" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-secondary">Delete</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection