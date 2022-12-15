<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 300px;
       }
    </style>
<?php if( $this->ion_auth->is_admin() ) : ?>
<div class="row">
    <?php foreach($info_box as $info) : ?>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-<?=$info->box?>">
        <div class="inner">
            <h3><?=$info->total;?></h3>
            <p><?=$info->title;?></p>
        </div>
        <div class="icon">
            <i class="fa fa-<?=$info->icon?>"></i>
        </div>
        <a href="<?=base_url().strtolower($info->title);?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php elseif( $this->ion_auth->in_group('dosen') ) : ?>

<div class="row">
    
    <?php foreach($info_box as $info) : ?>
    <div class="col-lg-2 col-sm-2 col-xs-4">
        <div class="small-box bg-<?=$info->box?>">
        <div class="inner">
            <h3><?=$info->total;?></h3>
            <p><?=$info->title;?></p>
        </div>
        <div class="icon">
            <i class="fa fa-<?=$info->icon?>"></i>
        </div>
        <a href="<?=base_url().strtolower($info->title);?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="row">
<div class="col-sm-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Informasi Akun</h3>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>Nama</th>
                    <td><?=$dosen->nama_dosen?></td>
                </tr>
                <tr>
                    <th>NPSN</th>
                    <td><?=$dosen->nip?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?=$dosen->email?></td>
                </tr>
                <tr>
                    <th>Sekolah</th>
                    <td><?=$sekolah->nama?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?=$sekolah->alamat?>
                    </td>
                </tr>
                <tr>
                    <th>Titik Koordinat</th>
                    <td><a href="https://www.google.com/maps/@<?=$sekolah->lt?>,<?=$sekolah->lng?>,19z" target="_blank"><?=$sekolah->lt?>  <?=$sekolah->lng?></a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="col-sm-4" id="map">

</div>
<?php else : ?>

<div class="row">
    <div class="col-sm-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Informasi Akun</h3>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>NIM</th>
                    <td><?=$mahasiswa->nim?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?=$mahasiswa->nama?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?=$mahasiswa->jenis_kelamin === 'L' ? "Laki-laki" : "Perempuan" ;?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?=$mahasiswa->email?></td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <td><?=$mahasiswa->nama_jurusan?></td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td><?=$mahasiswa->nama_kelas?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="box box-solid">
            <div class="box-header bg-purple">
                <h3 class="box-title">Pemberitahuan</h3>
            </div>
            <div class="box-body">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem in animi quibusdam nihil esse ratione, nulla sint enim natus, aut mollitia quas veniam, tempore quia!</p>
                <ul class="pl-4">
                    <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur, culpa.</li>
                    <li>Provident dolores doloribus, fugit aperiam alias tempora saepe non omnis.</li>
                    <li>Doloribus sed eum et repellat distinctio a repudiandae quia voluptates.</li>
                    <li>Adipisci hic rerum illum odit possimus voluptatibus ad aliquid consequatur.</li>
                    <li>Laudantium sapiente architecto excepturi beatae est minus, labore non libero.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php endif; 
?>
<script>
// Initialize and add the map
var map;
function haversine_distance(mk1, mk2) {
      var R = 3958.8; // Radius of the Earth in miles
      var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
      var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
      var difflat = rlat2-rlat1; // Radian difference (latitudes)
      var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)

      var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
      return d;
    }

function initMap() {
  const dakota = {lat:  <?=$sekolah->lt?>, lng: <?=$sekolah->lng?>};
  const center = {lat:  <?=$sekolah->lt?>, lng: <?=$sekolah->lng?>};
  const options = {zoom: 19, scaleControl: true, center: center};
  map = new google.maps.Map(
      document.getElementById('map'), options);
  var mk1 = new google.maps.Marker({position: dakota, map: map});


}
    </script>
    <!--Load the API from the specified URL -- remember to replace YOUR_API_KEY-->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy_lZc0g8Y34aJSrSgHQ448KfaXoRVuco&callback=initMap">
    </script>
