@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
			<div class="section-header-back">
				<a href="{{ url('/pricelists') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
			</div>
			<h1>{{ $title }}</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ url('/pricelists') }}">Daftar Harga Cicilan Motor</a></div>
				<div class="breadcrumb-item">{{ $title }}</div>
			</div>
		</div>
		
		<div class="section-body">

			<div class="row">
				<div class="col-12">
					<div class="card">
						<form class="needs-validation" novalidate="" method="post" action="{{ url('/pricelist') }}">
							@csrf
							<div class="card-body">

								<div class="form-group row">
									<label class="col-sm-2 col-form-label" name="nama_kategori">Kategori Motor <span style="color: red">*</span></label>
									<div class="col-sm-10">
										<select class="form-control selectric" name="nama_kategori" required="">
											<option value="">- Pilih Motor -</option>
											
										</select>
										<div class="invalid-feedback">
											Kategori motor wajib di isi.
										</div>
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" name="uang_muka">Uang Muka <span style="color: red;">*</span></label>
									<div class="col-sm-10">
										<input class="form-control" type="text"  name="uang_muka" required="">
										<div class="invalid-feedback">
											Uang muka wajib di isi.
										</div>
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" name="diskon">Diskon Uang Muka </label>
									<div class="col-sm-10">
										<input class="form-control" type="text"  name="diskon">
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" name="bulan_11">Biaya Pembayaran 11 Bulan <span style="color: red;">*</span></label>
									<div class="col-sm-10">
										<input class="form-control" type="text"  name="bulan_11" required="">
										<div class="invalid-feedback">
											Biaya Pembayaran motor wajib di isi.
										</div>
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" name="bulan_17">Biaya Pembayaran 17 Bulan <span style="color: red;">*</span></label>
									<div class="col-sm-10">
										<input class="form-control" type="text"  name="bulan_17" required="">
										<div class="invalid-feedback">
											Biaya Pembayaran motor wajib di isi.
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label" name="bulan_23">Biaya Pembayaran 23 Bulan <span style="color: red;">*</span></label>
									<div class="col-sm-10">
										<input class="form-control" type="text"  name="bulan_23" required="">
										<div class="invalid-feedback">
											Biaya Pembayaran motor wajib di isi.
										</div>
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" name="bulan_27">Biaya Pembayaran 27 Bulan <span style="color: red;">*</span></label>
									<div class="col-sm-10">
										<input class="form-control" type="text"  name="bulan_27" required="">
										<div class="invalid-feedback">
											Biaya Pembayaran motor wajib di isi.
										</div>
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" name="bulan_29">Biaya Pembayaran 29 Bulan <span style="color: red;">*</span></label>
									<div class="col-sm-10">
										<input class="form-control" type="text"  name="bulan_29" required="">
										<div class="invalid-feedback">
											Biaya Pembayaran motor wajib di isi.
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label" name="bulan_33">Biaya Pembayaran 33 Bulan <span style="color: red;">*</span></label>
									<div class="col-sm-10">
										<input class="form-control" type="text"  name="bulan_33" required="">
										<div class="invalid-feedback">
											Biaya Pembayaran motor wajib di isi.
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label" name="bulan_35">Biaya Pembayaran 35 Bulan <span style="color: red;">*</span></label>
									<div class="col-sm-10">
										<input class="form-control" type="text"  name="bulan_35" required="">
										<div class="invalid-feedback">
											Biaya Pembayaran motor wajib di isi.
										</div>
									</div>
								</div>


							</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary" type='submit'>Simpan</button>
						</div>
						</form>
					</div>
				</div>
			</div>

		</div><!-- end section-body -->
		
	</section>
@endsection