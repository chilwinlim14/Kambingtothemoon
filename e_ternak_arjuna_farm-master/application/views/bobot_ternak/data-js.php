<script type="text/javascript">
    var table;

    $(document).ready(function() {
        ajaxcsrf();

        table = $("#data_bobot_ternak").DataTable({
            initComplete: function() {
                var api = this.api();
                $("#data_bobot_ternak_filter input")
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
                        columns: [1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: "print",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: "excel",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6]
                    }
                }
            ],
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: base_url + "bobot_ternak/data/",
                type: "POST"
            },
            columns: [{
                    data: "id_bobot"
                },
                {
                    data: "tanggal_timbang"
                },
                {
                    data: "inisial"
                },
                {
                    data: "umur_timbang"
                },
                {
                    data: "bobot"
                },
                {
                    data: "id_bobot",
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
                targets: 5,
                data: "id",
                render: function(data, type, row, meta) {

                    return `<div class="text-center">
                                <a class="btn btn-sm btn-warning" href="${base_url}bobot_ternak/editBobot/${data}" title="edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger" onclick="hapus(${data})" title="hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>`;

                }
            }],
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
            .appendTo("#data_bobot_ternak_wrapper .col-md-6:eq(0)");
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
                $.getJSON(base_url + "bobot_ternak/delete/" + id, function(data) {
                    Swal({
                        title: data.status ? "Berhasil" : "Gagal",
                        text: data.status ?
                            "Data berhasil dihapus" : "Data gagal dihapus",
                        type: data.status ? "success" : "error"
                    });
                    reload_ajax();
                });
            }
        });
    }
</script>