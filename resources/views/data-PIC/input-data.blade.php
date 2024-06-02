@extends('layout-adm.master')

@section('title','Data PIC')

@section('drop-pic','active')

@section('sdbar-input-pic','active')

@section('content-judul','Data PIC')

@section('content-breadcrumb')
    <div class="breadcrumb-item"><a href="/dashboard">Data PIC</a></div>
    <div class="breadcrumb-item active">Input Data</div>
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
                    <h4>Input Data PIC</h4>
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
                    
                    <form method="post" id="pic" action="{{ route('data-pic.store')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="form-group col-sm-3">
                                <label for="pic" class="col-form-label">Nama PIC</label>
                                <input type="text" class="form-control" id="pic" name="nama" placeholder="Nama PIC" required>
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="posisi" class="col-form-label">Posisi</label>
                                <select class="form-control" id="posisi" name="posisi" required onchange="generateid()">
                                        <option value=""><b>Pilih Posisi PIC</b></option>
                                        <option id="IDPNI" value="Niaga">Niaga</option>
                                        <option id="IDPRE" value="Rendal" >Rendal</option>
                                        <option id="IDPPM" value="PM" >Project Manager</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="no_idp" class="col-form-label">Kode PIC</label>
                                <input type="text" class="form-control" id="no_idp" name="no_idp" placeholder="Kode PIC" required readonly>
                            </div>
                            <div class="form-group col-sm-2">
                                <button type="button" class="btn btn-warning top" onclick="generateid()">Generate</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="far fa-plus-square"></i> Tambah Data</button>
                    </form>

                </div>

                </div>
                </div>
            </div>
            </div>

        </div>
    </div>
@endsection
<script>
    function generateid() {

        var select = document.getElementById('posisi');
        var pre = select.options[select.selectedIndex].id;
        
        var d = new Date().getTime();
        // Remove some of the X's to generate a smaller ID 
        // You can also remove '-' if you don't want the ID formatted in sections
        var uuid = 'xxxx-xxxx'.replace(/[xy]/g, function(c) {
        var r = (d + Math.random()*16)%16 | 0;
        d = Math.floor(d/16);
        return (c=='x' ? r : (r&0x3|0x8)).toString(16);

    });
    document.getElementById('no_idp').value= pre+"-"+uuid;
    //return uuid;
}
    
</script>
@push('js-before-scripts')
@endpush
@push('js-after-scripts')
@endpush

@push('css-scripts')
<link rel="stylesheet" href="../assets/css/style-custom.css">
@endpush