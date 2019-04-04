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
elseif (@$_GET['view'] == 'tambah-imunisasi')
{
    include 'view/jadwal-imunisasi/tambah-imunisasi.php';
}
elseif (@$_GET['view'] == 'rubah-imunisasi')
{
    include 'view/jadwal-imunisasi/rubah-imunisasi.php';
}
elseif (@$_GET['view'] == 'hapus-imunisasi')
{
    $id = $_GET['kode'];
    $objAdmin->hapusImunisasi($id);
    echo '<script>
    swal({
        title: "Alert",
        text: "Data berhasil dihapus",
        type: "success"
    }).then(function() {
        window.location = "?view=jadwal-imunisasi";
    });
  </script>';
}
elseif (@$_GET['view'] == 'bayi')
{
    include 'view/bayi-belita/bayi.php';
}
elseif (@$_GET['view'] == 'tambah-bayi')
{
    include 'view/bayi-belita/tambah-bayi.php';
}
elseif (@$_GET['view'] == 'rubah-bayi')
{
    include 'view/bayi-belita/rubah-bayi.php';
}
elseif (@$_GET['view'] == 'hapus-bayi')
{
    $id = $_GET['kode'];
    $objAdmin->hapusBayi($id);
    echo '<script>
    swal({
        title: "Alert",
        text: "Data berhasil dihapus",
        type: "success"
    }).then(function() {
        window.location = "?view=bayi";
    });
  </script>';
}
elseif (@$_GET['view'] == 'pertumbuhan')
{
    include 'view/pertumbuhan-bayi/pertumbuhan.php';
}
elseif (@$_GET['view'] == 'tambah-pertumbuhan')
{
    include 'view/pertumbuhan-bayi/tambah-pertumbuhan.php';
}
elseif (@$_GET['view'] == 'rubah-pertumbuhan')
{
    include 'view/pertumbuhan-bayi/rubah-pertumbuhan.php';
}
elseif (@$_GET['view'] == 'hapus-pertumbuhan')
{
    $id = $_GET['kode'];
    $objAdmin->hapusPertumbuhan($id);
    echo '<script>
    swal({
        title: "Alert",
        text: "Data berhasil dihapus",
        type: "success"
    }).then(function() {
        window.location = "?view=pertumbuhan";
    });
  </script>';
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
