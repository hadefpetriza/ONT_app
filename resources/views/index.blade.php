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
               </table>
               </div>
            </div>

            <!-- Terminal -->
            <div class="col-lg-3">
               <div class="py-3 px-3 border_top" style="background-color:white">
                  <!-- Title -->
                  <h4 style="display: inline-block;">Terminal</h4>
                  <button class="btn btn-warning btn-sm float-end mb-3" onclick="location.reload()"><i class="fa-solid fa-arrow-rotate-right"></i></button>
                  <hr style="color:red">
                  <!-- Konten -->
                  @foreach($info as $i)
                    <p style="font-size: 10px">{{$i}}</p>
                  @endforeach 
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
                <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="Masukkan IP Address" autocomplete="off">
              </div>
              <div class="mb-2">
                <label for="sn_ont" class="form-label">Serial Number ONT</label>
                <input type="text" class="form-control" id="sn_ont" name="sn_ont" placeholder="Masukkan Serial Number ONT" autocomplete="off">
              </div>
              <div class="mb-2">
                <label for="site_id" class="form-label">Site ID</label>
                <input type="text" class="form-control" id="site_id" name="site_id" placeholder="Masukkan Site ID" autocomplete="off">
              </div>
              <div class="mb-2">
                <label for="type" class="form-label">Tipe Produk</label>
                <select class="form-select" id="type" aria-label="Tipe Produk" name="type" autocomplete="off">
                  <option selected disabled>Pilih tipe produk</option>
                  <option value="Astinet">Astinet</option>
                  <option value="Metro E">Metro Ethernet</option>
                  <option value="WiFi ID">WiFi ID</option>
                  <option value="VPN">VPN</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" placeholder="Masukkan Alamat" id="alamat" name="alamat" autocomplete="off" style="resize:none" rows="3"></textarea>
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
            <form id="ontEditForm" class="ontEditForm">
              @csrf
              <input type="hidden" class="form-control" id="id_ont" name="id_ont">
              <div class="mb-2">
                <label for="ip_address" class="form-label">IP Address</label>
                <input type="text" class="form-control" id="ip_address_e" name="ip_address" placeholder="Masukkan IP Address">
              </div>
              <div class="mb-2">
                <label for="sn_ont" class="form-label">Serial Number ONT</label>
                <input type="text" class="form-control" id="sn_ont_e" name="sn_ont" placeholder="Masukkan Serial Number ONT">
              </div>
              <div class="mb-2">
                <label for="site_id" class="form-label">Site ID</label>
                <input type="text" class="form-control" id="site_id_e" name="site_id" placeholder="Masukkan Site ID">
              </div>
              <div class="mb-2">
                <label for="type" class="form-label">Tipe Produk</label>
                <select class="form-select" id="type_e" aria-label="Tipe Produk" name="type">
                  <option selected disabled>Pilih tipe produk</option>
                  <option value="Astinet">Astinet</option>
                  <option value="Metro E">Metro Ethernet</option>
                  <option value="WiFi ID">WiFi ID</option>
                  <option value="VPN">VPN</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" placeholder="Masukkan Alamat" id="alamat_e" name="alamat" style="resize:none" rows="3"></textarea>
              </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-sm btn-danger">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Detail ONT -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="detailModalLabel">Detail Data Optical Network Terminal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="ontDetailForm" class="ontDetailForm">
              @csrf
              <div class="row mb-3">
                  <label for="id_ont" class="col-sm-4 col-form-label">#ID</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" disabled readonly id="id_ont_d">
                  </div>
              </div>  
              <div class="row mb-3">
                  <label for="ip_address" class="col-sm-4 col-form-label">IP Address</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" disabled readonly id="ip_address_d">
                  </div>
              </div> 
              <div class="row mb-3">
                  <label for="sn_ont" class="col-sm-4 col-form-label">Serial Number</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" disabled readonly id="sn_ont_d">
                  </div>
              </div> 
              <div class="row mb-3">
                  <label for="site_id" class="col-sm-4 col-form-label">Site ID</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" disabled readonly id="site_id_d">
                  </div>
              </div> 
              <div class="row mb-3">
                  <label for="type" class="col-sm-4 col-form-label">Tipe Produk</label>
                  <div class="col-sm-8">
                    <select class="form-select" id="type_d" disabled readonly aria-label="Tipe Produk" name="type">
                      <option selected disabled>Pilih tipe produk</option>
                      <option value="Astinet">Astinet</option>
                      <option value="Metro E">Metro Ethernet</option>
                      <option value="WiFi ID">WiFi ID</option>
                      <option value="VPN">VPN</option>
                    </select>
                  </div>
              </div> 
              <div class="row mb-3">
                  <label for="status" class="col-sm-4 col-form-label">Status</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" disabled readonly id="status_d">
                  </div>
              </div> 
              <div class="row mb-3">
                  <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="alamat_d" disabled readonly name="alamat" style="resize:none" rows="3"></textarea>
                  </div>
              </div> 
              <div class="row mb-3">
                  <label for="updated_at" class="col-sm-4 col-form-label">Last Update</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" disabled readonly id="updated_at_d">
                  </div>
              </div> 
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <!-- <button type="submit" class="btn btn-sm btn-danger">Update</button> -->
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
          sleep(10).then(() => { readONT(); });
      });

      // put sleep
      function sleep(ms) {
          return new Promise(resolve => setTimeout(resolve, ms));
      }

      // show data ONT
      function readONT(){
        var table = $('#ont_table').DataTable({
            "lengthChange": false,
            "pageLength": 6,
            "bDestroy": true,
            "ajax": { 
              url: "{{ route('ont.get') }}",
            },
            "columns": [
              { "data" : null,
                render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }  
              },
              { "data" : "ip_address_ont" },
              { "data" : "sn_ont" },
              { "data" : "site_id" },
              { "data" : "type" },
              { "data" : "status",
                render: function(data, type, row){
                  if(row.status === 0){
                    return '<span class="badge bg-danger">Offline</span>';
                  }
                  else if(row.status === 1){
                    return '<span class="badge bg-success">Online</span>';
                  }
                  else{
                    return row.status;
                  }
                }
              },
              { "data" : null,
                render: function(data, type, row){
                  return `<a href="javascript:void(0)" type="button" onclick="editBtn(${row.id_ont})" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" id="editBtn">
                            <i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can" onclick="deleteBtn(${row.id_ont})"></i><a>
                            <a href="javascript:void(0)" type="button" onclick="detailBtn(${row.id_ont})" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal" id="detailBtn">
                            <i class="fa-solid fa-eye"></i></a>`;
                }
              },
            ]
          });
      }
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
                readONT();
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
                  $('#ip_address')[0].value = '';
                  $('#sn_ont')[0].value = '';
                  $('#site_id')[0].value = '';
                  $('#alamat')[0].value = '';
                  $('#type')[0].selectedIndex = 0;

                  location.reload();
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
                readONT();
                if(response.status == 200)
                {
                  Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data ONT Berhasil Dihapus',
                  });
                }
                else if(response.status == 400)
                {
                  Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Data ONT Gagal Dihapus',
                    });
                } 
              },
            });
          }
        })
      }
      // show edit data ONT
      function editBtn(id_ont){
        $.ajax({
          url: '/ont/'+id_ont,
          type: "GET",
          success: function(response) {
              if(response[0]) {
                $('#id_ont').val(response[0].id_ont);
                $('#ip_address_e').val(response[0].ip_address_ont);
                $('#sn_ont_e').val(response[0].sn_ont);
                $('#site_id_e').val(response[0].site_id);
                $('#type_e').val(response[0].type);
                $('#alamat_e').val(response[0].alamat);
            }
          }
        });
      }

      // show detail data ONT
      function detailBtn(id_ont){
        $.ajax({
          url: '/ont/'+id_ont,
          type: "GET",
          success: function(response) {
              if(response[0]) {
                $('#id_ont_d').val(response[0].id_ont);
                $('#ip_address_d').val(response[0].ip_address_ont);
                $('#sn_ont_d').val(response[0].sn_ont);
                $('#site_id_d').val(response[0].site_id);
                $('#type_d').val(response[0].type);
                $('#alamat_d').val(response[0].alamat);
                $('#updated_at_d').val(moment(response[0].updated_at).utc().format('DD-MM-YYYY HH:mm:ss'));
                
                if(response[0].status == 0){
                  $('#status_d').val("Offline");
                }
                else if(response[0].status == 1){
                  $('#status_d').val("Online");
                }
                else{
                  $('#status_d').val(response[0].status);
                }
                
            }
          }
        });
      }

      //submit update data ONT
      $('#ontEditForm').on('submit', function(e){
            e.preventDefault();

            let id_ont = $('#id_ont').val();
            let ip_address = $('#ip_address_e').val();
            let sn_ont = $('#sn_ont_e').val();
            let site_id = $('#site_id_e').val();
            let type = $('#type_e').val();
            let alamat = $('#alamat_e').val();
            let _token = $('input[name=_token]').val();

            $.ajax({
              url: "{{ route('ont.update') }}",
              type: "PUT",
              data: {
                id_ont:id_ont,
                ip_address:ip_address,
                sn_ont:sn_ont,
                site_id:site_id,
                type:type,
                alamat:alamat,
                _token:_token
              },
              success: function(response){
                $('#editModal').modal('hide');
                readONT();
                if(response.status == 200)
                {
                  Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data ONT Berhasil Diperbaharui',
                  });
                }
                else if(response.status == 400)
                {
                  Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Data ONT Gagal Diperbaharui',
                 });
                } 
              }
            });
          });
      
    </script>
  </body>
</html>