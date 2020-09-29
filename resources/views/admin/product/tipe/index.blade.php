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
                     <a class="btn btn-primary" href="{{ url('/tipe-motor/create') }}">Tambah Tipe Motor</a>
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
                              <th>Action</th>
                           </tr>
                           @forelse ($tipeMotors as $tipeMotor)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $tipeMotor->nama_tipe}}</td>
                              @if (!empty($tipeMotor->kategori->id)) {{-- cek jika kategeri motor ada--}}
                              <td>{{ $tipeMotor->kategori->nama_kategori }}</td>
                              @else
                              <td><span class="badge badge-warning text-dark">Kategori telah dihapus, harap ubah kategori.</span> </td>
                              @endif
                              <td>{{ $tipeMotor->created_at->format('d-M-Y') }}</td>
                              <td>{{ $tipeMotor->updated_at->format('d-M-Y') }}</td>
                              <td>
                                 <a class="btn btn-sm btn-info" href="{{ url('/tipe-motor') }}/{{ $tipeMotor->slug }}/edit" title="Edit Tipe Motor"><i class="fa fa-edit"></i></a>
                                 <button class="btn btn-sm btn-danger" id="idHapusTipe" title="Hapus Tipe Motor" data-toggle="modal" data-target="#hapusTipe" data-url="{{ url('/tipe-motor').'/'.$tipeMotor->slug.'/delete' }}"><i class="fa fa-trash"></i></button>
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
   
   {{-- modal --}}
	<div class="modal fade" id="hapusTipe" tabindex="-1" role="dialog" aria-labelledby="hapusTipeLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Yakin ingin menghapus Tipe Motor ini?</h6>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<form id="formHapusTipe" action="" method="POST">
						@csrf
						@method('delete')
						<button type="submit" class="btn btn-secondary">Delete</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	{{-- end modal --}}
@endsection