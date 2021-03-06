@extends('layouts.admin.main')

@section('content')
<section class="section">

	{{-- Section Header --}}
	<div class="section-header">
		<div class="section-header-back">
			<a href="{{ url('/motor').'/'.$motor->slug.'/detail' }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
		</div>
		<h1>{{ $title }}</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
			<div class="breadcrumb-item active"><a href="{{ url('/pricelists') }}">Daftar Harga Cicilan Motor</a></div>
			<div class="breadcrumb-item">{{ $title }}</div>
		</div>
	</div>
	{{-- End Section Header --}}
	
	{{-- Section Body --}}
	<div class="section-body">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<form class="needs-validation" novalidate="" method="post" action="{{ url('/pricelists').'/'.$motor->slug }}">
						@csrf

						{{-- Card Body --}}
						<div class="card-body">

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" name="nama_kategori">Kategori Motor <span style="color: red">*</span></label>
								<div class="col-sm-10">
									<input type="hidden" name="motor_id" value="{{ $motor->id }}">
									<input class="form-control" type="text" name="nama_motor" required="" value="{{ $motor->nama_motor }}" readonly>
									<div class="invalid-feedback">
										Kategori motor wajib di isi.
									</div>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" name="uang_muka">DP <span style="color: red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="text"  name="uang_muka" required="" value="{{ old('uang_muka') }}">
									<div class="invalid-feedback">
										Uang muka wajib di isi.
									</div>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" name="diskon">Potongan DP </label>
								<div class="col-sm-10">
									<input class="form-control" type="text"  name="diskon" value="{{ old('diskon') }}">
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" name="bulan_11">Biaya Pembayaran 11 Bulan <span style="color: red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="text"  name="bulan_11" required="" value="{{ old('bulan_11') }}">
									<div class="invalid-feedback">
										Biaya Pembayaran motor wajib di isi.
									</div>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" name="bulan_17">Biaya Pembayaran 17 Bulan <span style="color: red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="text"  name="bulan_17" required="" value="{{ old('bulan_17') }}">
									<div class="invalid-feedback">
										Biaya Pembayaran motor wajib di isi.
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" name="bulan_23">Biaya Pembayaran 23 Bulan <span style="color: red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="text"  name="bulan_23" required="" value="{{ old('bulan_23') }}">
									<div class="invalid-feedback">
										Biaya Pembayaran motor wajib di isi.
									</div>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" name="bulan_27">Biaya Pembayaran 27 Bulan <span style="color: red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="text"  name="bulan_27" required="" value="{{ old('bulan_27') }}">
									<div class="invalid-feedback">
										Biaya Pembayaran motor wajib di isi.
									</div>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" name="bulan_29">Biaya Pembayaran 29 Bulan <span style="color: red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="text"  name="bulan_29" required="" value="{{ old('bulan_29') }}">
									<div class="invalid-feedback">
										Biaya Pembayaran motor wajib di isi.
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" name="bulan_33">Biaya Pembayaran 33 Bulan <span style="color: red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="text"  name="bulan_33" required="" value="{{ old('bulan_33') }}">
									<div class="invalid-feedback">
										Biaya Pembayaran motor wajib di isi.
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" name="bulan_35">Biaya Pembayaran 35 Bulan <span style="color: red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="text"  name="bulan_35" required="" value="{{ old('bulan_35') }}">
									<div class="invalid-feedback">
										Biaya Pembayaran motor wajib di isi.
									</div>
								</div>
							</div>
						</div>
						{{-- End Card Body --}}

						{{-- Tombol simpan --}}
						<div class="card-footer text-right">
							<button class="btn btn-primary" type='submit'>Simpan</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	{{-- End Section Body --}}

</section>
@endsection