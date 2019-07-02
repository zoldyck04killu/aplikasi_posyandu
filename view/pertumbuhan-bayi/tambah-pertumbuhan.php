<?php if (@$_SESSION['user']) { ?>

<div class="header-hal">
  <h1>Data Pertumbuhan</h1>
    <hr>
</div>

<div class="form">
    <form method="post" action="">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >No Pemeriksaan</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="No Pemeriksaan" name="no_pemeriksaan">
        </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Tanggal Pemeriksaan</label>
          <div class="col-sm-10">
              <input class="form-control" type="date" name="tgl_pemeriksaan">
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Nip Petugas</label>
          <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1" name="nip_petugas" >
                <?php
               $data = $objAdmin->showPetugas();
               while ($a = $data->fetch_object()) {
                   ?>
                <option value="<?= $a->Nip_petugas ?>"><?= $a->Nip_petugas ?></option>
                <?php
                }
                ?>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Kode Jadwal Imunisasi</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Kode Jadwal Imunisasi" name="kode_jadwal">
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Kode Vaksin</label>
          <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1" name="kode_vaksin" >
                <?php
               $data = $objAdmin->showVaksin();
               $no = 1;
               while ($a = $data->fetch_object()) {
                   ?>
                <option value="<?= $a->Kode_vaksin; ?>"><?= $a->Kode_vaksin; ?></option>
                <?php
                }
                ?>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Kode Bayi</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Kode Bayi" name="kode_bayi">
          </div>
      </div>
      <!-- <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Umur Bayi</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="umur Bayi" name="umur_bayi" >
          </div>
      </div> -->
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Berat Badan</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Berat Badan" name="berat_badan" >
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Lingkar Kepala</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Lingkar Kepala" name="lingkar_kepala" >
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Tinggi Badan</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Tinggi Badan" name="tinggi_badan" >
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Keterangan Gizi</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Keterangan Gizi" name="keterangan_gizi" >
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Keterangan</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Keterangan" name="keterangan">
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Keluhan</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Keluhan" name="keluhan" >
          </div>
      </div>



      <button type="submit" class="btn btn-primary" name="simpanPertumbuhan">Simpan</button>

    </form>
</div>
<?php
if (isset($_POST['simpanPertumbuhan']))
{
  $no_pemeriksaan = $obj->conn->real_escape_string($_POST['no_pemeriksaan']);
  $tgl_pemeriksaan = $obj->conn->real_escape_string($_POST['tgl_pemeriksaan']);
  $nip_petugas = $obj->conn->real_escape_string($_POST['nip_petugas']);
  $kode_jadwal = $obj->conn->real_escape_string($_POST['kode_jadwal']);
  $kode_vaksin = $obj->conn->real_escape_string($_POST['kode_vaksin']);
  $kode_bayi = $obj->conn->real_escape_string($_POST['kode_bayi']);
  // $umur_bayi = $obj->conn->real_escape_string($_POST['umur_bayi']);

  $keterangan = $obj->conn->real_escape_string($_POST['keterangan']);
  $keluhan = $obj->conn->real_escape_string($_POST['keluhan']);
  $berat_badan = $obj->conn->real_escape_string($_POST['berat_badan']);
  $lingkar_kepala = $obj->conn->real_escape_string($_POST['lingkar_kepala']);
  $tinggi_badan = $obj->conn->real_escape_string($_POST['tinggi_badan']);
  $keterangan_gizi = $obj->conn->real_escape_string($_POST['keterangan_gizi']);

  $simpanPertumbuhan = $objAdmin->simpanPertumbuhan($no_pemeriksaan, $tgl_pemeriksaan,$nip_petugas,$kode_jadwal,$kode_vaksin,$kode_bayi,$keterangan,$keluhan,$berat_badan,$lingkar_kepala,$tinggi_badan,$keterangan_gizi);
  if ($simpanPertumbuhan) {
      echo "<script>
      swal(
        'Save Pertumbuhan Bayi Success!',
        'You clicked the button!',
        'success'
      ).then(function() {
          window.location = '?view=pertumbuhan';
      });
      </script>";
  }else{
    echo "<script>
    swal({
          title: 'Error Save Pertumbuhan Bayi!',
          text: 'Do you want to continue',
          type: 'error'
        })
    </script>";
  }
}


?>


<?php } ?>
