@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <h1>Daftar Motor</h1>
         <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Daftar Motor</div>
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
                              <th>ID Motor</th>
                              <th>Nama Motor</th>
                              <th>Kategori Motor</th>
                              <th>Tipe Motor</th>
                              <th>Harga OTR</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                              <th>Action</th>
                           </tr>
                           @forelse ($Motors as $Motor)
                           <tr>
                              <td>{{ $Motor->id }}</td>
                              <td>{{ $Motor->nama_motor }}</td>
                              <td>{{ $Motor->tipe->kategori->nama_kategori }}</td>
                              <td>{{ $Motor->tipe->nama_tipe }}</td>
                              <td>Rp {{ number_format ($Motor->harga_otr) }}</td>
                              <td>{{ $Motor->created_at->format('d-M-Y') }}</td>
                              <td>{{ $Motor->updated_at->format('d-M-Y') }}</td>
                              <td>
                                 <a class="btn-sm btn-info" href="{{ url('/products/motor') }}/{{$Motor->slug}}/edit" title="Edit Motor"><i class="fa fa-edit"></i></a>
                                 <a class="btn-sm btn-danger" href="{{ url('products/motor') }}/{{ $Motor->slug }}/delete" title="Hapus Motor"><i class="fa fa-trash"></i></a>
                              </td>
                           </tr>
                           @empty
                           <strong>Data Motor Belum Tersedia.</strong> 
                           @endforelse
                        </table>
                     </div>

                     {{-- Pagination --}}
                     <div class="float-right">
                        {{ $Motors->links() }}
                     </div>
                     {{-- End Pagination --}}

                  </div>
               </div>
            </div>
         </div>

      </div><!-- end section-body -->
		
	</section>
@endsection