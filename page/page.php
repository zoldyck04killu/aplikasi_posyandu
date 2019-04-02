<?php

if (@$_GET['view'] == '' || @$_GET['view'] == 'home')
{
    include 'view/home.php';
}
elseif (@$_GET['view'] == 'petugas')
{
    include 'view/petugas/petugas.php';
}
elseif (@$_GET['view'] == 'tambah-petugas')
{
    include 'view/petugas/tambah-petugas.php';
}
elseif (@$_GET['view'] == 'rubah-petugas')
{
    include 'view/petugas/rubah-petugas.php';
}
elseif (@$_GET['view'] == 'hapus-petugas')
{
    $id = $_GET['nip'];
    $objAdmin->hapusPetugas($id);
    echo '<script>
    swal({
        title: "Alert",
        text: "Data berhasil dihapus",
        type: "success"
    }).then(function() {
        window.location = "?view=petugas";
    });
  </script>';
}
elseif (@$_GET['view'] == 'vaksin')
{
    include 'view/vaksin/vaksin.php';
}
elseif (@$_GET['view'] == 'tambah-vaksin')
{
    include 'view/vaksin/tambah-vaksin.php';
}
elseif (@$_GET['view'] == 'rubah-vaksin')
{
    include 'view/vaksin/rubah-vaksin.php';
}
elseif (@$_GET['view'] == 'hapus-vaksin')
{
    $id = $_GET['kode'];
    $objAdmin->hapusVaksin($id);
    echo '<script>
    swal({
        title: "Alert",
        text: "Data berhasil dihapus",
        type: "success"
    }).then(function() {
        window.location = "?view=vaksin";
    });
  </script>';
}
elseif (@$_GET['view'] == 'jadwal-imunisasi')
{
    include 'view/jadwal-imunisasi/jadwal-imunisasi.php';
}
elseif (@$_GET['view'] == 'bayi')
{
    include 'view/bayi-belita/bayi.php';
}
elseif (@$_GET['view'] == 'pertumbuhan')
{
    include 'view/pertumbuhan.php';
}
// ==============================================================
elseif (@$_GET['view'] == 'login-admin')
{
    include 'view/login.php';
}
elseif (@$_GET['view'] == 'logout-admin')
{
    $objAdmin->logout();
    echo '<script>
    window.location="?view=login-admin";
     </script>';
}
elseif (@$_GET['view'] == 'hapus')
{
    $id = $_GET['id'];
    $objAdmin->hapus($id);
    echo '<script>
    swal({
        title: "Alert",
        text: "Data berhasil dihapus",
        type: "success"
    }).then(function() {
        window.location = "?view=data-anggota";
    });
  </script>';
}
else
{
  include 'view/404.php';

}