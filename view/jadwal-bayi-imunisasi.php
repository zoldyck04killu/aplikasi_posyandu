<?php // if (@$_SESSION['user']) { ?>

<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>

<div class="header-hal">
    <h1>Jadwal Imunisasi</h1>
    <hr>
</div>

<div class="table-responsive" >
<table class="table " id="table" width="1050">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Bayi</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Tempat Lahir</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Nama Orangtua</th>
      <th scope="col">Umur</th>
      <th scope="col">Posyandu</th>
      <?php if (@$_SESSION['user']) { ?>
      <?php if (@$_SESSION['hak_akses'] == 0) { ?>
      <th scope="col">Config</th>
      <?php } ?>
    <?php } ?>
      
    </tr>
  </thead>
  <tbody>
      <?php
     $data = $objAdmin->showBayi();
     $no = 1;
     while ($a = $data->fetch_object()) {
        $umur_now = $objAdmin->jadwal_bayi_imunisasi($a->Tanggal_lahir);
        if ($umur_now != null  ) {
         ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $a->Nama_bayi; ?></td>
      <td><?= $a->Jekel; ?></td>
      <td><?= $a->Tempat_lahir; ?></td>
      <td><?= $a->Tanggal_lahir; ?></td>
      <td><?= $a->Nama_ortu; ?></td>
      <td><?= $a->Umur_bayi; ?></td>
      <td><?= $a->posyandu; ?></td>
      <?php if (@$_SESSION['user']) { ?>
      <?php if (@$_SESSION['hak_akses'] == 0) { ?>
      <td>
          <a href="?view=rubah-imunisasi&kode=<?=$a->Kode_imunisasi; ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="?view=hapus-imunisasi&kode=<?=$a->Kode_imunisasi; ?>" class="btn btn-sm btn-danger">Hapus</a>
      </td>
      <?php } ?>
    <?php } ?>

    </tr>
    <?php
     $no++;
        }
     }
     ?>
  </tbody>
</table>
</div>
<?php if (@$_SESSION['user']) { ?>

<?php if (@$_SESSION['hak_akses'] == 0) { ?>
<a href="?view=tambah-imunisasi">
    <button type="button" class="btn btn-primary">Tambah</button>
</a>
<a href="view/laporan/laporan-jadwal-imunisasi.php">
    <button type="button" class="btn btn-default">Cetak Laporan</button>
</a>
<?php } ?>
<?php } ?>
