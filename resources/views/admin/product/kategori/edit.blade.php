@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <div class="section-header-back">
            <a href="{{ url('/kategori-motor') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
         </div>
         <h1>Edit Kategori Motor</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ url('/kategori-motor') }}">Daftar Motor</a></div>
            <div class="breadcrumb-item">Edit Kategori Motor</div>
         </div>
      </div>
      
      <div class="section-body">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <form class="needs-validation" novalidate="" method="post" action="{{ url('/kategori-motor') }}/{{ $kategori->slug }}/edit">
                     @method('patch')
                     @csrf
                     <div class="card-body">
                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label" name="nama_kategori">Kategori Motor <span style="color: red">*</span></label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" name="nama_kategori" value="{{ old('nama_kategori') ?? $kategori->nama_kategori }}" required="">
                              <div class="invalid-feedback">
                                 Kategori motor wajib di isi.
                              </div>
                           </div>
                        </div>
                     </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type='submit'>Update</button>
                    </div>
                  </form>
               </div>
            </div>
         </div>

      </div><!-- end section-body -->
		
	</section>
@endsection