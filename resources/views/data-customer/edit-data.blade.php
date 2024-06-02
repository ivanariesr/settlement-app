@extends('layout-adm.master')

@section('title','Data Customer')

@section('drop-customer','active')

@section('sdbar-input-customer','active')

@section('content-judul','Data Customer')

@section('content-breadcrumb')
    <div class="breadcrumb-item"><a href="/dashboard">Data Customer</a></div>
    <div class="breadcrumb-item active">Edit Data</div>
@endsection

@section('content-dalam')
    <div class="section-body">
        <div class="row">  
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-info">
                <div class="card-header">
                    <h4>Edit Data Customer : {{$dc->unit}}</h4>
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
                    
                    <form method="post" action="{{ route('data-customer.update', $dc->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">

                            <div class="form-group col-sm-4">
                                <label for="unit" class="col-form-label">Unit</label>
                                <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" required value="{{$dc->unit}}">
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="customer" class="col-form-label">Customer</label>
                                <input type="text" class="form-control" id="customer" name="customer" placeholder="Nama Customer" required value="{{$dc->customer}}">
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="cust_type" class="col-form-label">Customer Type</label>
                                <select class="form-control" id="cust_type" name="cust_type" required>
                                        <option value="{{$dc->cust_type}}"><b>{{$dc->cust_type}} (Awal) </b></option>
                                        <option value="PJB Group">PJB Group</option>
                                        <option value="PLN">PLN</option>
                                        <option value="Pihak Lain">Pihak Lain</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="area" class="col-form-label">Area</label>
                                <input type="text" class="form-control" id="area" name="area" placeholder="Area" required value="{{$dc->area}}">
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="no_idc" class="col-form-label">Kode Customer</label>
                                <input type="text" class="form-control" id="no_idc" name="no_idc" placeholder="Kode Customer" readonly required value="{{$dc->no_idc}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="far fa-plus-square"></i> Update Data</button>
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