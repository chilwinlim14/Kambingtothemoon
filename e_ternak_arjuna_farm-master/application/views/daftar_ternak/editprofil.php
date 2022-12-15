<section class="section">

  <!-- Edit TERNAK -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Ternak</h5>

          <!-- Edit Ternak Form Elements -->
          <?= form_open('ternak/save', array('enctype' => 'multipart/form-data', 'id' => 'edit_ternak_master', 'class' => 'row g-3'), array('method' => 'edit','id_ternak'=>$data_ternak->id_ternak)) ?>

          <div class="form-group col-12">
            <label for="foto_ternak" class="form-label">Pilih Foto</label>
            <input class="form-control" type="file" id="foto_ternak" name="foto_ternak">
            <small class="help-block"></small>
          </div>

          <div class="form-group col-12">
            <label for="inputNomorTag" class="form-label">Nomor Tag</label>
            <input type="text" class="form-control" id="inputNomorTag" name="nomor_tag" value="<?= $data_ternak->nomor_tag; ?>">
            <small class="help-block"></small>
          </div>

          <div class="form-group col-12">
            <label for="InputInisial" class="form-label">Nama / Inisial</label>
            <input type="text" class="form-control" id="InputInisial" name="inisial" value="<?= $data_ternak->inisial; ?>">
            <small class="help-block"></small>

          </div>

          <div class="form-group col-12">
            <label for="inputJenisKelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
              <option value="betina">Betina</option>
              <option value="jantan">Jantan</option>
            </select>
            <small class="help-block"></small>
          </div>

          <div class="form-group col-12">
            <label for="inputTanggalLahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="inputTanggalLahir" name="tanggal_lahir" value="<?= $data_ternak->tanggal_lahir; ?>">
            <small class="help-block"></small>
          </div>

          <div class="form-group col-12">
            <input type="checkbox" id="estimasi" name="estimasi" value="1" checked>
            <label for="estimasi"> Estimasi</label><br>
            <small class="help-block"></small>
          </div>

          <div class="form-group col-12">
            <label for="inputRas" class="form-label">Ras</label>
            <input type="text" class="form-control" id="inputRas" name="ras" value="<?= $data_ternak->ras; ?>">
            <small class="help-block"></small>
          </div>

          <div class="form-group col-12">
            <label for="inputKandang" class="form-label">Kandang</label>
            <select name="id_kandang" class="select_box2" style="width: 100%!important" data-live-search="true">
              <option value="">Pilih Kandang</option>
              <?php foreach ($kandang as $row) : 
                  if($row->id_kandang == $data_ternak->id_kandang){
                ?>
                <option selected value="<?= $row->id_kandang ?>"><?= $row->nama_kandang ?> - Blok <?= $row->blok ?></option>
              <?php } else {?>

               <option selected value="<?= $row->id_kandang ?>"><?= $row->nama_kandang ?> - Blok <?= $row->blok ?></option>
               <?php }
                endforeach; ?>
            </select>
            <small class="help-block"></small>
          </div>

          <div class="form-group col-12">
            <label for="inputStatus" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="status">
            <?php foreach ($status as $row2){
              if($row2 == $data_ternak->status){ ?>
            <option selected value="<?= $row2 ?>"><?= $row2 ?></option>
           <?php   

            } else { ?>
                <option value="<?= $row2 ?>"><?= $row2 ?></option>
              <?php }} ?>
            </select>
            <small class="help-block"></small>
          </div>



          <div class="form-group col-12">
            <label for="inputBapakTernak" class="form-label">Bapak Ternak</label>
            <select name="bapak_ternak" class="select_box" style="width: 100%!important" data-live-search="true">
              <option value="">Pilih Bapak Ternak</option>
              <?php foreach($bapak_ternak as $row){ 
                if($row->id_ternak == $data_ternak->bapak_ternak){?>
                <option selected value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
          
               <?php } else {?>
                <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
          
                  <?php }} ?>
            </select>
            <small class="help-block"></small>
          </div>

          <div class="form-group col-12">
            <label for="inputIbuTernak" class="form-label">Ibu Ternak</label>
            <select name="ibu_ternak" class="select_box3" style="width: 100%!important" data-live-search="true">
              <option value="">Pilih Ibu Ternak</option>
              <?php foreach($ibu_ternak as $row){ 
                if($row->id_ternak == $data_ternak->ibu_ternak){?>
                <option selected value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
          
               <?php } else {?>
                <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
          
                  <?php }} ?>
            </select>
            <small class="help-block"></small>
          </div>

          <div class="form-group col-12">
            <label for="inputKeterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="inputKeterangan" name="keterangan"><?= $data_ternak->keterangan; ?></textarea>
            <small class="help-block"></small>
          </div>

          <div class="text-center">
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('ternak') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</section>