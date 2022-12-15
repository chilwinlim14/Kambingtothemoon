<script>
    $(document).ready(function() {
        $('#edit_foto_ternak').on('submit', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var btn = $('#submit');

            btn.attr('disabled', 'disabled').text('Wait...');

            var formdata = new FormData($('#edit_foto_ternak')[0]);

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
                    btn.removeAttr('disabled').text('update');
                    if (response.status) {
                        Swal('Sukses', 'Data Berhasil diupdate', 'success')
                            .then((result) => {
                                if (result.value) {
                                    window.location.href = base_url + 'ternak/profil/' + response.nomor_tag;
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

        $('#edit_foto_ternak input, #edit_foto_ternak select').on('change', function() {
            $(this).closest('.form-group').removeClass('has-error has-success');
            $(this).nextAll('.help-block').eq(0).text('');
        });
    });
</script>