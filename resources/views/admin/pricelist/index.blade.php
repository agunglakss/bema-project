@extends('layouts.admin.main')

@section('content')
<section class="section">

   <div class="section-header">
      <h1>{{ $title }}</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
         <div class="breadcrumb-item">{{ $title }}</div>
      </div>
   </div>
   
   <div class="section-body">
      {{-- notifikasi form validasi --}}
      @if ($errors->has('file'))
         <div class="alert alert-info alert-dismissible show fade" id="alert">
            <div class="alert-body">
            <button class="close" data-dismiss="alert">
               <span>&times;</span>
            </button>
            {{ $errors->first('file') }}
            </div>
         </div>
      @endif

      {{-- notifikasi form sukses --}}
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

      {{-- script hide otomatis alert --}}
      <script>
         setTimeout(function () {
            document.getElementById('alert').style.display='none';}, 
            5000
         );
      </script>
      
      <div class="row">
         <div class="col-12">
            <div class="card mb-0">
               <div class="card-body">
                  <a class="btn btn-primary" href="{{ url('/pricelists/create') }}">Tambah Harga</a>
                  <button class="btn btn-success" data-toggle="modal" data-target="#modalImportHarga">Import Harga Dari Excel</button>
               </div>
            </div>
         </div>
      </div>

      <div class="row mt-4">
         <div class="col-12">
            <div class="card">
               <div class="card-body">

                  {{-- table --}}
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <tr>
                           <th>No</th>
                           <th>Motor</th>
                           <th>DP (IDR)</th>
                           <th>Potongan DP (IDR)</th>
                           <th>Created At</th>
                           <th>Updated At</th>
                           <th>Daftar Cicilan Harga</th>
                           <th>Action</th>
                        </tr>

                        @forelse ($pricelists as $pricelist)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $pricelist->motor->nama_motor }}</td>
                           <td>{{ number_format($pricelist->uang_muka) }}</td>
                           <td>{{ number_format($pricelist->diskon) }}</td>
                           <td>{{ $pricelist->created_at->format('d M Y') }}</td>
                           <td>{{ $pricelist->updated_at->format('d M Y') }}</td>
                           <td>
                              <a href="#" class="btn-sm btn-success" title="Detail Cicilan Harga">Detail Cicilan Harga</a>
                           </td>
                           <td>
                              <a class="btn-sm btn-info" href="{{ url('/pricelists') }}/{{ $pricelist->id }}/edit" title="Edit Daftar Harga"><i class="fa fa-edit"></i></a>
                              <a class="btn-sm btn-danger" href="" title="Hapus Daftar Harga"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                        @empty
                        <strong>Daftar Harga Motor Belum Tersedia.</strong>
                        @endforelse
                     </table>
                  </div>
                  {{-- end table --}}

                  {{-- pagination --}}
                  <div class="float-right">
                     <nav>
                        <ul class="pagination">
                           <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                 <span aria-hidden="true">&laquo;</span>
                                 <span class="sr-only">Previous</span>
                              </a>
                           </li>
                           <li class="page-item active">
                              <a class="page-link" href="#">1</a>
                           </li>
                           <li class="page-item">
                              <a class="page-link" href="#">2</a>
                           </li>
                           <li class="page-item">
                              <a class="page-link" href="#">3</a>
                           </li>
                           <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                 <span aria-hidden="true">&raquo;</span>
                                 <span class="sr-only">Next</span>
                              </a>
                           </li>
                        </ul>
                     </nav>
                  </div>
                  {{-- end pagination --}}

               </div>
            </div>
         </div>
      </div>

   </div><!-- end section-body -->
   
</section>
@endsection