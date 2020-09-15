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
                           <th>Harga OTR</th>
                           <th>Potongan DP (IDR)</th>
                           <th>Created At</th>
                           <th>Updated At</th>
                           <th>Daftar Cicilan Harga</th>
                           <th>Action</th>
                        </tr>

                        @forelse ($motors as $motor)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $motor->nama_motor }}</td>
                           <td>{{ number_format($motor->harga_otr) }}</td>
                           {{-- <td>{{ number_format($pricelist->diskon) }}</td> --}}
                           <td>{{ $motor->created_at->format('d M Y') }}</td>
                           <td>{{ $motor->updated_at->format('d M Y') }}</td>
                           <td>
                              <a href="#" class="btn-sm btn-success" title="Detail Cicilan Harga">Detail Cicilan Harga</a>
                           </td>
                           <td>
                              <a class="btn-sm btn-info" href="{{ url('/pricelists') }}/{{ $motor->id }}/edit" title="Edit Daftar Harga"><i class="fa fa-edit"></i></a>
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
                     {{ $motors->links() }}
                  </div>
                  {{-- end pagination --}}

               </div>
            </div>
         </div>
      </div>

   </div><!-- end section-body -->
   
</section>
@endsection