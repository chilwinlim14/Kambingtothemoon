<script type="text/javascript">
    var table;

    $(document).ready(function() {
        ajaxcsrf();

        table = $("#penjualan").DataTable({
            initComplete: function() {
                var api = this.api();
                $("#treatment_filter input")
                    .off(".DT")
                    .on("keyup.DT", function(e) {
                        api.search(this.value).draw();
                    });
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    extend: "copy",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: "print",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: "excel",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                }
            ],
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: base_url + "penjualan/data/",
                type: "POST"
            },
            columns: [{
                    data: "id_penjualan",
                },
                {
                    data: "tanggal"
                },
                {
                    data: "inisial"
                },
                {
                    data: "harga"
                },
                {
                    data: "nama"
                },
                {
                    data: "deposit"
                },
                {
                    data: "utang"
                },
                {
                    data: "status"
                },
                {
                    data: "id_penjualan",
                    orderable: false,
                    searchable: false
                },
            ],
            columnDefs: [
                {
                    targets: 2,
                    data: "id",
                    render: function(data, type, row, meta) {
                            return `
                                <a class="" href="${base_url}ternak/profil/${data}">
                                    ${data}
                                </a>
                          `;
                        }
                },
                {
                    targets: 8,
                    data: "id",
                    render: function(data, type, row, meta) {

                            return `<div class="text-center">
                                <a class="btn btn-sm btn-warning" href="${base_url}penjualan/editPenjualan/${data}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger" onclick="hapus(${data})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>`;
                        }
                }
            ],
            order: [
                [0, "asc"]
            ],
            rowId: function(a) {
                return a;
            },
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $("td:eq(0)", row).html(index);
            }
        });

        table
            .buttons()
            .container()
            .appendTo("#users_wrapper .col-md-6:eq(0)");

    });

    function hapus(id) {
        Swal({
            title: "Anda yakin?",
            text: "Data akan dihapus.",
            type: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $.getJSON(base_url + "penjualan/delete/" + id, function(data) {
                    Swal({
                        title: data.status ? "Berhasil" : "Gagal",
                        text: data.status ?
                            "User berhasil dihapus" : "User gagal dihapus",
                        type: data.status ? "success" : "error"
                    });
                    reload_ajax();
                });
            }
        });
    }
</script>