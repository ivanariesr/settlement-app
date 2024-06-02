@extends('layout-adm.master')

@section('title','Data User')

@section('drop-user','active')

@section('sdbar-input-user','active')

@section('content-judul','Data User')

@section('content-breadcrumb')
    <div class="breadcrumb-item"><a href="/dashboard">Data User</a></div>
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
                    <h4>Input Data User</h4>
                </div>
                <div class="card-body">
    
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
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

                    <form method="post" id="handleAjax" action="{{url('do-register')}}" name="postform">
                        @csrf
                        <div class="form-group row">
                            <div class="form-group col-sm-3">
                                <label for="name" class="col-form-label">Nama User</label>
                                <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name" placeholder="Nama User" required>
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" value="{{old('email')}}" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="role" class="col-form-label">Role</label>
                                <select class="form-control" id="role" name="role" required>
                                        <option value=""><b>Pilih Role User</b></option>
                                        <option id="admin" value="Super Admin">Super Admin</option>
                                        <option id="user" value="Admin" >Admin</option>
                                </select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <div class="form-group col-sm-3">
                                <label for="username" class="col-form-label">Username</label>
                                <input type="text" value="{{old('username')}}" class="form-control" id="username" name="username" placeholder="Username" required onkeyup="nospaces(this)">
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="password" class="col-form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="password" class="col-form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password" name="confirm_password" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="far fa-plus-square"></i> Register </button>
                    </form>

                </div>

                </div>
                </div>
            </div>
            </div>

        </div>
    </div>
@endsection
<script type="text/javascript">
function nospaces(t){
  if(t.value.match(/\s/g)){
    t.value=t.value.replace(/\s/g,'');
  }
}
</script>
@push('js-before-scripts')
@endpush
@push('js-after-scripts')
@endpush

@push('css-scripts')
<link rel="stylesheet" href="../assets/css/style-custom.css">
@endpush