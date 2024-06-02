@extends('layout-usr.master')

@section('title','Data Customer - User')

@section('content-dalam')
        <div class="section-body">
            <div class="row">  
                <div class="col-12 col-md-12 col-lg-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h4>List Data Customer</h4>
                    </div>
                    <div class="card-body">
                        <?php $number=1; ?>
                        <table class="table table-bordered table-striped css-serial" id="DataTables">
                          <thead class="thead-dark">
                           <tr>
                             <th scope="col">No</th>
                             <th scope="col">Unit</th>
                             <th scope="col">Nama Customer</th>
                             <th scope="col">Type</th>
                             <th scope="col">Area</th>
                           </tr>
                         </thead>
                         <tbody>
                           @foreach ($displaydata as $dc)
                           <tr>
                             <td>{{ $number++}}</td>
                             <td> {{$dc->unit}}</td> 
                             <td> {{$dc->customer}}</td>
                             <td> {{$dc->cust_type}}</td>
                             <td> {{$dc->area}}</td>
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

        <script type="text/javascript">
            $(document).ready(function () {
                $('#DataTables').DataTable({
            });
        });
        </script>
@endsection


@push('js-before-scripts')
@endpush

@push('js-after-scripts')
@endpush

