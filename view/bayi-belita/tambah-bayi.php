<?php if (@$_SESSION['user']) { ?>

<div class="header-hal">
  <h1>Data Bayi Dan Belita</h1>
    <hr>
</div>

<div class="form">
    <form method="post" action="">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >Kode Bayi</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Kode bayi" name="kode_bayi">
        </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Nama Bayi</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Nama bayi" name="nama_bayi">
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Jenis Kelamin</label>
          <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1" name="jekel">
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Tempat Lahir</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Tempat lahir" name="tempat_lahir">
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Tanggal Lahir</label>
          <div class="col-sm-10">
              <input class="form-control" type="date" placeholder="" name="tl">
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Nama Ibu</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Nama ibu" name="nama_ibu">
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Umur Ibu</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Umur ibu" name="umur_ibu">
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Agama</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Agama" name="agama">
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >No Hp</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="No hp" name="no_hp">
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Alamat</label>
          <div class="col-sm-10">
              <input class="form-control" type="text" placeholder="Alamat" name="alamat">
          </div>
      </div>

      <button type="submit" class="btn btn-primary" name="simpanBayi">Simpan</button>

    </form>
</div>
<?php
if (isset($_POST['simpanBayi']))
{
  $kode_bayi = $obj->conn->real_escape_string($_POST['kode_bayi']);
  $nama_bayi = $obj->conn->real_escape_string($_POST['nama_bayi']);
  $jekel = $obj->conn->real_escape_string($_POST['jekel']);
  $tempat_lahir = $obj->conn->real_escape_string($_POST['tempat_lahir']);
  $tanggal_lahir = $obj->conn->real_escape_string($_POST['tl']);
  $nama_ibu = $obj->conn->real_escape_string($_POST['nama_ibu']);
  $umur_ibu = $obj->conn->real_escape_string($_POST['umur_ibu']);
  $agama = $obj->conn->real_escape_string($_POST['agama']);
  $no_hp = $obj->conn->real_escape_string($_POST['no_hp']);
  $alamat = $obj->conn->real_escape_string($_POST['alamat']);

  $simpanBayi = $objAdmin->simpanBayi($kode_bayi, $nama_bayi,$jekel,$tempat_lahir,$tanggal_lahir,$nama_ibu,$umur_ibu,$agama,$no_hp,$alamat);
  if ($simpanBayi) {
      echo "<script>
      swal(
        'Save Bayi Success!',
        'You clicked the button!',
        'success'
      ).then(function() {
          window.location = '?view=bayi';
      });
      </script>";
  }else{
    echo "<script>
    swal({
          title: 'Error Save Bayi!',
          text: 'Do you want to continue',
          type: 'error'
        })
    </script>";
  }
}


?>

<?php } ?>
