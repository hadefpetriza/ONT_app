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

    <title>PT TELKOM INDONESIA || ONT</title>
  </head>
  <body>
    <!-- Navigation Bar -->
    @include('layouts.nav') 

    <div class="w-100 vh-100 d-flex" style="background-image: url('images/3.jpg'); background-size: cover;">
      <div class="container" style="padding-top: 80px">
         <div class="row align-items-start">

           <!-- Database ONT -->
            <div class="col-lg-9 col-md-9">
               <div class="py-3 px-4 border_top" style="background-color:white;">
                 
                <!-- Title -->
                <h4 class="mb-3 text-center">Database ONT</h4>

                 <!-- Button Tambah ONT -->
                <button type="button" class="btn btn-danger btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                  <i class="fa-solid fa-plus"></i> Tambah ONT 
                </button>

                 <table id="ont_table" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>IP Address</th>
                          <th>Serial Number</th>
                          <th>Site ID</th>
                          <th>Type</th>
                          <th>Status</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $x)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $x->ip_address_ont }}</td>
                          <td>{{ $x->sn_ont }}</td>
                          <td>{{ $x->site_id }}</td>
                          <td>{{ $x->type }}</td>
                          @if ($x->status === 0)
                            <td><span class="badge bg-danger">Offline</span></td>
                          @elseif($x->status === 1)
                            <td><span class="badge bg-success">Online</span></td>
                          @elseif($x->status === NULL)
                            <td></td>
                          @endif
                          <td>
                            <a type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" id="editBtn">
                              <i class="fa-solid fa-pen-to-square"></i> 
                            </a>
                            <a class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can" onclick="deleteBtn({{ $x->id_ont }})"></i><a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
               </table>
               </div>
            </div>

            <!-- Terminal -->
            <div class="col-lg-3">
               <div class="py-3 px-3 border_top" style="background-color:white">
                  <!-- Title -->
                  <h4 style="display: inline-block;">Terminal</h4>
                  <button class="btn btn-warning btn-sm float-end mb-3"><i class="fa-solid fa-arrow-rotate-right"></i></button>

                  <!-- Konten -->

               </div>
            </div>
         </div>
      </div>
    </div>

    <!-- Modal Tambah ONT -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Tambah Optical Network Terminal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="ontForm">
              @csrf
              <div class="mb-2">
                <label for="ip_address" class="form-label">IP Address</label>
                <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="Masukkan IP Address">
              </div>
              <div class="mb-2">
                <label for="sn_ont" class="form-label">Serial Number ONT</label>
                <input type="text" class="form-control" id="sn_ont" name="sn_ont" placeholder="Masukkan Serial Number ONT">
              </div>
              <div class="mb-2">
                <label for="site_id" class="form-label">Site ID</label>
                <input type="text" class="form-control" id="site_id" name="site_id" placeholder="Masukkan Site ID">
              </div>
              <div class="mb-2">
                <label for="type" class="form-label">Tipe Produk</label>
                <select class="form-select" id="type" aria-label="Tipe Produk" name="type">
                  <option selected disabled>Pilih tipe produk</option>
                  <option value="Astinet">Astinet</option>
                  <option value="Metro E">Metro Ethernet</option>
                  <option value="WiFi ID">WiFi ID</option>
                  <option value="VPN">VPN</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" placeholder="Masukkan Alamat" id="alamat" name="alamat" style="resize:none" rows="3"></textarea>
              </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-sm btn-danger">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit ONT -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Optical Network Terminal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="ontForm">
              @csrf
              <div class="mb-2">
                <label for="ip_address" class="form-label">IP Address</label>
                <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="Masukkan IP Address">
              </div>
              <div class="mb-2">
                <label for="sn_ont" class="form-label">Serial Number ONT</label>
                <input type="text" class="form-control" id="sn_ont" name="sn_ont" placeholder="Masukkan Serial Number ONT">
              </div>
              <div class="mb-2">
                <label for="site_id" class="form-label">Site ID</label>
                <input type="text" class="form-control" id="site_id" name="site_id" placeholder="Masukkan Site ID">
              </div>
              <div class="mb-2">
                <label for="type" class="form-label">Tipe Produk</label>
                <select class="form-select" id="type" aria-label="Tipe Produk" name="type">
                  <option selected disabled>Pilih tipe produk</option>
                  <option value="Astinet">Astinet</option>
                  <option value="Metro E">Metro Ethernet</option>
                  <option value="WiFi ID">WiFi ID</option>
                  <option value="VPN">VPN</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" placeholder="Masukkan Alamat" id="alamat" name="alamat" style="resize:none" rows="3"></textarea>
              </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-sm btn-danger">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function () {
          $('#ont_table').dataTable({
            "lengthChange": false,
            "pageLength": 6,
          });
      
      });

      // submit form ONT
      $('#ontForm').on('submit', function(e){
            e.preventDefault();

            let ip_address = $('#ip_address').val();
            let sn_ont = $('#sn_ont').val();
            let site_id = $('#site_id').val();
            let type = $('#type').val();
            let alamat = $('#alamat').val();
            let _token = $('input[name=_token]').val();

            $.ajax({
              url: "{{ route('ont.add') }}",
              type: "POST",
              dataType: "json",
              data: {
                ip_address:ip_address,
                sn_ont:sn_ont,
                site_id:site_id,
                type:type,
                alamat:alamat,
                _token:_token
              },
              success: function(response){
                $('#addModal').modal('hide');
                if(response.status == 200)
                {
                  Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data ONT Berhasil Ditambahkan',
                  });
                }
                else if(response.status == 400)
                {
                  Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Data ONT Gagal Ditambahkan',
                 });
                } 
              }
            });
          });

      // delete data ONT
      function deleteBtn(id_ont){
        Swal.fire({
          title: 'Anda yakin ingin menghapus?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batalkan'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '/ont/'+id_ont,
              type: 'DELETE',
              data: {
                _token: $('input[name=_token]').val()
              },
              success: function(response){
                if(response.status == 200)
                {
                  Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data ONT Berhasil Ditambahkan',
                  });
                }
                else if(response.status == 400)
                {
                  Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Data ONT Gagal Ditambahkan',
                    });
                } 
                location.reload();
              },
            });
          }
        })
      }
      
    </script>
  </body>
</html>