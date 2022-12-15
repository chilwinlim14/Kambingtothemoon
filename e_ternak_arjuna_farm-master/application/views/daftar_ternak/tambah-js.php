<script>
    $(document).ready(function() {
        $('#tambah_ternak_master').on('submit', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var btn = $('#submit');

            btn.attr('disabled', 'disabled').text('Wait...');

            var formdata = new FormData($('#tambah_ternak_master')[0]);

            $.ajax({
                url: $(this).attr('action'),
                // data: $(this).serialize(),
                data: formdata,
                type: 'POST',
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    btn.removeAttr('disabled').text('Simpan');
                    if (response.status) {
                        Swal('Sukses', 'Data Berhasil disimpan', 'success')
                            .then((result) => {
                                if (result.value) {
                                    window.location.href = base_url + 'ternak';
                                }
                            });
                    } else {
                        if (response.errors) {
                            $.each(response.errors, function(key, val) {
                                $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                                $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(val);
                                if (val === '') {
                                    $('[name="' + key + '"]').closest('.form-group').removeClass('has-error').addClass('has-success');
                                    $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                                }
                            });
                        }
                        if (response.msg) {
                            Swal({
                                "title": "Gagal",
                                "text": response.msg,
                                "type": "error"
                            });
                        }
                    }
                }
            })
        });

        $('#tambah_ternak_master input, #tambah_ternak_master select').on('change', function() {
            $(this).closest('.form-group').removeClass('has-error has-success');
            $(this).nextAll('.help-block').eq(0).text('');
        });
    });
</script>