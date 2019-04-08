<?php if (@$_SESSION['user']) { ?>

<div class="header-hal">
    <h1>  Petugas</h1>
    <hr>
</div>

<div class="form">
    <form method="post" action="">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >Nip Petugas</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Nip" name="nip">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >Nama Petugas</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Nama" name="nama">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >Jabatan</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Jabatan" name="jabatan">
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
            <input class="form-control" type="text" placeholder="Tempat Lahir" name="tempat_lahir">
        </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label" >Tanggal Lahir</label>
          <div class="col-sm-10">
              <input class="form-control" type="date" placeholder="" name="tl">
          </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >No Handphone</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="No Handphone" name="no_handphone">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" >Alamat</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Alamat" name="alamat">
        </div>
      </div>

      <button type="submit" class="btn btn-primary" name="savePetugas">Simpan</button>

    </form>
</div>
<?php
if (isset($_POST['savePetugas']))
{
  $nip = $obj->conn->real_escape_string($_POST['nip']);
  $nama = $obj->conn->real_escape_string($_POST['nama']);
  $jabatan = $obj->conn->real_escape_string($_POST['jabatan']);
  $jekel = $obj->conn->real_escape_string($_POST['jekel']);
  $tempat_lahir = $obj->conn->real_escape_string($_POST['tempat_lahir']);
  $tl = $obj->conn->real_escape_string($_POST['tl']);
  $no_handphone = $obj->conn->real_escape_string($_POST['no_handphone']);
  $alamat = $obj->conn->real_escape_string($_POST['alamat']);


  $savePetugas = $objAdmin->savePetugas($nip, $nama, $jabatan, $jekel, $tempat_lahir, $tl, $no_handphone,$alamat);
  if ($savePetugas) {
      echo "<script>
      swal(
        'Save Petugas Success!',
        'You clicked the button!',
        'success'
      ).then(function() {
          window.location = '?view=petugas';
      });
      </script>";
  }else{
    echo "<script>
    swal({
          title: 'Error Save Petugas!',
          text: 'Do you want to continue',
          type: 'error'
        })
    </script>";
  }
}


?>

<?php } ?>
