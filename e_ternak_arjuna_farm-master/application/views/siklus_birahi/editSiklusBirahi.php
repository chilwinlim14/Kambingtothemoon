<section class="section">
        <div class="row">
            <div class="col-lg-12">
        <!-- Pengaturan Siklus Birahi -->
              <div class="card">
                <div class="card-body">

                  <!-- Pengaturan Siklus Birahi Form Elements -->
                  <form class="row g-3">
                    <h5 class="card-title">Edit Interval Siklus Birahi</h5>
                    <div class="col-12">
                      <label for="inputProestrus" class="form-label">Proestrus (Hari)</label>
                      <input type="number" class="form-control" id="inputProestrus">
                    </div>

                    <div class="col-12">
                        <label for="inputEstrus" class="form-label">Estrus (Hari)</label>
                        <input type="number" class="form-control" id="inputEstrus">
                      </div>

                    <div class="col-12">
                      <label for="inputDiestrus" class="form-label">Diestrus (Hari)</label>
                      <input type="number" class="form-control" id="inputDiestrus">
                    </div>

                    <div class="col-12">
                        <label for="inputAnestrus" class="form-label">Anestrus (Hari)</label>
                        <input type="number" class="form-control" id="inputAnestrus">
                    </div>
                    <div class="text-center">
                      <a href="<?= base_url('siklus_birahi') ?>"><button type="button" class="btn btn-primary">Simpan</button></a>
                      <a href="<?= base_url('siklus_birahi') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                    </div>
                  </form><!-- Tambah Treatment Ternak Form Elements -->
            </div>
          </div>
        </div>
      </div>      
    </section>