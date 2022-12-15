<section class="section profile">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body pt-3">
              <div class="tab-content pt-2">
        <div class="tab-pane fade show active profile-edit" id="profile-edit">
                  <!-- Profile Edit Form -->
                  <?= form_open('treatment_ternak/save', array('enctype' => 'multipart/form-data', 'id' => 'edit_treatment_ternak', 'class' => 'row g-3'), array('method' => 'edit','id_treatment_ternak'=>$data_treatment_ternak->id_treatment_ternak)) ?>
                            <!-- <form class="row g-3"> -->
                            <div class="form-group">
                            <label for="inputTanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="inputTanggal" name="tanggal" required value="<?= $data_treatment_ternak->tanggal; ?>" >
                            <small class="help-block"></small>
                            </div>

                            <div class="form-group">
                                <label for="id_treatment">Treatment</label>
                                <select name="id_treatment" class="select_box" style="width: 100%!important" data-live-search="true">
                                <?php foreach ($data_treatment as $row){  
                                  if($row->id_treatment == $data_treatment_ternak->id_treatment){?>
                                  <option selected value="<?= $row->id_treatment ?>"><?= $row->nama_treatment ?></option>
                                <?php } else {
                                  ?>
                                  <option value="<?= $row->id_treatment ?>"><?= $row->nama_treatment ?></option>
                                <?php }} ?>
                                </select>
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="id_ternak">Nomor Tag</label>
                                <select name="id_ternak" class="select_box2" style="width: 100%!important" data-live-search="true">
                                <?php foreach ($data_ternak as $row){  
                                  if($row->id_ternak == $data_treatment_ternak->id_ternak){?>
                                      <option selected value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                                <?php } else {
                                    ?>
                                      <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                                <?php }} ?>
                                </select>
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group col-12">
                              <label for="inputStatus" class="form-label">Status</label>
                              <select class="form-select" aria-label="Default select example" name="status_treatment">
                              <?php foreach ($status as $row2){
                                if($row2 == $data_treatment_ternak->status_treatment){ ?>
                              <option selected value="<?= $row2 ?>"><?= $row2 ?></option>
                            <?php   

                              } else { ?>
                                  <option value="<?= $row2 ?>"><?= $row2 ?></option>
                                <?php }} ?>
                              </select>
                              <small class="help-block"></small>
                            </div>
                                                        
                            <div class="text-center">
                                <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('treatment_ternak') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                            </div>
                            <?= form_close(); ?>
                  <!-- End Profile Edit Form -->
  </div>
</div>
</div>
<!-- End Bordered Tabs -->

                  
            </div>
          </div>

        </div>
      </div>

</section>