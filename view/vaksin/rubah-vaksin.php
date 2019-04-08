<?php if (@$_SESSION['user']) { ?>

<?php
$id = $_GET['kode'];
$data = $objAdmin->rubahVaksin($id);
$a = $data->fetch_object();
 ?>
<div class="header-hal">
    <h1>  Vaksin</h1>
    <hr>
</div>

<div class="form">
    <form method="post" action="">
        <input type="hidden" name="kode_vaksin_lama" value="<?=$a->Kode_vaksin; ?>">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >Kode Vaksin</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Kode vaksin" name="kode_vaksin" value="<?=$a->Kode_vaksin; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >Nama Vaksin</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Nama vaksin" name="nama_vaksin" value="<?=$a->Nama_vaksin; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >Dosis</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Dosis" name="dosis" value="<?=$a->Dosis; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >Keterangan Vaksin</label>
        <div class="col-sm-10">
            <textarea class="form-control" placeholder="Keterangan vaksin"  name="keterangan" rows="8" cols="80" ><?=$a->Keterangan_vaksin; ?></textarea>
        </div>
      </div>

      <button type="submit" class="btn btn-primary" name="simpanVaksin">Simpan</button>

    </form>
</div>
<?php
if (isset($_POST['simpanVaksin']))
{
  $kode_vaksin_lama = $obj->conn->real_escape_string($_POST['kode_vaksin_lama']);

  $kode_vaksin = $obj->conn->real_escape_string($_POST['kode_vaksin']);
  $nama_vaksin = $obj->conn->real_escape_string($_POST['nama_vaksin']);
  $dosis = $obj->conn->real_escape_string($_POST['dosis']);
  $keterangan = $obj->conn->real_escape_string($_POST['keterangan']);

  $savePetugas = $objAdmin->aksiRubahVaksin($kode_vaksin_lama,$kode_vaksin, $nama_vaksin, $dosis, $keterangan);
  if ($savePetugas) {
      echo "<script>
      swal(
        'Update Vaksin Success!',
        'You clicked the button!',
        'success'
      ).then(function() {
          window.location = '?view=vaksin';
      });
      </script>";
  }else{
    echo "<script>
    swal({
          title: 'Error Update Vaksin!',
          text: 'Do you want to continue',
          type: 'error'
        })
    </script>";
  }
}


?>

<?php } ?>
