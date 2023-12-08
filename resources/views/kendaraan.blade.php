<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Kendaraan</title>
</head>
<body>  
    <main> 
        <div class="container">
            <h1 class="mt-5">Pilih Kendaraan<a href="javascript:void(0)" class="btn btn-primary" style="float: right;"  data-bs-toggle="modal" data-bs-target="#add-project-modal">Pilh</a></h1>

            <table class="table" id="projects-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kendaraan</th>
                        <th scope="col">Nomor Plat Kendaraan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kendaraan as $kendaraans)
                        <tr>
                            <th scope="row"id="index_{{ $kendaraans->id }}"></th>
                            <td>{{ $kendaraans->nama_kendaraan}}</td>
                            <td>{{ $kendaraans->no_plat }}</td>
                            <td class="text-center">
                                <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $kendaraans->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $kendaraans->id }}" class="btn btn-danger btn-sm">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

            <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pilih Kendaraan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
            
                            <div class="form-group">
                                <label for="name" class="control-label">Nama kendaraan</label>
                                <input type="text" class="form-control" id="title">
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                            </div>
                            
            
                            <div class="form-group">
                                <label class="control-label">Nomor Plat/label>
                                <textarea class="form-control" id="content" rows="4"></textarea>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content"></div>
                            </div>
            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                            <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $('body').on('click', '')
                
                </script>
    </main>
</body>
</html>