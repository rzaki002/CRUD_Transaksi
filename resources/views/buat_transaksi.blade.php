<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="name" class="control-label">Nama Customer</label>
                    <input type="text" class="form-control" id="nama_customer">
                    <div class="alert alert-danger mt-2 d-none" role="alert" ></div>
                </div>
                

                <div class="form-group">
                    <label class="control-label">ID</label>
                    <input type="text" class="form-control" id="id_kendaraan" ></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert" ></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tgl_mulai" rows="2"></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert" ></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tgl_selesai" rows="2"></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert" ></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Harga</label>
                    <input type="text" class="form-control" id="harga" rows="2"></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert" ></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Status</label>
                    <input type="text" class="form-control" id="status" rows="2"></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert" ></div>
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
    $('body').on('click', '#btn-create-transaksi', function () {

        $('#modal-create').modal('show');
    });

    $('#store').click(function(e) {
        e.preventDefault();

        let nama_customer   = $('#nama_customer').val();
        let id_kendaraan= $('#id_kendaraan').val();
        let tgl_mulai   = $('#tgl_mulai').val();
        let tgl_selesai = $('#tgl_selesai').val();
        let harga = $('#harga').val();
        let status = $('#status').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        $.ajax({

            url: `/transaksi`,
            type: "POST",
            cache: false,
            data: {
                "nama_customer": nama_customer,
                "id_kendaraan": id_kendaraan,
                "tgl_mulai":tgl_mulai,
                "tgl_selesai":tgl_selesai,
                "harga":harga,
                "status":status,
                "_token": token
            },
            success:function(response){

                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                let transaksi = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.title}</td>
                        <td>${response.data.content}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-transaksi" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-transaksi" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                $('#table-transaksi').prepend(transaksi);
                
                $('#nama_customer').val('');
                $('#id_kendaraan').val('');
                $('#tgl_mulai').val('');
                $('#tgl_selesai').val('');
                $('#harga').val('');
                $('#status').val('');

                $('#modal-create').modal('hide');
                

            },

        });

    });

</script>