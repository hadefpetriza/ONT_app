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

 <div class="w-100 vh-100 d-flex" style="background-image: url('/images/1.jpg'); background-size: cover;">
    <div class="container" style="padding-top: 80px">
       <div class="row align-items-start">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="py-3 px-4 border_top" style="background-color:white;">
                        <div class="card">
                            <div class="card-header">{{ __('Form Tambah Data Pengguna') }}</div>
                                <div class="card-body">
                                    <div class="row-1">
                                        <a href="/account" class="btn btn-success btn-sm">< Kembali</a>
                                    </div>
                                    <form class="text-start" method="POST" action="/account">
                                    @csrf
                                    <br>
                                        <div class="mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan nama" required>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email" required>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password" required>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            </div>
                                        </div>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </form>
                                </div>
                        </div>
                    </div>          
             </div>
          </div>
       </div>
    </div>
  </div>

</body>
</html>

<div class="container">
    
</div>