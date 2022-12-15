<section class="section">
        <div class="row">
            <div class="col-lg-12">
        <!-- Pengaturan Siklus Birahi -->
              <div class="card">
                <div class="card-body">

                  <!-- Pengaturan Siklus Birahi Form Elements -->
                  <!-- <form class="row g-3"> -->
                    <h5 class="card-title">Pengaturan Interval Siklus Birahi</h5>
                    <?= form_open('siklus_birahi/pengaturan_save', array('id' => 'pengaturan_birahi', 'class' => 'row g-3'), array('method' => 'edit', 'id' => $siklus_birahi->id)) ?>
              
                    <div class="col-12">
                      <label for="inputProestrus" class="form-label">Proestrus (Hari)</label>
                      <input type="number" class="form-control" name="inputProestrus" value="<?= $siklus_birahi->proestrus; ?>">
                    </div>

                    <div class="col-12">
                        <label for="inputEstrus" class="form-label">Estrus (Hari)</label>
                        <input type="number" class="form-control" name="inputEstrus" value="<?= $siklus_birahi->estrus; ?>">
                      </div>

                    <div class="col-12">
                      <label for="inputDiestrus" class="form-label">Diestrus (Hari)</label>
                      <input type="number" class="form-control" name="inputDiestrus" value="<?= $siklus_birahi->diestrus; ?>">
                    </div>

                    <div class="col-12">
                        <label for="inputAnestrus" class="form-label">Anestrus (Hari)</label>
                        <input type="number" class="form-control" name="inputAnestrus" value="<?= $siklus_birahi->anestrus; ?>">
                    </div>

                    <div class="text-center">
                    <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url("siklus_birahi")?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
                  </div>
                
                <?= form_close();?>
            </div>
          </div>
        </div>
      </div>      
    </section>