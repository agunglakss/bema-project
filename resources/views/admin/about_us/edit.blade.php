@extends('layouts.admin.main') 

@section('content') 
<section class="section">

    <div class="section-header">
        <h1>Tentang Kami</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Tentang kami</div>
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

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post" action="{{ url('/tentang-kami/edit') }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf   
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="id" value="{{$aboutUs->id}}">
                                    <textarea class="summernote" name="deskripsi">{{ $aboutUs->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- end section-body -->

</section>
@endsection