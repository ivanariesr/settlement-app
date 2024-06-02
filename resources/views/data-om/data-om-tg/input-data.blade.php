@extends('layout-adm.master')

@section('title','Data Operation & Maintenance')

@section('drop-om','active')

@section('sdbar-input-tagihan-om','active')

@section('content-judul','Input Data Tagihan O&M')

@section('content-breadcrumb')
    <div class="breadcrumb-item"><a href="/data-om/">Data Settlement O&M</a></div>
    <div class="breadcrumb-item active">Input Tagihan</div>
@endsection

@section('content-dalam')
    <div class="section-body">
        <div class="row">  
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-info">
                <div class="card-header">
                    <h4>Input Data Tagihan Baru</h4>
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

                    <form method="post" action="{{route('data-om-tg.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                          <label for="penugasan" class="col-sm-2 col-form-label"><h6>[PENUGASAN]</h6></label>
                          <label for="customer" class="col-sm-5 col-form-label"><h6>[CUSTOMER]</h6></label>
                          <label for="woprk" class="col-sm-4 col-form-label"><h6>[WO /PRK]</h6></label>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-sm-2">
                                <label for="no_penugasan" class="col-form-label">No Surat</label>
                                <input type="text" class="form-control" name="no_penugasan" id="no_penugasan" placeholder="Nomor Surat">
                                <input type="text" class="form-control" name="no_ids" id="no_ids" placeholder="Nomor ID Surat" hidden>
                            </div>

                            <div class="form-group col-sm-5">   
                                <label for="nm_pekerjaan" class="col-form-label">Nama Pekerjaan <i style="color:red">(*Required</i></label>
                                <input type="text" class="form-control" name="nm_pekerjaan" id="nm_pekerjaan" placeholder="Nama Pekerjaan" required>
                                <input type="text" class="form-control" name="no_idm" id="no_idm" placeholder="Nomor ID Monitoring" hidden>
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="prktype" class="col-form-label">Type <i style="color:red">(*Required</i></label>
                                <select class="form-control" id="prktype" name="prktype" required>
                                    <optgroup label="PRK / WO">
                                        <option value="" disabled selected><b>Pilih</b></option>
                                        <option value="WO">WO</option>
                                        <option value="PRK">PRK</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="no_PRKorWO" class="col-form-label">Nomor PRK / WO <i style="color:red">(*Required</i></label>
                                <input type="text" class="form-control" name="no_PRKorWO" id="no_PRKorWO" placeholder="Input Nomor PRK / WO">
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="tgl_penugasan" class="col-form-label">Tanggal Surat</label>
                                <input type="date" class="form-control" name="tgl_penugasan" id="tgl_penugasan" placeholder="Tanggal Surat">
                                <br>
                                <input type="file" name="dok_penugasan"> [doc,docx,pdf]
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="no_idc" class="col-form-label">Unit <i style="color:red">(*Required</i></label>
                                <select class="form-control" id="no_idc" name="no_idc" required>
                                    <option value="" disabled selected><b>Pilih Unit</b></option>
                                    @foreach ($datacust as $dc)
                                    <option value="{{$dc->no_idc}}">{{$dc->unit}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="rkap" class="col-form-label">RKAP / NON RKAP <i style="color:red">(*Required</i></label>
                                <select class="form-control" id="rkap" name="rkap" required>
                                    <optgroup label="RKAP / NON RKAP">
                                        <option value="" disabled selected><b>Pilih</b></option>
                                        <option value="RKAP">RKAP</option>
                                        <option value="Non RKAP">Non RKAP</option>
                                    </optgroup>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="pelpekerjaan" class="col-sm-4 col-form-label"><h6>[PELAKSANAAN PEKERJAAN]</h6></label>
                            <label for="nilai" class="col-sm-8 col-form-label"><h6>[NILAI PEKERJAAN]</h6></label>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-sm-4">
                                <label for="stts_pkerjaan" class="col-form-label">Status Pekerjaan <i style="color:red">(*Required</i></label>
                                <select class="form-control" id="stts_pkerjaan" name="stts_pkerjaan" required>
                                    <optgroup label="Status Pekerjaan">
                                        <option value=""><b>Pilih Status</b></option>
                                        <option value="Batal">Batal</option>
                                        <option value="Belum Jalan">Belum Jalan</option>
                                        <option value="Running">Running</option>
                                        <option value="Selesai">Selesai</option>
                                    </optgroup>
                                </select>

                                <label for="stts_admin" class="col-form-label">Status Admin <i style="color:red">(*Required</i></label>
                                <select class="form-control" id="stts_pkerjaan" name="stts_admin" required>
                                    <optgroup label="Status Admin">
                                        <option value=""><b>Pilih Status</b></option>
                                        <option value="Kontrak">Kontrak</option>
                                        <option value="Laporan / BA">Laporan / BA</option>
                                        <option value="Tagihan">Tagihan</option>
                                        <option value="Terbayar">Terbayar</option>
                                        <option value="Cancel">Cancel</option>
                                    </optgroup>
                                </select>
                                
                                <label for="tgl_mulai" class="col-form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control col-sm-6" name="tgl_mulai" id="tgl_mulai" placeholder="Tanggal Mulai Pekerjaan">

                                <label for="tgl_akhir" class="col-form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control col-sm-6" name="tgl_akhir" id="tgl_akhir" placeholder="Tanggal Akhir Pekerjaan">
                            </div>

                            <div class="form-group col-sm-2">
                                <input type="text" class="form-control" name="no_idn" id="no_idn" placeholder="Nomor ID Nilai" hidden>
                                <label for="rab" class="col-form-label">RAB Dasar</label>
                                <input type="text" class="form-control rupiah" name="rab" id="rab" placeholder="RAB Dasar">
                                <br>
                                <input type="file" name="dok_rab"> [doc,docx,xlx,xls,xlsx,pdf]
                                <br>
                                <br>
                                <label for="kontrak" class="col-form-label">Kontrak</label>
                                <input type="text" class="form-control rupiah" name="kontrak" id="kontrak" placeholder="Harga Kontrak">
                                <br> 
                                <input type="file" name="dok_kontrak"> [doc,docx,pdf]
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="pnwrn" class="col-form-label">Penawaran</label>
                                <input type="text" class="form-control rupiah" name="pnwrn" id="pnwrn" placeholder="Penawaran Harga">
                                <br>
                                <input type="file" name="dok_pnwrn"> [doc,docx,pdf]
                                <br>
                                <br>
                                <label for="tagihan" class="col-form-label">Tagihan</label>
                                <input type="text" class="form-control rupiah" name="tagihan" id="tagihan" placeholder="Nilai Tagihan">
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="hpp" class="col-form-label">HPP</label>
                                <input type="text" class="form-control rupiah" name="hpp" id="hpp" placeholder="Harga Pokok Produksi">
                                <br>
                                <br>
                                <br>
                                <br>
                                <label for="terbayar" class="col-form-label" style="">Terbayar</label>
                                <input type="text" class="form-control rupiah" name="terbayar" id="terbayar" placeholder="Nilai Terbayar">
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="lr" class="col-form-label">L / R</label>
                                <input type="text" class="form-control" name="lr" id="lr" placeholder="Laba / Rugi">
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="PIC" class="col-sm-4 col-form-label"><h6>[PIC]</h6></label>
                                <label for="Datasurat" class="col-sm-4 col-form-label"><h6>[DATA SURAT]</h6></label>
                        </div>

                        <div class=row>
                            <div class="form-group col-sm-2">
                                <label for="no_idppm" class="col-form-label">Project Manager <i style="color:red">(*Required</i></label>
                                <select class="form-control" id="no_idppm" name="no_idppm" required>
                                    <option value=""><b>Pilih PM</b></option>
                                    @foreach ($datapic_idppm as $dp3)
                                    <option value="{{$dp3->no_idp}}">{{$dp3->nama}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <label for="no_idpre" class="col-form-label">Rendal <i style="color:red">(*Required</i></label>
                                <select class="form-control" id="no_idpre" name="no_idpre" required>
                                    <option value=""><b>Pilih Rendal</b></option>
                                    @foreach ($datapic_idpre as $dp2)
                                    <option value="{{$dp2->no_idp}}">{{$dp2->nama}}</option>
                                    @endforeach
                                </select>                            
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="no_idpni" class="col-form-label">Niaga <i style="color:red">(*Required</i></label>
                                <select class="form-control" id="no_idpni" name="no_idpni" required>
                                    <option value=""><b>Pilih Niaga</b></option>
                                    @foreach ($datapic_idpni as $dp1)
                                    <option value="{{$dp1->no_idp}}">{{$dp1->nama}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="noba_kspktn" class="col-form-label">Nomor BAK</label>
                                <input type="text" class="form-control" name="noba_kspktn" id="noba_kspktn" placeholder="Nomor Surat">
                                <br>
                                <input type="file" name="dok_kspktn"> [doc,docx,pdf]
                            </div>
                            
                            <div class="form-group col-sm-2">
                                <label for="tglk_dok" class="col-form-label">Tanggal BAK</label>
                                <input type="date" class="form-control" name="tglk_dok" id="tglk_dok" placeholder="Tanggal Mulai Pekerjaan">
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="noba_pp" class="col-form-label">Nomor BAPP</label>
                                <input type="text" class="form-control" name="noba_pp" id="noba_pp" placeholder="Nomor Surat">
                                <br>
                                <input type="file" name="dok_pp"> [doc,docx,pdf]
                            </div>
                            
                            <div class="form-group col-sm-2">
                                <label for="tglp_dok" class="col-form-label">Tanggal BAPP</label>
                                <input type="date" class="form-control" name="tglp_dok" id="tglp_dok" placeholder="Tanggal Mulai Pekerjaan">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="tglp_dok" class="col-form-label">Keterangan Pekerjaan</label>
                                <textarea class="form-control" name="ket_progress" id="ket_progress"> </textarea>
                            </div>
                            
                            <div class="form-group col-sm-2">
                                <label for="noba_stp" class="col-form-label">Nomor BASTP</label>
                                <input type="text" class="form-control" name="noba_stp" id="noba_stp" placeholder="Nomor Surat">
                                <br>
                                <input type="file" name="dok_stp"> [doc,docx,pdf]
                            </div>
                            
                            <div class="form-group col-sm-2">
                                <label for="tgls_dok" class="col-form-label">Tanggal BASTP</label>
                                <input type="date" class="form-control" name="tgls_dok" id="tgls_dok" placeholder="Tanggal Mulai Pekerjaan">
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
@endsection
@push('js-before-scripts')
@endpush
@push('js-after-scripts')
<script>
    $('.rupiah').on('keyup',function(){
    var angka = $(this).val();
    var hasilAngka = formatRibuan(angka);
        $(this).val(hasilAngka);
        });

    function formatRibuan(angka){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split           = number_string.split(','),
    sisa            = split[0].length % 3,
    angka_hasil     = split[0].substr(0, sisa),
    ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
    separator = sisa ? '.' : '';
    angka_hasil += separator + ribuan.join('.');
    }

    angka_hasil = split[1] != undefined ? angka_hasil + ',' + split[1] : angka_hasil;
    return angka_hasil;
    }

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
@endpush

@push('css-scripts')
<link rel="stylesheet" href="../assets/css/style-custom.css">
@endpush