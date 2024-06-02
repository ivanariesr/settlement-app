@extends('layout-adm.master')

@section('title','Data PIC')

@section('drop-pic','active')

@section('sdbar-input-pic','active')

@section('content-judul','Data PIC')

@section('content-breadcrumb')
    <div class="breadcrumb-item"><a href="/dashboard">Data PIC</a></div>
    <div class="breadcrumb-item active">Edit Data</div>
@endsection
<style>
    button.top {
        margin-top: 35px;
    }
</style>
@section('content-dalam')
    <div class="section-body">
        <div class="row">  
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-info">
                <div class="card-header">
                    <h4>Edit Data PIC : {{$dc->nama}}</h4>
                </div>
                <div class="card-body">
                    
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

                    <form method="post" action="{{ route('data-pic.update', $dc->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <div class="form-group col-sm-3">
                                <label for="pic" class="col-form-label">Nama PIC</label>
                                <input type="text" class="form-control" id="pic" name="nama" placeholder="Nama PIC" required value="{{ $dc->nama }}">
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="posisi" class="col-form-label">Posisi</label>
                                <select class="form-control" id="posisi" name="posisi" required onchange="generateid()">
                                        <option value="{{ $dc->posisi }}"><b>{{ $dc->posisi }} (Awal)</b></option>
                                        <option id="IDPNI" value="Niaga">Niaga</option>
                                        <option id="IDPRE" value="Rendal" >Rendal</option>
                                        <option id="IDPM" value="PM" >Project Manager</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="no_idp" class="col-form-label">Kode PIC</label>
                                <input type="text" class="form-control" id="no_idp" name="no_idp" placeholder="Kode PIC" required readonly value="{{ $dc->no_idp}}">
                            </div>
                            <div class="form-group col-sm-2">
                                <button type="button" class="btn btn-warning top" onclick="generateid()">Generate</button>
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