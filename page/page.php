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
elseif (@$_GET['view'] == 'vaksin')
{
    include 'view/vaksin/vaksin.php';
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
elseif (@$_GET['view'] == 'input-anggota')
{
    include 'view/admin/input-anggota.php';
}
elseif (@$_GET['view'] == 'data-anggota')
{
    include 'view/admin/data-anggota.php';
}
elseif (@$_GET['view'] == 'edit-anggota')
{
    include 'view/admin/edit-anggota.php';
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
