@extends('layouts.admin.main')

@section('content')
	<section class="section">

		<div class="section-header">
         <div class="section-header-back">
            <a href="{{ url('/motor') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
         </div>
         <h1>Tambah Motor</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ url('/motor') }}">Daftar Motor</a></div>
            <div class="breadcrumb-item">Tambah Motor</div>
         </div>
      </div>
      
      <div class="section-body">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <form class="needs-validation" novalidate="" method="post" action="{{ url('/motor') }}" enctype="multipart/form-data">
                     @csrf
                    <div class="card-body">

                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label" >Kategori Motor <span style="color: red;">*</span></label>
                           <div class="col-sm-10">
                              <select class="form-control selectric" name="nama_kategori">
                                 <option value="">- Pilih Kategori Motor -</option>
                                 @forelse ($kategoriMotors as $kategoriMotor)
                                 <option value="{{ $kategoriMotor->id }}">{{ $kategoriMotor->nama_kategori }}</option>    
                                 @empty
                                 <option value="">- Pilih Kategori Motor -</option>
                                 @endforelse
                              </select>
                              <div class="invalid-feedback">
                                 Tipe motor wajib di isi.
                               </div>
                           </div>
                        </div>
                      
                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label">Tipe Motor <span style="color: red;">*</span></label>
                           <div class="col-sm-10">
                              <select class="form-control selectric" name="nama_tipe" >
                                 <option value="">- Pilih Tipe Motor -</option>
                                 @forelse ($tipeMotors as $tipeMotor)
                                 <option value="{{ $tipeMotor->id }}">{{ $tipeMotor->nama_tipe }}</option>
                                 @empty
                                 <option value="">- Pilih Tipe Motor -</option>  
                                 @endforelse
                              </select>
                           </div>
                        </div>
                     
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label" name="nama_motor">Nama Motor <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="nama_motor" >
                           <div class="invalid-feedback">
                              Nama motor wajib di isi.
                           </div>
                        </div>
                     </div>

                     <div class="form-group row mb-4">
                        <label class="col-sm-2 col-form-label">Warna Motor</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control inputtags" name="warna[]" placeholder="Pisahkan dengan koma, jika lebih dari satu warna">
                        </div>
                     </div>
                     
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label" name="harga_otr">Harga OTR Motor <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                           <input type="number" class="form-control" name="harga_otr" >
                           <div class="invalid-feedback">
                              Nama otr motor wajib di isi.
                           </div>
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label" name="cc_motor">CC Motor</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="cc_motor">
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="thumbnail">Thumbnail</label>
                        <div class="input-group col-sm-10">
                           <input type="file" class="form-control" name="thumbnail" style="padding:7px 0 0 5px;">
                        </div>
                     </div>
                     
                     <div class="form-group row" id="wrapper">
                        <label class="col-sm-2 col-form-label" for="upload_img[]">Upload Gambar</label>
                        <div class="input-group col-sm-10">
                           <input type="file" class="form-control" name="upload_img[]" style="padding:7px 0 0 5px;">
                           <div class="input-group-append">
                              <button class="btn btn-info btnAdd"><i class="fa fa-plus"></i> Tambah</button>
                           </div>
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Deskripsi Motor</label>
                        <div class="col-sm-10">
                           <textarea class="summernote" name="deskripsi"></textarea>
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