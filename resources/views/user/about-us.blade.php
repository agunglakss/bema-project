@extends('layouts.user.main')
@section('content')
<div class="container  mb-3">
	<div class="row ">
		<!-- Breadcrumbs -->
		<div class="col-md-12 mt-3 mb-5">
			<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></li>
						<li class="breadcrumb-item active">Tentang Kami</li>
					</ol>
			</nav>
		</div><!-- End Breadcrumbs -->
		
		<!-- content -->
		<div class="col-md-12 mb-4 ">
			<div class="tentang-kami p-4 bg-white rounded-lg">
				{!! $aboutUs->deskripsi !!}
			</div>
		</div>
		<!-- end content -->

	</div>
</div>
@endsection