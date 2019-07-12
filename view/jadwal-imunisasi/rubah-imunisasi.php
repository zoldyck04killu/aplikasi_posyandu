<?php if (@$_SESSION['user']) { ?>

<?php
$id = $_GET['kode'];
$data = $objAdmin->rubahImunisasi($id);
$a = $data->fetch_object();
 ?>
<div class="header-hal">
    <h1>Data Jadwal Imunisasi</h1>
    <hr>
</div>

<div class="form">
    <form method="post" action="">
        <input type="hidden" name="kode_imunisasi_lama" value="<?=$a->Kode_imunisasi; ?>">

      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >Kode Imunisasi</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Kode imunisasi" name="kode_imunisasi" value="<?=$a->Kode_imunisasi; ?>">
        </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Umur Imunisasi</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="" name="umur" value="<?=$a->Umur; ?>">
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Vaksin</label>
          <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1" name="vaksin" >
                <?php
               $data = $objAdmin->showVaksin();
               while ($a = $data->fetch_object()) {
                   ?>
                <option value="<?= $a->Kode_vaksin ?>"><?= $a->Nama_vaksin ?></option>
                <?php
                }
                ?>
              </select>
          </div>
      </div>
      <button type="submit" class="btn btn-primary" name="simpanImunisasi">Simpan</button>

    </form>
</div>
<?php
if (isset($_POST['simpanImunisasi']))
{
  $kode_imunisasi_lama = $obj->conn->real_escape_string($_POST['kode_imunisasi_lama']);

  $kode_imunisasi = $obj->conn->real_escape_string($_POST['kode_imunisasi']);
  $umur = $obj->conn->real_escape_string($_POST['umur']);
  $vaksin = $obj->conn->real_escape_string($_POST['vaksin']);


  $saveImunisasi = $objAdmin->aksiRubahImunisasi($kode_imunisasi_lama,$kode_imunisasi, $umur, $vaksin);
  if ($saveImunisasi) {
      echo "<script>
      swal(
        'Update Imunisasi Success!',
        'You clicked the button!',
        'success'
      ).then(function() {
          window.location = '?view=jadwal-imunisasi';
      });
      </script>";
  }else{
    echo "<script>
    swal({
          title: 'Error Update Imunisasi!',
          text: 'Do you want to continue',
          type: 'error'
        })
    </script>";
  }
}


?>

<?php } ?>
