@extends('layout-adm.master')

@section('title','Data PIC')

@section('drop-user','active')

@section('sdbar-list-user','active')

@section('content-judul','Data PIC')

@section('content-breadcrumb')
    <div class="breadcrumb-item"><a href="/dashboard">Data User</a></div>
    <div class="breadcrumb-item active">Edit Password</div>
@endsection
<style>
    button.top {
        margin-top: 35px;
    }
</style>
@section('content-dalam')
    <div class="section-body">
        
        @if (session()->has('sucess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sucess') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="row">  
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-info">
                <div class="card-header">
                    <h4>Edit Data User : {{$dc->name}}</h4>
                </div>
                <div class="card-body">
                    
                    <form method="post" action="{{ route('update_password', $dc->id) }}">
                        @csrf
                        @method('POST')

                        <div class="form-group row">

                            <div class="form-group col-sm-3">
                                <label for="password" class="col-form-label">Password Lama</label>
                                <input type="password" class="form-control" id="password" name="old_password" placeholder="Password Lama">
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="password" class="col-form-label">Password Baru</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru">
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="password" class="col-form-label">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" id="password" name="confirm_password" placeholder="Tulis Kembali Password Baru">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary top"><i class="far fa-plus-square"></i> Update Data</button>
                    </form>
                        
                </div>

                </div>
                </div>
            </div>
            </div>

        </div>
    </div>
@endsection

@push('js-before-scripts')
@endpush
@push('js-after-scripts')
@endpush

@push('css-scripts')
<link rel="stylesheet" href="../assets/css/style-custom.css">
@endpush