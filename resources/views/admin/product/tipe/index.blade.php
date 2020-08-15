@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <h1>Daftar Tipe Motor</h1>
         <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Daftar Tipe Motor</div>
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
                                 <a class="btn-sm btn-info" href="{{ url('products/tipe-motor') }}/{{ $tipeMotor->slug }}/edit" title="Edit Tipe Motor"><i class="fa fa-edit"></i></a>
                                 <a class="btn-sm btn-danger" href="" title="Hapus Tipe Motor"><i class="fa fa-trash"></i></a>
                              </td>
                           </tr>
                           @empty
                           <strong>Data Tipe Motor Belum Tersedia.</strong>
                           @endforelse
                        </table>
                     </div>

                     <div class="float-right">
                        {{ $tipeMotors->links() }}
                     </div>

                  </div>
               </div>
            </div>
         </div>

      </div><!-- end section-body -->
		
	</section>
@endsection