<script>
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
        $.getJSON(base_url + "ternak/delete_foto_ternak/" + id, function(data) {
          Swal({
              title: data.status ? "Berhasil" : "Gagal",
              text: data.status ?
                "User berhasil dihapus" : "User gagal dihapus",
              type: data.status ? "success" : "error"
            })
            .then((result) => {
              if (result.value) {
                window.location.reload();
              }
            });
        });
      }
    });
  }
</script>