@extends('layouts.user.main')

@section('content')
	{{-- Banner --}}
	<div class="banner">
   	<div class="container-fluid p-0">
        <div class="site-slider">
          <div class="slider-one">
            <div>
              <a href="#">
                <img src="https://image.cermati.com/q_80/v1593506406/dnwfli2jqxuhvqtejvuv.webp" style="width:100%;"
                  alt="">
              </a>
            </div>
            <div>
              <a href="#">
                <img src="https://image.cermati.com/q_80/v1588237372/bpkpeuegg7xchj0x9lzi.webp" style="width:100%;"
                  alt="">
              </a>
            </div>
            <div>
              <a href="#">
                <img src="https://image.cermati.com/q_80/v1587011967/m7sxdwloklvmim7xvj4p.webp" style="width:100%;"
                  alt="">
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
						<div class="row">
							<div class="col-md-3">
							<div class="rounded-circle icon-phone">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
							</div>
							</div>
							<div class="col-md-9">
							<div class="card-body">
								<h4 class="card-title">Layanan Konsumen</h4>
								<p class="card-text">Online 24 jam melayani pertanyaan dan pemesanan Motor Honda. Hari libur tetap
									kami layani (via Whatsapp).</p>
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
								<p class="card-text">Data kami jemput kerumah Anda. Hari ini survey, besok motor bisa kami kirim
									kerumah Anda.</p>
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
								<p class="card-text">Rute pengiriman ke seluruh daerah Jabodetabek, dijamin motor sampai dengan aman
									dan mulus kerumah Anda.</p>
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
				<a href="{{ url('/product/motor-matic') }}" class="btn btn-categorys">Motor Matic</a>
				</div>
				<div class="col-md-4 mb-2">
				<a href="{{ url('/product/motor-bebek') }}" class="btn btn-categorys">Motor Bebek</a>
				</div>
				<div class="col-md-4 mb-2">
				<a href="{{ url('/product/motor-sport') }}" class="btn btn-categorys">Motor Sport</a>
				</div>
			</div>
		</div>
	</div>
	{{-- End Categories --}}

	<div class="bg-white mb-3">
   	<div class="container">
   		<div class="row">
         	<!-- Start  -->
         	<div class="col-md-12 mt-3 mb-5">
					<div class="row">
						<div class="col-md-12">
							<div class="box-header">
								<div class="row align-items-center">
									<div class="col-auto mr-auto">
										<div class="title-box">Motor Terbaru</div>
									</div>
									<div class="col-auto text-right">
										<div class="lihat-semua">
										<a href="{{ url('/product') }}">View All</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						@forelse ($AllMotors as $AllMotor)
						<div class="col-md-3 mt-4">
							<div class="box">
								<a href="#">
									<div class="card">
										<img class="card-img-top img-fluid" alt="" src="assets/img/products/honda-beat.jpg" alt="">
										<div class="card-block mt-3 mb-4 pl-3 pr-3">
										<h6 class="card-title text-truncate mb-2">{{ $AllMotor->nama_motor }}</h6>
										<div class="title-dp">DP Mulai dari</div>
										<div class="harga-diskon">Rp. 500.000,-</div>
										<span class="harga-asli">Rp. 1.000.000,-</span>
										</div>
										<button class="btn btn-box mb-3 ml-3 mr-3">Ajukan Kredit</button>
									</div>
								</a>
							</div>
						</div>
						@empty
						@endforelse
					</div>
         	</div>
          <!-- End  -->
      	</div>
   	</div>
	</div>

	@forelse ($AllMotorByCategories as $AllMotorByCategory)
	<div class="bg-white mb-3">
		<div class="container">
			<div class="row">

				<!-- Start  -->
				<div class="col-md-12 mt-3 mb-5">
					<div class="row">

						<div class="col-md-12">
							<div class="box-header">
								<div class="row align-items-center">
									<div class="col-auto mr-auto">
										<div class="title-box">{{ $AllMotorByCategory->nama_kategori}}</div>
									</div>
									<div class="col-auto text-right">
										<div class="lihat-semua">
											<a href="{{ url('/product/'.$AllMotorByCategory->slug) }}">View All</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						@forelse ($AllMotorByCategory->motors as $motor)
						<div class="col-md-3 mt-4">
							<div class="box">
								<a href="#">
									<div class="card">
										<img class="card-img-top img-fluid" alt="" src="assets/img/products/honda-beat.jpg" alt="">
										<div class="card-block mt-3 mb-4 pl-3 pr-3">
										<h6 class="card-title text-truncate mb-2">{{ $motor->nama_motor }}</h6>
										<div class="title-dp">DP Mulai dari</div>
										<div class="harga-diskon">Rp. 500.000,-</div>
										<span class="harga-asli">Rp. 1.000.000,-</span>
										</div>
										<button class="btn btn-box mb-3 ml-3 mr-3">Ajukan Kredit</button>
									</div>
								</a>
							</div>
						</div>
						@empty
						<div class="col-md-3 mb-5">
							Motor {{ $AllMotorByCategory->nama_kategori }} Belum Tersedia.
						</div>
						@endforelse
						
					</div>
				</div>
				<!-- End  -->

			</div>
		</div>
	</div>
	@empty
		  
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
