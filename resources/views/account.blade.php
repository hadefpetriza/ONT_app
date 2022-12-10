<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Open+Sans:wght@500;600;700;800&family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">

    <!-- Eksternal CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Animation -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">

    <!-- moment js -->
    <script type = "text/JavaScript" src = " https://MomentJS.com/downloads/moment.js"></script>

    <title>PT TELKOM INDONESIA || ONT</title>
  </head>
  <body>

 <!-- Navigation Bar -->
 @include('layouts.nav') 

 <div class="w-100 vh-100 d-flex" style="background-image: url('images/1.jpg'); background-size: cover;">
    <div class="container" style="padding-top: 80px">
       <div class="row align-items-start">

         <!-- Database ONT -->
          <div class="col-lg-12 col-md-12">
             <div class="py-3 px-4 border_top" style="background-color:white;">
               
              <!-- Title -->
              <h4 class="mb-3 text-center">Database User</h4>
              

               <!-- Button Tambah User -->
               @can('admin')
               <a href="/account/create" class="btn btn-danger">+ Tambah</a><br><br>
               @endcan

               <table id="ont_table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->password }}</td>
                            <td>{{ $data->role }}</td>
                            @can('admin')    
                            <td>
                                <a href="/account/{{ $data->id }}/edit" class="btn btn-warning">Edit</a>
                                <form action="/account/{{ $data->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button name ="btndelete" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <td class="text-center" colspan="5">Data tidak ada</td>
                    @endforelse
                </tbody>
             </table>
             </div>
          </div>

       </div>
    </div>
  </div>


</body>
</html>
