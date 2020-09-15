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
									<th>Detail Harga</th>
									<th>Created At</th>
									<th>Updated At</th>
									<th>Action</th>
								</tr>
								@forelse ($motors as $motor)
								<tr>
									<td>{{ $motor->id }}</td>
									<td>{{ $motor->nama_motor }}</td>
									<td>{{ $motor->tipe->kategori->nama_kategori }}</td>
									<td>{{ $motor->tipe->nama_tipe }}</td>
									<td><button type="button" class="btn btn-success" title="Detail Harga" data-toggle="modal" data-target="#detailHarga" onclick="detailHrg({{ $motor->id }})">Detail Harga</button></td>
									<td>{{ $motor->created_at->format('d-M-Y') }}</td>
									<td>{{ $motor->updated_at->format('d-M-Y') }}</td>
									<td>
										<a class="btn-sm btn-info" href="{{ url('/motor') }}/{{$motor->slug}}/edit" title="Edit Motor"><i class="fa fa-edit"></i></a>
										<a class="btn-sm btn-danger" href="{{ url('/motor') }}/{{ $motor->slug }}/delete" title="Hapus Motor"><i class="fa fa-trash"></i></a>
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
   	<!-- Modal -->
	<div class="modal fade bd-example-modal-lg" id="detailHarga" tabindex="-1" role="dialog" aria-labelledby="detailHargaLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detailHargaLabel">Modal title | Harga OTR</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table table-striped" id="tableHarga">
							<tr>
								<th>Uang Muka</th>
								<th>DP Setelah Diskon</th>
								<th>Bulan 11</th>
								<th>Bulan 17</th>
								<th>Bulan 23</th>
								<th>Bulan 27</th>
								<th>Bulan 33</th>
								<th>Bulan 35</th>
							</tr>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@endsection