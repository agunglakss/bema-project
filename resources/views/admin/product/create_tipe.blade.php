@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <div class="section-header-back">
            <a href="{{ url('/products/tipe-motor') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
         </div>
         <h1>Tambah Tipe Motor</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ url('/products/tipe-motor') }}">Tipe Motor</a></div>
            <div class="breadcrumb-item">Tambah Tipe Motor</div>
         </div>
      </div>
      
      <div class="section-body">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <form class="needs-validation" novalidate="" method="post" action="{{ url('products/tipe-motor') }}">
                     @csrf
                     <div class="card-body">
                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label" name="nama_tipe">Tipe Motor *</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text"  name="nama_tipe" required="">
                              <div class="invalid-feedback">
                                 Tipe motor wajib di isi.
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

      </div><!-- end section-body -->
		
	</section>
@endsection