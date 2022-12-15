<script type="text/javascript">
    $(document).ready(function() {
        $('#edit_diet_ternak').on('submit', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var btn = $('#submit');

            btn.attr('disabled', 'disabled').text('Wait...');

            $.ajax({
                url: $(this).attr('action'),
                data: $(this).serialize(),
                type: 'POST',
                success: function(response) {
                    btn.removeAttr('disabled').text('Simpan');
                    if (response.status) {
                        Swal('Sukses', 'Data Berhasil diedit', 'success')
                            .then((result) => {
                                if (result.value) {
                                    window.location.href = base_url + 'diet_ternak';
                                }
                            });
                    } else {
                        $.each(response.errors, function(key, val) {
                            $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(val);
                            if (val === '') {
                                $('[name="' + key + '"]').closest('.form-group').removeClass('has-error').addClass('has-success');
                                $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                            }
                        });
                    }
                }
            })
        });

        $('#edit_diet_ternak input, #edit_diet_ternak select').on('change', function() {
            $(this).closest('.form-group').removeClass('has-error has-success');
            $(this).nextAll('.help-block').eq(0).text('');
        });
    });

    $(function() {
        $('#datetimepicker3').datetimepicker({
            format: 'HH:mm'
        });
    });
</script>