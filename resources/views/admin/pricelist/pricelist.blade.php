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

                     <div class="table-responsive">
                        <table class="table table-striped">
                           <tr>
                              <th>No</th>
                              <th>Motor</th>
                              <th>Uang Muka</th>
                              <th>Potongan Harga</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                              <th>Daftar Cicilan Harga</th>
                              <th>Action</th>
                           </tr>
                          
                           <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td><div class="badge badge-success">Aktif</div></td>
                              <td>
                                 <a class="btn btn-info" href="{{ url('/pricelist') }}" title="Edit Daftar Harga"><i class="fa fa-edit"></i></a>
                                 <a class="btn btn-danger" href="{{ url('/pricelist') }}" title="Hapus Daftar Harga"><i class="fa fa-trash"></i></a>
                              </td>
                           </tr>
                        </table>
                     </div>

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

                  </div>
               </div>
            </div>
         </div>

      </div><!-- end section-body -->
		
	</section>
@endsection