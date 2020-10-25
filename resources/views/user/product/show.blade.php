@extends ('layouts.user.main')

@section('content')
<div class="container mb-3">
	<div class="row">

		{{-- Breadcrumb --}}
		<div class="col-md-12 mt-3 mb-5">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb ">
                    <li class="breadcrumb-item active"><a href="/">Home</a></li>
                    <?php $link = "" ?>
                    @for($i = 1; $i <= count(Request::segments()); $i++)
                        @if($i < count(Request::segments()) & $i > 0)
                            <?php $link .= "/" . Request::segment($i); ?>
                            <li class="breadcrumb-item active"><a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a></li>
                        @else 
                            <li class="breadcrumb-item">{{ucwords(str_replace('-',' ',Request::segment($i)))}}</li>
                        @endif
                    @endfor
                </ol>
			</nav>
		</div>
		{{-- End breadcrumb --}}

		{{-- col-12 images --}}
		<div class="col-md-12 mb-4">
			<h3 class="font-bold">{{ $motor->nama_motor}} - Rp {{ number_format($motor->harga_otr) }}</h1>
		</div>
		{{-- End col-12 images --}}

		{{-- col-12 image and simulasi --}}
		<div class="col-md-12 mb-4 rounded-lg">
			<div class="row">

				{{-- list image --}}
				<div class="col-md-6 mb-5">
					<div class="row">
						<div class="col-md-12 mb-3" id="top-image">
							<img class="rounded-lg top-image" id="image-big" src="{{ asset('/storage/thumbnail').'/'.$motor->thumbnail}}" alt="">
						</div>

						@foreach (json_decode($motor->images) as $image )
						<div class="col-3">
							<img class="rounded-lg body-image" id="image-mini" src="{{ asset('/storage/product-image').'/'.$image }}" alt="">
						</div>
						@endforeach
					</div>
				</div>
				{{-- End list image --}}

				{{-- simulasi motor --}}
				<div class="col-md-6 py-4 bg-white rounded-lg simulasi">
					<form action="{{ url('/pemesanan') }}" method="POST">
						@csrf
						<h3> Simulasi Kredit Motor {{ $motor->nama_motor}}</h3>
						<hr>

						<div class="form-group mb-4">
							<label for="tipe_motor" class="text-secondary-black font-medium">Kategori Motor</label>
							<input type="text" class="form-control form-control"
								value="{{$motor->tipe->kategori->nama_kategori}}" disabled>
						</div>

						<div class="form-group mb-4">
							<label for="warna_motor" class="text-secondary-black font-medium">Warna Motor</label>
							<select class="form-control custom-select custom-select" name="warna" id="warna_motor">
								@foreach (json_decode($motor->warna) as $warnaMotor)
								<option value="{{$warnaMotor}}">{{ ucwords($warnaMotor) }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group mb-5">
							<label for="uang_muka" class="text-secondary-black font-medium">Uang Muka (DP)</label>
							<select class="form-control custom-select custom-select" name="pricelist_id" id="uang_muka" onchange="getPricelists()">
								<option value="">- Pilih Uang Muka (DP) -</option>
								@forelse ($pricelists as $pricelist)
								<option data-id="{{ $pricelist->motor_id }}" data-uang="{{ $pricelist->uang_muka }}"
									value="{{ $pricelist->id }}">Rp {{ number_format($pricelist->uang_muka) }}
								</option>
								@empty
								<option value="">Pilih Uang Muka</option>
								@endforelse
							</select>
						</div>

						<h4 class="mb-4 text-center text-blue" id="textUangMuka">Uang Muka (DP) Setelah Diskon Menjadi</h4>

						<h1 class="mb-5 text-center text-orange font-bold" id="diskon">Rp</h1>

						<div class="form-group mb-4">
							<label for="tenor_cicilan" class="text-secondary-black font-medium">Cicilan Per Bulan / Tenor</label>
							<select class="form-control custom-select custom-select" name="tenor" id="tenor_cicilan"></select>
						</div>

						<h3 class="mt-5">Data Diri</h3>
						<hr>

						<div class="form-group mb-4">
							<label for="nama" class="font-medium text-secondary-black">Nama</label>
							<input type="text" class="form-control form-control" name="nama"
								placeholder="Isi dengan nama lengkap">
						</div>

						<div class="form-group mb-4">
							<label for="alamat" class="font-medium text-secondary-black">Alamat</label>
							<textarea class="form-control form-control" name="alamat" id="alamat"
								placeholder="Isi alamat untuk kelengkapan survey, ex. kota, kecamatan, kelurahan dan rt/rw."></textarea>
						</div>

						<div class="form-group mb-4">
							<label for="nomor_telepon" class="font-medium text-secondary-black">Nomor Telepon</label>
							<input type="text" class="form-control form-control" name="nomor_telp" placeholder="+62">
						</div>

						<button type="submit" class="btn btn-lg btn-orange w-100">AJUKAN SEKARANG</button>
					</form>
				</div>
				{{-- end simulasi motor --}}

			</div>
		</div>
		{{-- end col-12 image and simulasi --}}

		{{-- deskripsi --}}
		<div class="col-md-12 py-4 rounded-lg deskripsi">
			<h3>Informasi Motor</h3>
			<hr> {{ strip_tags($motor-> deskripsi) }}
		</div>
		{{-- end deskripsi --}}

	</div>
</div>
@endsection

@section('custom-js')
<script>	

	// script untuk merubah image yang diklik
	$(document).on('click', '#image-mini', function (e) {
		e.preventDefault();
		const srcImage = $(this).attr('src');
		$('.body-image').removeClass('active');
		$('#image-big').attr('src', srcImage);
		$(this).addClass('active');
	});

	// fungsi untuk select option dinamis 
	function getPricelists() {
		const motor_id = $("#uang_muka option:selected").attr("data-id");
		const uang_muka = $("#uang_muka option:selected").attr("data-uang");
		const formatRupiah = new Intl.NumberFormat();
		$.ajax({
			type: "get",
			url: '/api/product/' + motor_id + '/' + uang_muka + '',
			dataType: 'json',
			success: function (data) {
				$.each(data, function (i, data) {
					$('#diskon').html('Rp ' + formatRupiah.format(data.diskon));
					$('#tenor_cicilan').html(`
						<option value="11 Bulan x Rp `+ formatRupiah.format(data.bulan_11) +`">Bulan 11 x Rp ` + formatRupiah.format(data.bulan_11) + `</option>
						<option value="17 Bulan x Rp `+ formatRupiah.format(data.bulan_17) +`">Bulan 17 x Rp ` + formatRupiah.format(data.bulan_17) + `</option>
						<option value="23 Bulan x Rp `+ formatRupiah.format(data.bulan_23) +`">Bulan 23 x Rp ` + formatRupiah.format(data.bulan_23) + `</option>
						<option value="27 Bulan x Rp `+ formatRupiah.format(data.bulan_27) +`">Bulan 27 x Rp ` + formatRupiah.format(data.bulan_27) + `</option>
						<option value="29 Bulan x Rp `+ formatRupiah.format(data.bulan_29) +`">Bulan 29 x Rp ` + formatRupiah.format(data.bulan_29) + `</option>
						<option value="33 Bulan x Rp `+ formatRupiah.format(data.bulan_33) +`">Bulan 33 x Rp ` + formatRupiah.format(data.bulan_33) + `</option>
						<option value="35 Bulan x Rp `+ formatRupiah.format(data.bulan_35) +`">Bulan 35 x Rp ` + formatRupiah.format(data.bulan_35) + `</option>
					`);
				});
			},
			error: function (respone) {
				console.log(respone);
			}
		});
	}
</script>
@endsection