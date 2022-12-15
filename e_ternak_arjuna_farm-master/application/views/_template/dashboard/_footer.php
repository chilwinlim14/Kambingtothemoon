</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>E-TERNAK</span></strong>. All Rights Reserved
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets2/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets2/vendor/chart.js/chart.min.js"></script>
<script src="<?= base_url() ?>assets2/vendor/echarts/echarts.min.js"></script>
<script src="<?= base_url() ?>assets2/vendor/quill/quill.min.js"></script>
<script src="<?= base_url() ?>assets2/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= base_url() ?>assets2/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= base_url() ?>assets2/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets2/js/main.js"></script>


<!-- Required JS -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Datatables Buttons -->
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/plugins/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/plugins/Buttons-1.5.6/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/plugins/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/plugins/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/plugins/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/plugins/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/plugins/Buttons-1.5.6/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/plugins/Buttons-1.5.6/js/buttons.colVis.min.js"></script>

<script src="<?= base_url() ?>assets/bower_components/pace/pace.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

<!-- Textarea editor -->
<script src="<?= base_url() ?>assets/bower_components/codemirror/lib/codemirror.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/codemirror/mode/xml.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/froala_editor/js/froala_editor.pkgd.min.js"></script>

<script src="<?= base_url() ?>assets/dselect/js/dselect.js"></script>


<!-- Tiny MCE -->
<?php echo
'<script>
      tinymce.init({
        selector: "#editor",
        plugins: [
                    "advlist autolink link image lists charmap preview print hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen media nonbreaking",
                    "save table contextmenu directionality emoticons paste textcolor responsivefilemanager",
                ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link unlink | image media",
        external_filemanager_path: "' . base_url() . 'filemanager/",
                filemanager_title: "File Manajemen Halaman",
                external_plugins: {
                    "filemanager" : "' . base_url('filemanager/plugin.min.js') . '"
                },
                filemanager_access_key:"myBramantoKey"
      });
    </script>'; ?>

<!-- Custom JS -->
<script type="text/javascript">

    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };

    function ajaxcsrf() {
        var csrfname = '<?= $this->security->get_csrf_token_name() ?>';
        var csrfhash = '<?= $this->security->get_csrf_hash() ?>';
        var csrf = {};
        csrf[csrfname] = csrfhash;
        $.ajaxSetup({
            "data": csrf
        });
    }

    function reload_ajax() {
        table.ajax.reload(null, false);
    }
</script>

<script>

    var select_box_element = document.querySelector('.select_box');
    var select_box2 = document.querySelector('.select_box2');
    var select_box3 = document.querySelector('.select_box3');

    dselect(select_box_element, {
        search: true
    });
    dselect(select_box2, {
        search: true
    });
    dselect(select_box3, {
        search: true
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
    $('#cari_ternak').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        var key = $('#key').val();
        // alert(key);
        $.getJSON(base_url + "ternak/cari/" + key, function(data) {
                    // alert(data.nomor_tag);
                    if (data.status) {
                        window.location.href = base_url + 'ternak/profil/' + data.nomor_tag;
                    } else {
                        Swal('Tidak Ditemukan', 'Data tidak ditemukan', 'error')
                        $('#cari_ternak').trigger("reset");
                    }
                    // Swal({
                    //     title: data.status ? "Berhasil" : "Gagal",
                    //     text: data.status ?
                    //         "User berhasil dihapus" : "User gagal dihapus",
                    //     type: data.status ? "success" : "error"
                    // });
                    // reload_ajax();
                });
    });
});
</script>

</body>

</html>