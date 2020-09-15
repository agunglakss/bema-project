@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <h1>Daftar Kategori Motor</h1>
         <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Daftar Kategori Motor</div>
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
                     <a class="btn btn-primary" href="{{ url('/kategori-motor/create') }}">Tambah Kategori Motor</a>
                  </div>
               </div>
            </div>
         </div>

         <div class="row mt-4">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Daftar Kategori Motor</h4>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-striped">
                           <tr>
                              <th>No</th>
                              <th>Kategori Motor</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                           @forelse ($kategoriMotors as $kategoriMotor)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $kategoriMotor->nama_kategori }}</td>
                              <td>{{ $kategoriMotor->created_at->format('d-M-Y') }}</td>
                              <td>{{ $kategoriMotor->updated_at->format('d-M-Y') }}</td>
                              <td><div class="badge badge-success">Aktif</div></td>
                              <td>
                                 <a class="btn-sm btn-info" href="{{ url ('/kategori-motor') }}/{{$kategoriMotor->slug}}/edit" title="Edit Kategori Motor"><i class="fa fa-edit"></i></a>
                                 <a class="btn-sm btn-danger" href="#" title="Hapus Kategori Motor"><i class="fa fa-trash"></i></a>
                              </td>
                           </tr>
                           @empty
                           <strong>Data Kategori Motor Belum Tersedia.</strong>
                           @endforelse
                        </table>
                     </div>
                     <div class="float-right">
                        {{ $kategoriMotors->links() }}
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div><!-- end section-body -->
		
	</section>
@endsection