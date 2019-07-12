<?php if (@$_SESSION['user']) { ?>

<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>

<div class="header-hal">
    <h1>Data Bayi Dan Balita</h1>
    <hr>
</div>

<div class="table-responsive" >
<table class="table table-responsive" id="table" width="1050">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Bayai</th>
      <th scope="col">Nama Bayi</th>
      <th scope="col">Jekel</th>
      <th scope="col">Tempat_lahir</th>
      <th scope="col">Tanggal_lahir</th>
      <th scope="col">Nama Ortu</th>
      <th scope="col">Umur Bayi</th>
      <th scope="col">Agama</th>
      <th scope="col">No Hp</th>
      <th scope="col">Alamat</th>
      <th scope="col">Posyandu</th>

      <?php if (@$_SESSION['hak_akses'] == 0 || @$_SESSION['hak_akses'] == 3) { ?>
      <th scope="col">Config</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
      <?php
      if (@$_SESSION['kode_bayi']) {
        $data = $objAdmin->showBayiPengguna($_SESSION['kode_bayi']);
      }else {
        $data = $objAdmin->showBayi();
      }
      $no = 1;
     while ($a = $data->fetch_object()) {
         ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $a->Kode_bayi; ?></td>
      <td><?= $a->Nama_bayi; ?></td>
      <td><?= $a->Jekel; ?></td>
      <td><?= $a->Tempat_lahir; ?></td>
      <td><?= $a->Tanggal_lahir; ?></td>
      <td><?= $a->Nama_ortu; ?></td>
      <td><?= $a->Umur_bayi; ?></td>
      <td><?= $a->Agama; ?></td>
      <td><?= $a->No_hp; ?></td>
      <td><?= $a->Alamat; ?></td>
      <td><?= $a->posyandu; ?></td>

      <?php if (@$_SESSION['hak_akses'] == 0 || @$_SESSION['hak_akses'] == 3) { ?>
      <td>
          <a href="?view=rubah-bayi&kode=<?=$a->Kode_bayi; ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="?view=hapus-bayi&kode=<?=$a->Kode_bayi; ?>" class="btn btn-sm btn-danger">Hapus</a>
      </td>
      <?php } ?>
    </tr>
    <?php
     $no++;
     }
     ?>
  </tbody>
</table>
</div>
<?php if (@$_SESSION['hak_akses'] == 0 || @$_SESSION['hak_akses'] == 3) { ?>
<a href="?view=tambah-bayi">
    <button type="button" class="btn btn-primary">Tambah</button>
</a>
<a href="view/laporan/laporan-bayi.php">
    <button type="button" class="btn btn-default">Cetak Laporan</button>
</a>
<?php } ?>
<?php } ?>
