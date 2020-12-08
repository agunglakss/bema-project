@extends('layouts.admin.main')

@section('content')
<section class="section">

    <div class="section-header">
        <h1>Daftar Testimonial</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Daftar Testimonial</div>
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
              <form class="needs-validation" novalidate="" method="post" action="{{ url('/testimonial') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label" name="image">Image Testimonial <span style="color: red;">*</span></label>
                      <div class="col-sm-10">
                        <input class="form-control" type="file"  name="image" required="" style="padding:7px 0 0 5px;">
                        <span class="text-small">Maksimum image 2 MB</span>
                        <div class="invalid-feedback">
                            Image wajib diisi.
                        </div>
                      </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary" type='submit'>Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-striped">
                              <tr>
                                  <th>No.</th>
                                  <th>Image</th>
                                  <th>Created at</th>
                                  <th>Updated at</th>
                                  <th>Action</th>
                              </tr>
                              
                              @forelse($testimonials as $testimonial)
                              <tr>
                                  <td>{{ $testimonial->id }}</td>
                                  <td><img width="50" height="50px" src="{{ asset('/storage/testimonial/'.$testimonial->image) }}" alt="{{ $testimonial->image }}" ></td>
                                  <td>{{ $testimonial->created_at }}</td>
                                  <td>{{ $testimonial->created_at }}</td>
                                  <td>
										                <button class="btn btn-sm btn-danger" id="idHapusTestimonial" title="Hapus Testimonial" data-toggle="modal" data-target="#hapusTestimonial" data-url="{{ url('/testimonial').'/'.$testimonial->id.'/delete' }}"><i class="fa fa-trash"></i> Hapus</button>
									                </td>
                              </tr>
                              @empty
                              <tr>Data tidak ditemukan<tr>
                              @endforelse
                          </table>
                      </div>

                      {{-- pagination --}}
                      <div class="float-right">
                        {{ $testimonials->links() }}
                      </div>
                      {{-- end pagination --}}
                  </div>
              </div>
          </div>
      </div>

    </div><!-- end section-body -->
    
</section>

{{-- modal --}}
	<div class="modal fade" id="hapusTestimonial" tabindex="-1" role="dialog" aria-labelledby="hapusBannerLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Yakin ingin menghapus testimonial ini?</h6>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<form id="formHapusTestimonial" action="" method="POST">
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