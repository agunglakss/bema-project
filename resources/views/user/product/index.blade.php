@extends('layouts.user.main')

@section('content')
<div class="container mb-3">
      <div class="row">

        <!-- Breadcrumbs -->
        <div class="col-md-12 mt-3 mb-5">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Motor Matic</a></li>
              <li class="breadcrumb-item active">Honda Beat</li>
            </ol>
          </nav>
        </div><!-- End Breadcrumbs -->

        <!-- Sidebar -->
        <div class="col-md-3">
          <div class="sidebar">

            <h3 class="sidebar-heading mb-3">Tipe Motor</h3>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#">Motor Matic</a>
                <span data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                  aria-controls="collapseOne"><i class="fa fa-angle-down"></i></span>
              </li>

              <!-- Submenu -->
              <ul id="collapseOne" class="list-group list-group-flush collapse submenu">
                <li class=" list-group-item">
                  <a href="#">Honda Beat</a>
                </li>
                <li class="list-group-item">
                  <a href="#">Honda Scoopy</a>
                </li>
                <li class="list-group-item">
                  <a href="#">Honda Vario</a>
                </li>
              </ul><!-- End Submenu -->

              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#">Motor Bebek</a>
                <span><i class="fa fa-angle-down"></i></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#">Motor Sport</a>
                <span><i class="fa fa-angle-down"></i></span>
              </li>
            </ul>

          </div>
        </div><!-- End Sidebar -->

        <!-- List Products -->
        <div class="col-md-9 mb-4">
          <div class="row">

            <div class="col-md-12 mb-4">
              <div class="box-header">
                <div class="row">
                  <div class="col-auto mr-auto">
                    <div class="title-box">Honda Beat</div>
                  </div>
                  <div class="col-auto text-right">
                    <div class="lihat-semua">
                      <a href="#">Lihat Semua >></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 mb-5">
              <div class="box">
                <a href="#">
                  <div class="card">
                    <img class="card-img-top img-fluid" alt="" src="assets/img/products/honda-beat.jpg" alt="">
                    <div class="card-block mt-3 mb-4 pl-3 pr-3">
                      <h6 class="card-title text-truncate mb-2">Honda Beat Sporty 2020 New</h6>
                      <div class="title-dp">DP Mulai dari</div>
                      <div class="harga-diskon">Rp. 500.000,-</div>
                      <span class="harga-asli">Rp. 1.000.000,-</span>
                    </div>
                    <button class="btn btn-box mb-3 ml-3 mr-3">Ajukan Kredit</button>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-md-4 mb-5">
              <div class="box">
                <a href="#">
                  <div class="card">
                    <img class="card-img-top img-fluid" alt="" src="assets/img/products/honda-beat.jpg" alt="">
                    <div class="card-block mt-3 mb-4 pl-3 pr-3">
                      <h6 class="card-title text-truncate mb-2">Honda Beat Sporty 2020 New</h6>
                      <div class="title-dp">DP Mulai dari</div>
                      <div class="harga-diskon">Rp. 500.000,-</div>
                      <span class="harga-asli">Rp. 1.000.000,-</span>
                    </div>
                    <button class="btn btn-box mb-3 ml-3 mr-3">Ajukan Kredit</button>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-md-4 mb-5">
              <div class="box">
                <a href="#">
                  <div class="card">
                    <img class="card-img-top img-fluid" alt="" src="assets/img/products/honda-beat.jpg" alt="">
                    <div class="card-block mt-3 mb-4 pl-3 pr-3">
                      <h6 class="card-title text-truncate mb-2">Honda Beat Sporty 2020 New</h6>
                      <div class="title-dp">DP Mulai dari</div>
                      <div class="harga-diskon">Rp. 500.000,-</div>
                      <span class="harga-asli">Rp. 1.000.000,-</span>
                    </div>
                    <button class="btn btn-box mb-3 ml-3 mr-3">Ajukan Kredit</button>
                  </div>
                </a>
              </div>
            </div>

          </div>
        </div><!-- End List Products -->

      </div>
    </div>    
@endsection