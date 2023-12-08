<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="transaksi_id">
                <div class="form-group">
                    <label for="name" class="control-label">Nama Customer</label>
                    <input type="text" class="form-control" id="nama_customer_edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert"></div>
                </div>
                

                <div class="form-group">
                    <label class="control-label">ID</label>
                    <input type="text" class="form-control" id="id_kendaraan_edit" ></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tgl_mulai_edit" rows="2"></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tgl_selesai_edit" rows="2"></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert" ></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Harga</label>
                    <input type="text" class="form-control" id="harga_edit" rows="2"></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Status</label>
                    <textarea class="form-control" id="status" rows="2"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" ></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-edit-transaksi', function () {
        let transaksi_id = $(this).data('id');
        $.ajax({
            url: `/transaksi/${transaksi_id}`,
            type: "GET",
            cache: false,
            success:function(response){


                $('#transaksi_id').val(response.data.id);
                $('#nama_customer_edit').val(response.data.nama_customer);
                $('#id_kendaraan_edit').val(response.data.id_kendaraan);
                $('#tgl_mulai_edit').val(response.data.tgl_mulai);
                $('#tgl_selesai_edit').val(response.data.tgl_selesai);
                $('#harga_edit').val(response.data.harga);
                $('#status_edit').val(response.data.status);


                $('#modal-edit').modal('show');
            }
        });
    });

    //action create post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let nama_customer   = $('#nama_customer_edit').val();
        let id_kendaraan= $('#id_kendaraan_edit').val();
        let tgl_mulai   = $('#tgl_mulai_edit').val();
        let tgl_selesai = $('#tgl_selesai_edit').val();
        let harga = $('#harga_edit').val();
        let status = $('#status_edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/transaksi/${transaksi_id}`,
            type: "PUT",
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

                //show success message
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

                
                $(`#index_${response.data.id}`).replaceWith(transaksi);

                
                $('#modal-edit').modal('hide');

            }

        });

    });

</script>