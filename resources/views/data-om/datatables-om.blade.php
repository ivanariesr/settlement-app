<!DOCTYPE html>
<html>
<head>
  <title>Data Monitoring</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
  
  
  
</head>

<body>

<div>

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
           <th scope="col">Edit</th>
           <th scope="col">Delete</th>
         </tr>
       </thead>
       <tbody>
         @foreach ($displaydata as $dc)
         <tr>
           <td>{{ $number++}}</td>
           <td> {{$dc->no_PRKorWO}}</td>
           <td> {{$dc->unit}}</td> 
           <td> <a href="{{ route('data-om.show', $dc->no_idm)}}" target="_parent">{{$dc->nm_pekerjaan}}</a></td>
           <td> {{$dc->rkap}}</td>
           <td> {{$dc->stts_pkerjaan}}</td> 
           <td> {{$dc->stts_admin}}</td> 
           <td>
             <a href="{{ route('data-om.edit', $dc->no_idm)}}" target="_parent" class="btn btn-primary">
               Edit
             </a>
           </td>
           <td>
             
             <form onsubmit="return confirm('Apa anda yakin ingin menghapus data?');" action="{{route('data-om.destroy', $dc->no_idm)}}" method="post">
               @csrf
               @method('DELETE')
               <button class="btn btn-danger">Hapus</button>
             </form>
           </td>
         </tr>
         @endforeach
       </tbody>
 </table>

<script type="text/javascript">
$(document).ready(function () {
    $('#DataTables').DataTable({
        lengthChange: false,
        paging: true,
        ordering: true,
        info: false,
        dom: 'Bfrtip',
        buttons: ['csv','excel','pdf','print']
    });
}); 
</script>
</div>  
</body>
</html>