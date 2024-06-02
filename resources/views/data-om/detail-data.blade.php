@extends('layout-adm.master')

@section('title','Data Monitoring')

@section('drop-monitoring','active')

@section('sdbar-list-monitoring','active')

@section('content-judul','Data Monitoring')

@section('content-breadcrumb')
    <div class="breadcrumb-item"><a href="/dashboard">Data Monitoring</a></div>
    <div class="breadcrumb-item active">Detail Data</div>
@endsection

@method('PATCH')
@section('content-dalam')
    <div class="section-body">
        <div class="row">  
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-info">
                <div class="card-header">
                    <h4>Detail Data Monitoring Proyek</h4>
                    <a href="{{ route('data-om.edit', $dc[0]->no_idm)}}" target="_parent">
                        <button class="btn btn-primary pull-right" style="margin-left: 20px;"> Edit </button>
                    </a>
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
                    <div class="form-group row">
                        <table class="table table-striped table-hover" style="font-size: 13px;">
                            <tbody>
                                <tbody>
                                    <tr>
                                        <td>[PENUGASAN]</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>[CUSTOMER]</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>[WO / PRK]</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>No Surat</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->no_penugasan}}</td>
                                        <td>Nama Pekerjaan</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->nm_pekerjaan}}</td>
                                        <td>Type</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->prktype}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Surat</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->tgl_penugasan}}</td>
                                        <td>Unit</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->unit}}</td>
                                        <td>Nomor</td>
                                        <td>: </td>
                                        <td>&nbsp; {{$dc[0]->no_PRKorWO}}</td>
                                    </tr>
                                    <tr>
                                        <td>Surat Penugasan</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;<a href="{{route('download_file', $dc[0]->dok_penugasan)}}" target="_parent">{{$dc[0]->dok_penugasan}}</a></td>
                                        <td>RKAP / NON</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->rkap}}</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>[PELAKSANA PEKERJAAN]</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;[NILAI PEKERJAAN]</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Status Pekerjaan</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->stts_pkerjaan}}</td>
                                        <td>RAB Dasar</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;<a href="{{route('download_file', $dc[0]->dok_rab)}}" target="_parent">{{$dc[0]->rab}}</a></td>
                                        <td>Penawaran</td>
                                        <td>: </td>
                                        <td>&nbsp;<a href="{{route('download_file', $dc[0]->dok_pnwrn)}}" target="_parent">{{$dc[0]->pnwrn}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Status Admin</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->stts_admin}}</td>
                                        <td>HPP</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->hpp}}</td>
                                        <td>L / R</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->lr}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Mulai </td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->tgl_mulai}}</td>
                                        <td>Tagihan</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->tagihan}}</td>
                                        <td>Kontrak</td>
                                        <td>: </td>
                                        <td>&nbsp;<a href="{{route('download_file', $dc[0]->dok_kontrak)}}" target="_parent">{{$dc[0]->kontrak}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Akhir</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp;{{$dc[0]->tgl_akhir}}</td>
                                        <td>Terbayar</td>
                                        <td>&nbsp;:</td>
                                        <td>&nbsp; {{$dc[0]->terbayar}}</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>[PIC]</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>[DATA SURAT]</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Project Manager</td>
                                        <td>:</td>
                                        <td>&nbsp;{{$datapic_idppm[0]->nama}}</td>
                                        <td>Nomor BAK</td>
                                        <td>:</td>
                                        <td>&nbsp;<a href="{{route('download_file', $dc[0]->dok_kspktn)}}" target="_parent">{{$dc[0]->noba_kspktn}}</a></td>
                                        <td>Tanggal BAK</td>
                                        <td>:</td>
                                        <td>&nbsp;{{$dc[0]->tglk_dok}}</td>
                                    </tr>
                                    <tr>
                                        <td>Niaga</td>
                                        <td>:</td>
                                        <td>&nbsp;{{$datapic_idpni[0]->nama}}</td>
                                        <td>Nomor BAPP</td>
                                        <td>:</td>
                                        <td>&nbsp;<a href="{{route('download_file', $dc[0]->dok_pp)}}" target="_parent">{{$dc[0]->noba_pp}}</a></td>
                                        <td>Tanggal BAPP</td>
                                        <td>:</td>
                                        <td>&nbsp;{{$dc[0]->tglp_dok}}</td>
                                    </tr>
                                    <tr>
                                        <td>Rendal</td>
                                        <td>:</td>
                                        <td>&nbsp;{{$datapic_idpre[0]->nama}}</td>
                                        <td>Nomor BASTP</td>
                                        <td>:</td>
                                        <td>&nbsp;<a href="{{route('download_file', $dc[0]->dok_stp)}}" target="_parent">{{$dc[0]->noba_stp}}</a></td>
                                        <td>Tanggal BASTP</td>
                                        <td>:</td>
                                        <td>&nbsp;{{$dc[0]->tgls_dok}}</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan Pekerjaan</td>
                                        <td>:</td>
                                        <td>&nbsp;{{$dc[0]->ket_progress}}</td>
                                        <td>Originator</td>
                                        <td>:</td>
                                        <td><b>&nbsp;{{$dc[0]->originator}}</b></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
                </div>
            </div>
            </div>

        </div>
    </div>
@endsection
<script>


    var d = new Date().getTime();
    // Remove some of the X's to generate a smaller ID 
    // You can also remove '-' if you don't want the ID formatted in sections
    var uuid = 'xxxx-xxxx'.replace(/[xy]/g, function(c) {
        var r = (d + Math.random()*16)%16 | 0;
        d = Math.floor(d/16);
        return (c=='x' ? r : (r&0x3|0x8)).toString(16);
    });

    function generateids() {
    var pre = 'IDS-';
    document.getElementById('no_ids').value= pre+uuid;
    //return uuid;
    }
    function generateidm() {
    var pre = 'IDM-';
    document.getElementById('no_idm').value= pre+uuid;
    //return uuid;
    }
    function generateidn() {
    var pre = 'IDN-';
    document.getElementById('no_idn').value= pre+uuid;
    //return uuid;
    }
window.addEventListener("load", myInit, true); function myInit(){generateids(),generateidm(),generateidn()};
</script>
@push('js-before-scripts')
@endpush
@push('js-after-scripts')
@endpush

@push('css-scripts')
<link rel="stylesheet" href="../assets/css/style-custom.css">
@endpush