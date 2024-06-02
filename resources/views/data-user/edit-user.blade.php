@extends('layout-adm.master')

@section('title','Data PIC')

@section('drop-user','active')

@section('sdbar-list-user','active')

@section('content-judul','Data PIC')

@section('content-breadcrumb')
    <div class="breadcrumb-item"><a href="/dashboard">Data User</a></div>
    <div class="breadcrumb-item active">Edit Data</div>
@endsection
<style>
    button.top {
        margin-top: 35px;
    }
    a.top {
        margin-top: 35px;
    }
</style>
@section('content-dalam')
    <div class="section-body">
        <div class="row">  
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-info">
                <div class="card-header">
                    <h4>Edit Data User : {{$dc->nama}}</h4>
                </div>
                <div class="card-body">
                    
                    <form method="post" action="{{ route('data-user.update', $dc->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <div class="form-group col-sm-3">
                                <label for="name" class="col-form-label">Nama User</label>
                                <input type="text" value="{{ $dc->name }}" class="form-control" id="name" name="name" placeholder="Nama User">
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" value="{{ $dc->email }}" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <?php 
                            if (auth()->user()->role == 'Super Admin') {
                            echo'<div class="form-group col-sm-3">
                                <label for="role" class="col-form-label">Role</label>
                                <select class="form-control" id="role" name="role" required>
                                        <option value="';?>{{ $dc->role }}<?php echo'>"><b>';?>{{ $dc->role }}<?php echo' (Awal)</b></option>
                                        <option id="admin" value="Super Admin">Super Admin</option>
                                        <option id="user" value="Admin" > Admin </option>
                                </select>
                            </div>';
                            }
                            else {
                                echo '';
                            }
                            ?>
                        </div> 

                        <div class="form-group row">
                            <div class="form-group col-sm-3">
                                <label for="username" class="col-form-label">Username</label>
                                <input type="text" value="{{ $dc->username }}" class="form-control" id="username" name="username" placeholder="Username" onkeyup="nospaces(this)">
                            </div>


                            <div class="form-group col-sm-3">
                                <label for="password" class="col-form-label">Password Lama</label>
                                <input type="text" class="form-control" id="password_text" name="password_text" placeholder="Password" value="{{ $dc->password_text }}" disabled>
                            </div>

                            <div class="form-group col-sm-3">
                            <a href="{{ route('data-user.show', $dc->id) }}" class="btn btn-warning top"><i class="far fa-pencil-square-o"></i> Ubah Password</a>
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