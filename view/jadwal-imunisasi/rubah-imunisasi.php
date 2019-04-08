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
          <label for="staticEmail" class="col-sm-2 col-form-label" >Jadwal Imunisasi</label>
          <div class="col-sm-10">
              <input class="form-control" type="date" placeholder="" name="jadwal_imunisasi" value="<?=$a->Jadwal_imunisasi; ?>">
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
  $jadwal_imunisasi = $obj->conn->real_escape_string($_POST['jadwal_imunisasi']);

  $saveImunisasi = $objAdmin->aksiRubahImunisasi($kode_imunisasi_lama,$kode_imunisasi, $jadwal_imunisasi);
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
