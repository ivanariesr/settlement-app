<!DOCTYPE html>
<html>
<head>
  <title>Data PIC</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

</head>

<body>

<div>
  <?php $number=1; ?>
      <table class="table table-bordered table-striped css-serial" id="DataTables">
        <thead class="thead-dark">
         <tr>
           <th scope="col">No</th>
           <th scope="col">Nama</th>
           <th scope="col">Posisi</th>
           <th scope="col">Kode PIC</th>
           <th scope="col">Edit</th>
           <th scope="col">Delete</th>
         </tr>
       </thead>
       <tbody>
         @foreach ($displaydata as $dc)
         <tr>
           <td>{{ $number++}}</td>
           <td> {{$dc->nama}}</td>
           <td> {{$dc->posisi}}</td>
           <td> {{$dc->no_idp}}</td>
           <td>
             <a href="{{ route('data-pic.edit', $dc->id)}}" target="_parent" class="btn btn-primary">
               Edit
             </a>
           </td>
           <td>
             <form onsubmit="return confirm('Apa anda yakin ingin menghapus data?');" action="{{route('data-pic.destroy', $dc->id)}}" method="post">
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
    });
});
</script>
</div>  
</body>
</html>