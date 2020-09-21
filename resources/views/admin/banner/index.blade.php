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
									<td><img width="50" height="50px" src="{{ asset('/storage/banner-image/'.$banner->image) }}" alt="{{ $banner->image }}" ></td>
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
										<a class="btn btn-sm btn-info" href="{{ url('/banners').'/'.$banner->id.'/edit' }}" title="Edit Banner"><i class="fa fa-edit"></i></a>
										<button class="btn btn-sm btn-danger" id="idHapusBanner" title="Hapus Banner" data-toggle="modal" data-target="#hapusBanner" data-url="{{ url('/banners').'/'.$banner->id.'/delete' }}"><i class="fa fa-trash"></i></button>
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
	
	{{-- modal --}}
	<div class="modal fade" id="hapusBanner" tabindex="-1" role="dialog" aria-labelledby="hapusBannerLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Yakin ingin menghapus banner ini?</h6>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<form id="formHapusBanner" action="" method="POST">
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