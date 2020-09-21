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
                            <a class="btn btn-primary" href="{{ url('/pricelists/').'/'.$detailMotor->slug.'/create' }}">Tambah Harga</a>
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
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ url('/motor').'/'.'/pricelist'.$pricelist->id.'/edit' }}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i></a>
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
@endsection