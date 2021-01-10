@extends('layouts.user.main')

@section('content')
<div class="container">
  <div class="row">
    <!-- Breadcrumbs -->
    <div class="col-md-12 mt-3 mb-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Testimoni</li>
          </ol>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- content -->
    <div class="col-md-12 mb-4 ">
			<div class="tentang-kami p-4 bg-white rounded-lg">
				@forelse ($testimonials as $testimonial)
        <img class="img-thumbnail img-testimonial mb-3" alt="{{ $testimonial->image }}" src="{{ asset('/storage/testimonial').'/'.$testimonial->image}}">
        @empty
        Testimoni belum ada.
        @endforelse
			</div>
    </div>
    <!-- end content -->
  </div>
</div>
@endsection