@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <h1>Motor</h1>
         <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Motor</div>
            </div>
      </div>
      
      <div class="section-body">

         <div class="row">
            <div class="col-12">
               <div class="card mb-0">
                  <div class="card-body">
                     <a class="btn btn-primary" href="{{ url('/products/motor/create') }}">Tambah Motor</a>
                  </div>
               </div>
            </div>
         </div>

         <div class="row mt-4">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Daftar Motor</h4>
                  </div>
                  <div class="card-body">

                     <div class="table-responsive">
                        <table class="table table-striped">
                           <tr>
                              <th>No</th>
                              <th>Nama Motor</th>
                              <th>Tipe Motor</th>
                              <th>Kategori Motor</th>
                              <th>Harga OTR</th>
                              <th>Warna</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                           @forelse ($Motors as $Motor)
                           <tr>
                              <td>1</td>
                              <td>{{ $Motor->nama_motor }}</td>
                              <td>{{ $Motor->kategori->nama_kategori}}</td>
                              <td>{{ $Motor->kategori->tipe->nama_tipe }}</td>
                              <td>Rp {{ number_format ($Motor->harga_otr) }}</td>
                              <td>{{ $Motor->warna }}</td>
                              <td>{{ $Motor->created_at }}</td>
                              <td>{{ $Motor->updated_at }}</td>
                              <td><div class="badge badge-success">Aktif</div></td>
                              <td>
                                 <a class="btn btn-info" href="">Edit</a>
                                 <a class="btn btn-danger" href="">Hapus</a>
                              </td>
                           </tr>
                           @empty
                               
                           @endforelse
                        </table>
                     </div>

                     <div class="float-right">
                        <nav>
                           <ul class="pagination">
                              <li class="page-item disabled">
                                 <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                 </a>
                              </li>
                              <li class="page-item active">
                                 <a class="page-link" href="#">1</a>
                              </li>
                              <li class="page-item">
                                 <a class="page-link" href="#">2</a>
                              </li>
                              <li class="page-item">
                                 <a class="page-link" href="#">3</a>
                              </li>
                              <li class="page-item">
                                 <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                 </a>
                              </li>
                           </ul>
                        </nav>
                     </div>

                  </div>
               </div>
            </div>
         </div>

      </div><!-- end section-body -->
		
	</section>
@endsection