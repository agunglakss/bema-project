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
							<a class="btn btn-primary" href="{{ url('/motor/create') }}">Tambah Motor</a>
							<button class="btn btn-success" data-toggle="modal" data-target="#importHarga">Import Harga Dari Excel</button>
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
									<th>Status</th>
									<th>Created At</th>
									<th>Updated At</th>
									<th>Action</th>
								</tr>
								@forelse ($motors as $motor)
								<tr>
									<td>{{ $motor->id }}</td>
									<td><a href="{{ url('/motor').'/'.$motor->slug.'/detail' }}">{{ $motor->nama_motor }}</a></td>
									<td>{{ $motor->tipe->kategori->nama_kategori }}</td>
									<td>{{ $motor->tipe->nama_tipe }}</td>
									<td>
										@if ($motor->status == 1)
											<span class="badge badge-success">Aktif</span>
										@else
											<span class="badge badge-danger">Tidak Aktif</span>
										@endif
									</td>
									<td>{{ $motor->created_at->format('d-M-Y') }}</td>
									<td>{{ $motor->updated_at->format('d-M-Y') }}</td>
									<td>
										<a class="btn btn-sm btn-info" href="{{ url('/motor').'/'.$motor->slug.'/edit' }}" title="Edit Motor"><i class="fa fa-edit"></i> Ubah</a>
										<button class="btn btn-sm btn-danger" id="idHapusMotor" title="Hapus Motor" data-toggle="modal" data-target="#hapusMotor" data-url="{{ url('/motor').'/'.$motor->slug.'/delete' }}"><i class="fa fa-trash"></i> Hapus</button>
									</td>
								</tr>
								@empty
								<strong>Data Motor Belum Tersedia.</strong> 
								@endforelse
								</table>
							</div>

							{{-- Pagination --}}
							<div class="float-right">
								{{ $motors->links() }}
							</div>
							{{-- End Pagination --}}

						</div>
					</div>
				</div>
			</div>
		</div><!-- end section-body -->
		
   	</section>

	{{-- modal hapus motor --}}
	<div class="modal fade" id="hapusMotor" tabindex="-1" role="dialog" aria-labelledby="hapusMotorLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Yakin ingin menghapus motor ini?</h6>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<form id="formHapusMotor" action="" method="POST">
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
	   
	{{-- modal import data--}}
	<div class="modal fade" id="importHarga" tabindex="-1" role="dialog" aria-labelledby="importHargaLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Import Harga</h6>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{ url('/pricelists/import-harga-motor') }}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Import</label>
							<div class="input-group">
								<input type="file" class="form-control" name="file">
							</div>
						</div>
						<div class="modal-footer bg-whitesmoke br">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	{{-- end modal --}}
@endsection