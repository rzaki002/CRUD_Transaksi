<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Transaksi</title>
    <style>
        body{
            background-color: rgb(223, 219, 219);
        }
    </style>
    
</head>
<body>
    <main> 
        <div class="container">
            <h1 class="mt-5">Riwayat Transaksi Kendaraan<a href="javascript:void(0)" class="btn btn-primary" style="float: right;"
                id="btn-create-transaksi">Buat Transkasi Baru</a></h1>
<div class="card shadow-lg">
            <table class="table" id="projects-transaksi">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Customer</th>
                        <th scope="col">Id Kendaraan</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $transaksis)
                        <tr>
                            <th scope="row"id="{{ $transaksis->id }}"></th>
                            <td>{{ $transaksis->nama_customer }}</td>
                            <td>{{ $transaksis->id_kendaraan }}</td>
                            <td>{{ $transaksis->tgl_mulai }}</td>
                            <td>{{ $transaksis->tgl_selesai }}</td>
                            <td>{{ $transaksis->harga }}</td>
                            <td>{{ $transaksis->status }}</td>
                             <td class="text-center">
                                <a href="javascript:void(0)" id="btn-edit-transaksi" data-id="{{ $transaksis->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                <a href="javascript:void(0)" id="btn-delete-transaksi" data-id="{{ $transaksis->id }}" class="btn btn-danger btn-sm">DELETE</a>
                            </td> 
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </main>
    @include('buat_transaksi')
    @include('edit_transaksi')
    @include('delete_transaksi')
</body>
</html>