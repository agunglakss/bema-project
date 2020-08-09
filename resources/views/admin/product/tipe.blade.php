@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <h1>Tipe Motor</h1>
         <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Tipe Motor</div>
            </div>
      </div>
      
      <div class="section-body">
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
         <script>
            setTimeout(function () {
               document.getElementById('alert').style.display='none'}, 
               5000
            );
         </script>
         <div class="row">
            <div class="col-12">
               <div class="card mb-0">
                  <div class="card-body">
                     <a class="btn btn-primary" href="{{ url('/products/tipe-motor/create') }}">Tambah Tipe Motor</a>
                  </div>
               </div>
            </div>
         </div>

         <div class="row mt-4">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Daftar Tipe Motor</h4>
                  </div>
                  <div class="card-body">

                     <div class="table-responsive">
                        <table class="table table-striped">
                           <tr>
                              <th>No</th>
                              <th>Tipe Motor</th>
                              <th>Kategori Motor</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                           @forelse ($tipeMotors as $tipeMotor)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $tipeMotor->nama_tipe}}</td>
                              <td>{{ $tipeMotor->kategori->nama_kategori }}</td>
                              <td>{{ $tipeMotor->created_at }}</td>
                              <td>{{ $tipeMotor->updated_at }}</td>
                              <td><div class="badge badge-success">Aktif</div></td>
                              <td>
                                 <a class="btn btn-info" href="{{ url('products/tipe-motor') }}/{{ $tipeMotor->slug }}/edit">Edit</a>
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