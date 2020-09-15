@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <div class="section-header-back">
            <a href="{{ url('/motor') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
         </div>
         <h1>Edit Motor</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ url('/motor') }}">Daftar Motor</a></div>
            <div class="breadcrumb-item">Edit Motor</div>
         </div>
      </div>
      
      <div class="section-body">
         
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <form class="needs-validation" novalidate="" method="post" action="{{ url('/motor') }}/{{ $motor->slug }}/edit">
                     @method('patch')
                     @csrf
                    <div class="card-body">

                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label" >Kategori Motor *</label>
                           <div class="col-sm-10">
                              <select class="form-control selectric" name="nama_kategori" required="">
                                 <option value="">- Pilih Tipe Motor -</option>
                                 @forelse ($kategoriMotors as $kategoriMotor)
                                 <option value="{{ old('nama_kategori') ?? $kategoriMotor->id }}" @if ($kategoriMotor->id == $motor->kategori_id) selected="selected" @endif >{{ $kategoriMotor->nama_kategori }}</option>    
                                 @empty
                                 <option value="">- Pilih Kategori Motor -</option>
                                 @endforelse
                              </select>
                              <div class="invalid-feedback">
                                 Kategori motor wajib di isi.
                              </div>
                           </div>
                        </div>
                      
                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label">Tipe Motor *</label>
                           <div class="col-sm-10">
                              <select class="form-control selectric" name="nama_tipe" required="">
                                 <option value="">- Pilih Tipe Motor -</option>
                                 @forelse ($tipeMotors as $tipeMotor)
                                 <option value="{{ old('nama_tipe') ?? $tipeMotor->id }}" @if ($tipeMotor->id == $motor->tipe_id) selected="selected" @endif >{{ $tipeMotor->nama_tipe }}</option>
                                 @empty
                                 <option value="">- Pilih Tipe Motor -</option>  
                                 @endforelse
                              </select>
                              <div class="invalid-feedback">
                                 Kategori motor wajib di isi.
                              </div>
                           </div>
                        </div>
                     
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label" name="nama_motor">Nama Motor *</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="nama_motor" value="{{ $motor->nama_motor }}" placeholder="Isi dengan nama Motor" required="">
                           <div class="invalid-feedback">
                              Nama motor wajib di isi.
                           </div>
                        </div>
                     </div>
                     
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label" name="harga_otr">Harga OTR Motor *</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="harga_otr" value="{{ $motor->harga_otr }}" placeholder="Isi harga motor dalam rupiah" required="">
                           <div class="invalid-feedback">
                              Nama otr motor wajib di isi.
                           </div>
                        </div>
                     </div>

                     {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label" name="warna">Warna Motor</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="warna" value="{{ $motor->warna }}">
                        </div>
                     </div> --}}

                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label" name="cc_motor">CC Motor</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="cc_motor" value="{{ $motor->cc_motor }}" >
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Deskripsi Motor</label>
                        <div class="col-sm-10">
                           <textarea class="summernote" name="deskripsi">{{ $motor->deskripsi }}</textarea>
                        </div>
                     </div>

                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
               </div>
            </div>
         </div>

      </div><!-- end section-body -->
		
	</section>
@endsection