@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <h1>Daftar Banner Promo</h1>
         <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Daftar Banner Promo</div>
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
                     <a class="btn btn-primary" href="{{ url('/banners/create') }}">Tambah Banner Promo</a>
                  </div>
               </div>
            </div>
         </div>

         <div class="row mt-4">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h4>Daftar Banner Promo</h4>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-striped">
                           <tr>
                              <th>No</th>
                              <th>Image</th>
                              <th>Link</th>
                              <th>Status</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                              <th>Action</th>
                           </tr>
                           @forelse ($banners as $banner)
                           <tr>
                              <td>{{$loop->iteration}}</td>
                              <td><img width="50" height="50px" src="{{ asset('/img-banners').'/'.$banner->image }}" alt="{{ $banner->image }}" ></td>
                              <td><a href="{{$banner->link}}">Link</a></td>
                              <td>
                                 @if ($banner->status == 1)
                                 <span class="badge badge-success">Aktif</span>
                                 @else
                                 <span class="badge badge-danger">Tidak Aktif</span>
                                 @endif
                              </td>
                              <td>{{ $banner->created_at->format('d-M-Y') }}</td>
                              <td>{{ $banner->updated_at->format('d-M-Y') }}</td>
                              <td>
                                 <a class="btn-sm btn-info" href="{{ url('/banners').'/'.$banner->id.'/edit' }}" title="Edit Banner"><i class="fa fa-edit"></i></a>
                              <a class="btn-sm btn-danger" href="" title="Hapus Banner"><i class="fa fa-trash"></i></a>
                              </td>
                           </tr>    
                           @empty
                           Data belum tersedia.
                           @endforelse
                           
                        </table>
                     </div>

                     {{-- pagination --}}
                     <div class="float-right">
                        {{ $banners->links() }}
                     </div>
                     {{-- end pagination --}}
                  </div>
               </div>
            </div>
         </div>

      </div><!-- end section-body -->
		
	</section>
@endsection