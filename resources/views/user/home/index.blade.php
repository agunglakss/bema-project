@extends('layouts.user.main') 
@section('content') 
{{-- banner --}}
<div class="banner">
    <div class="container-fluid p-0">
        <div class="site-slider">
            <div class="slider-one">
                <div>
                    <a href="#">
                        <img src="https://image.cermati.com/q_80/v1593506406/dnwfli2jqxuhvqtejvuv.webp" style="width:100%;" alt="">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="https://image.cermati.com/q_80/v1588237372/bpkpeuegg7xchj0x9lzi.webp" style="width:100%;" alt="">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="https://image.cermati.com/q_80/v1587011967/m7sxdwloklvmim7xvj4p.webp" style="width:100%;" alt="">
                    </a>
                </div>
            </div>
            <div class="btn-slider">
                <span class="prev position-top"><i class="fa fa-chevron-left"></i></span>
                <span class="next position-top right-0"><i class="fa fa-chevron-right"></i></span>
            </div>
        </div>
    </div>
</div>
{{-- End Banner --}} 

{{-- Information --}}
<div class="informations">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="card">
                    <div class="row align-items-center">
                        <div class="col-md-3 col-xs-3">
                            <div class="rounded-circle icon-phone">
                                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h4 class="card-title">Layanan Konsumen</h4>
                                <p class="card-text mt-2">Online 24 jam melayani pertanyaan dan pemesanan Motor Honda. Hari libur tetap kami layani (via Whatsapp).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="rounded-circle icon-phone">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h4 class="card-title">Proses Cepat dan Mudah</h4>
                                <p class="card-text mt-2">Data kami jemput kerumah Anda. Hari ini survey, besok motor bisa kami kirim kerumah Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="rounded-circle icon-phone">
                                <i class="fa fa-motorcycle" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h4 class="card-title">Pengiriman</h4>
                                <p class="card-text mt-2">Rute pengiriman ke seluruh daerah Jabodetabek, dijamin motor sampai dengan aman dan mulus kerumah Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- End Information --}} 

{{-- Categories --}}
<div class="categorys mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-2">
                <a href="{{ url('/products/motor-matic') }}" class="btn btn-categorys">Motor Matic</a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="{{ url('/products/motor-bebek') }}" class="btn btn-categorys">Motor Bebek</a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="{{ url('/products/motor-sport') }}" class="btn btn-categorys">Motor Sport</a>
            </div>
        </div>
    </div>
</div>
{{-- End Categories --}}

<div class="bg-white mb-3">
    <div class="container">
        <div class="row">
            <!-- col-md-12  -->
            <div class="col-md-12 mt-3 mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-header">
                            <div class="row align-items-center">
                                <div class="col-auto mr-auto">
                                    <div class="title-box">Motor Terbaru</div>
                                </div>
                                <div class="col-auto text-right">
                                    <a class="lihat-semua rounded" href="{{ url('/products') }}">Lihat Semua <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @forelse ($AllMotors as $AllMotor)
                    <div class="col-md-3 mt-4">
						<div class="box">
							<a href="{{ url('/products').'/'.$AllMotor->tipe->kategori->slug.'/'.$AllMotor->tipe->slug.'/'.$AllMotor->slug }}">
								<div class="card">
									<img class="card-img-top img-fluid" alt="" src="{{ asset('/storage/thumbnail').'/'.$AllMotor->thumbnail}}" alt="">
									<div class="card-block mt-3 mb-4 pl-3 pr-3">
										<h6 class="card-title text-truncate mb-2">{{ $AllMotor->nama_motor }}</h6>
										<div class="title-dp mt-3">Uang Muka (DP) Mulai Dari</div>
										<div class="harga-diskon">Rp. 500.000</div>
										<div class="title-dp mt-3">Harga OTR</div>
										<span class="harga-asli">Rp {{ number_format($AllMotor->harga_otr) }}</span>
									</div>
									<button class="btn btn-box mb-3 ml-3 mr-3">AJUKAN SEKARANG</button>
								</div>
							</a>
						</div>
					</div>
					@empty 
					@endforelse
                </div>
            </div>
            <!-- end col-md-12  -->
        </div>
    </div>
</div>

@forelse ($AllMotorByCategories as $AllMotorByCategory) 
	@if ($AllMotorByCategory->id == $AllMotorByCategory->id)
	<div class="bg-white mb-3">
		<div class="container">
			<div class="row">

				<!-- col-md-12  -->
				<div class="col-md-12 mt-3 mb-5">
					<div class="row">

						<div class="col-md-12">
							<div class="box-header">
								<div class="row align-items-center">
									<div class="col-auto mr-auto">
										<div class="title-box">{{ $AllMotorByCategory->nama_kategori}}</div>
									</div>
									<div class="col-auto text-right">
										<a class="lihat-semua" href="{{ url('/products/'.$AllMotorByCategory->slug) }}">Lihat Semua <i class="fa fa-angle-right"></i></a>
									</div>
								</div>
							</div>
						</div>

						@forelse ($AllMotorByCategory->motors as $motor)
						<div class="col-md-3 mt-4">
							<div class="box">
								<a href="{{ url('/products').'/'.$motor->tipe->kategori->slug.'/'.$motor->tipe->slug.'/'.$motor->slug }}">
									<div class="card">
										<img class="card-img-top img-fluid" alt="" src="{{ asset('/storage/thumbnail').'/'.$motor->thumbnail}}" alt="">
										<div class="card-block mt-3 mb-4 pl-3 pr-3">
											<h6 class="card-title text-truncate mb-2">{{ $motor->nama_motor }}</h6>
											<div class="title-dp mt-3">Uang Muka (DP) Mulai Dari</div>
											<div class="harga-diskon">Rp. 500.000</div>
											<div class="title-dp mt-3">Harga OTR</div>
											<span class="harga-asli">Rp {{ number_format($motor->harga_otr) }}</span>
										</div>
										<button class="btn btn-box mb-3 ml-3 mr-3">AJUKAN SEKARANG</button>
									</div>
								</a>
							</div>
						</div>
						@empty
						<div class="col-md-3 mt-4">
							{{ $AllMotorByCategory->nama_kategori }} Belum Tersedia.
						</div>
						@endforelse

					</div>
				</div>
				<!-- end col-md-12  -->

			</div>
		</div>
	</div>
	@endif 
@empty
<div class="bg-white mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3 mb-5">
                <h1 class="text-center">Motor belum tersedia.</h1>
            </div>
        </div>
    </div>
</div>
@endforelse 

@endsection 

@section('slider') 
$(document).ready(function () {
	$('.slider-one').not('#slick-intialized').slick({
		 dots: true,
		 infinite: true,
		 autoplay: true,
		 autoplaySpeed: 3000,
		 fade: true,
		 speed: 1000,
		 cssEase: 'linear',
		 prevArrow: '.site-slider .btn-slider .prev',
		 nextArrow: '.site-slider .btn-slider .next',
	});
 });
@endsection