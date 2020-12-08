@extends('layouts.user.main')

@section('content')
   <div class="container">
      <div class="row">
         <!-- Breadcrumbs -->
         <div class="col-md-12 mt-3 mb-5">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></li>
                     <li class="breadcrumb-item active">Schema</li>
                  </ol>
               </nav>
            </div><!-- End Breadcrumbs -->
      </div>
   </div>
   
   <div class="row">
      <div class="container mb-3">
         <div class="col-md-12 mb-4 bg-white">
            <br><br><br><br><br><br><br><br><br>
         </div>
      </div>
   </div>
@endsection