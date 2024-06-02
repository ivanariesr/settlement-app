@extends('layout-adm.master')

@section('title','Dashboard')

@section('sdbar-dashboard','active')

@section('content-judul','Dashboard')

@push('css-scripts')
<link rel="stylesheet" href="../assets/css/style-custom.css">
@endpush

@section('content-breadcrumb')
    <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
@endsection

@section('content-dalam')
        <div class="section-body">
            <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                <div class="card-header">
                    <h4>Nilai Kontrak Tahunan</h4>
                </div>
                <div class="card-body">
                    
                    <canvas id="myChart" height="80"></canvas>

                </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                <div class="card-header">
                    <h4>Status Admin</h4>
                </div>
                <div class="card-body">

                    <canvas id="myChart3"></canvas>
                
                </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                <div class="card-header">
                    <h4>Status Pekerjaan</h4>
                </div>
                <div class="card-body">

                    <canvas id="myChart4"></canvas>

                </div>
                </div>
            </div>
            </div>
        </div>
@endsection

@push('js-before-scripts')
<script type="text/javascript">

var labels_pendapatan =  @json($labels_pendapatan);
var summary_pendapatan =  @json($data_pendapatan);

var labels_deadline =  @json($labels_deadline);
var summary_deadline =  @json($data_deadline);

var sa1 = @json($savalue1);
var sa2 = @json($savalue2);
var sa3 = @json($savalue3);
var sa4 = @json($savalue4);
var sa5 = @json($savalue5);
var sa6 = @json($savalue6);
var sa7 = @json($savalue7);
var sa8 = @json($savalue8);
var sa9 = @json($savalue9);
var sa10 = @json($savalue10);
var sa11 = @json($savalue11);
var sa12 = @json($savalue12);
var sa13 = @json($savalue13);

var sp1 = @json($spvalue1);
var sp2 = @json($spvalue2);
var sp3 = @json($spvalue3);
var sp4 = @json($spvalue4);
</script>
@endpush

@push('js-after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/dashboard-chart.js') }}"></script>
@endpush

