@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <div class="section-header-back">
            <a href="{{ url('/products/tipe-motor') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
         </div>
         <h1>Edit Tipe Motor</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ url('/products/tipe-motor') }}">Daftar Tipe Motor</a></div>
            <div class="breadcrumb-item">Edit Tipe Motor</div>
         </div>
      </div>
      
      <div class="section-body">
         @if (session('status'))
            <div class="alert alert-info alert-dismissible show fade">
               <div class="alert-body">
               <button class="close" data-dismiss="alert">
                  <span>&times;</span>
               </button>
               {{ session('status') }}
               </div>
            </div>
         @endif
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <form class="needs-validation" novalidate="" method="post" action="{{ url('/products/tipe-motor') }}/{{ $tipe->slug }}/edit">
                     @method('patch')
                     @csrf
                    <div class="card-body">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" name="nama_kategori">Kategori Motor <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                           <select class="form-control selectric" name="nama_kategori" required="">
                              <option value="">- Pilih Kategori Motor -</option>
                              @forelse ($kategoriMotors as $kategoriMotor)
                              <option value="{{ old('nama_kategori') ?? $kategoriMotor->id }}"
                                 @if($kategoriMotor->id == $tipe->kategori_id) selected="selected"@endif >
                                 {{ $kategoriMotor->nama_kategori }}
                              </option> 
                              @empty
                                  <!-- Tidak ada data yang ditampilkan -->
                              @endforelse
                           </select>
                           <div class="invalid-feedback">
                              Kategor motor wajib di isi.
                            </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" name="nama_tipe">Tipe Motor <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="nama_tipe" value="{{ old('nama_tipe') ?? $tipe->nama_tipe }}" placeholder="Isi dengan Honda Beat, Honda Vario dan lain-lain." {{ old('nama_tipe') }} required="">
                           <div class="invalid-feedback">
                              Tipe motor wajib di isi.
                           </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
               </div>
            </div>
         </div>

      </div><!-- end section-body -->
		
	</section>
@endsection