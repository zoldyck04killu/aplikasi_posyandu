<div class="header-hal">
    <h1>Menu Utama Aplikasi</h1>
    <hr>
</div>


<?php
if (isset($_POST['saveBukuTamu'])) {
  if (isset($_POST['no_anggota'])) {
    $no_anggota = $obj->conn->real_escape_string($_POST['no_anggota']);
    $data = $objPengunjung->showAnggota($no_anggota);
    $data_anggota = $data->fetch_object();

    $nama = $data_anggota->nama_anggota;
    $kategori = $data_anggota->kategory;
    $nrp = $data_anggota->id_anggota;
    $status = $data_anggota->status;
    $jekel = $data_anggota->jenkel;
    $asal_pengunjung = $obj->conn->real_escape_string($_POST['asal_pengunjung']);
    $aktivitas = $obj->conn->real_escape_string($_POST['aktivitas']);
    // var_dump($data_anggota);
    // die();
    $save = $objPengunjung->saveBukuTamu($status, $kategori, $nrp, $nama, $jekel, $asal_pengunjung, $aktivitas);

  }elseif (isset($_POST['nama'])) {
    $kategori = $obj->conn->real_escape_string($_POST['kategori']);
    $nama = $obj->conn->real_escape_string($_POST['nama']);
    $nrp = $obj->conn->real_escape_string($_POST['nrp']);
    $status = $obj->conn->real_escape_string($_POST['status']);
    $jekel = $obj->conn->real_escape_string($_POST['jekel']);
    $asal_pengunjung = $obj->conn->real_escape_string($_POST['asal_pengunjung']);
    $aktivitas = $obj->conn->real_escape_string($_POST['aktivitas']);


    $save = $objPengunjung->saveBukuTamu($status, $kategori, $nrp, $nama, $jekel, $asal_pengunjung, $aktivitas);
  }
    if (!$save) {
      echo '<script>
      swal({
          title: "Alert",
          text: "Data berhasil disave",
          type: "success"
      }).then(function() {
          window.location = "?view=home";
      });
</script>';
    }else {
      echo "<script>
      swal({
            title: 'Error Save!',
            text: 'Do you want to continue',
            type: 'error'
          })
      </script>";
    }
}


?>
