@extends('layout-usr.master')

@section('title','Data Monitoring - User')

@section('content-dalam')
<div class="section-body">
    <div class="row">  
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-info">
            <div class="card-header">
                <h4>List Data Proyek</h4>
            </div>
            <div class="card-body">
              <?php $number=1; ?>
              <table class="table table-bordered table-striped css-serial" id="DataTables">
                <thead class="thead-dark">
                 <tr>
                   <th scope="col">No</th>
                   <th scope="col">PRK / WO</th>
                   <th scope="col">Unit</th>
                   <th scope="col">Nama Pekerjaan</th>
                   <th scope="col">RKAP</th>
                   <th scope="col">Status Pekerjaan</th>
                   <th scope="col">Status Admin</th>
                 </tr>
               </thead>
               <tbody>
                 @foreach ($displaydata as $dc)
                 <tr>
                   <td>{{ $number++}}</td>
                   <td> {{$dc->no_PRKorWO}}</td>
                   <td> {{$dc->unit}}</td> 
                   <td> {{$dc->nm_pekerjaan}}</a></td>
                   <td> {{$dc->rkap}}</td>
                   <td> {{$dc->stts_pkerjaan}}</td> 
                   <td> {{$dc->stts_admin}}</td> 
                 </tr>
                 @endforeach
               </tbody>
         </table>

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

