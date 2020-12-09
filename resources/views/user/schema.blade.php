@extends('layouts.user.main')
@section('content')
<div class="container">
	<div class="row">
		<!-- Breadcrumbs -->
		<div class="col-md-12 mt-3 mb-5">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
								<li class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></li>
								<li class="breadcrumb-item active">Cara Pemesanan</li>
						</ol>
					</nav>
			</div><!-- End Breadcrumbs -->

			<!-- content -->
			<div class="col-md-12 mb-4 ">
				<div class="tentang-kami p-4 bg-white rounded-lg">
					Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sit dolorem repellendus hic facere quasi provident excepturi itaque suscipit officiis! Sint reiciendis et illum sapiente facere sed quidem libero obcaecati!
				</div>
			</div>
			<!-- end content -->

	</div>
</div>
@endsection