<?php if (@$_SESSION['user']) { ?>

<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>

<div class="header-hal">
    <h1>Data Bayi Dan Belita</h1>
    <hr>
</div>

<div class="table-responsive" >
<table class="table table-responsive" id="table" width="1090">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Bayai</th>
      <th scope="col">Nama Bayi</th>
      <th scope="col">Jekel</th>
      <th scope="col">Tempat_lahir</th>
      <th scope="col">Tanggal_lahir</th>
      <th scope="col">Nama Ibu</th>
      <th scope="col">Umur Ibu</th>
      <th scope="col">Agama</th>
      <th scope="col">No Hp</th>
      <th scope="col">Alamat</th>
      <th scope="col">Config</th>
    </tr>
  </thead>
  <tbody>
      <?php
     $data = $objAdmin->showBayi();
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
      <td><?= $a->Nama_ibu; ?></td>
      <td><?= $a->Umur_ibu; ?></td>
      <td><?= $a->Agama; ?></td>
      <td><?= $a->No_hp; ?></td>
      <td><?= $a->Alamat; ?></td>
      <td>
          <a href="?view=rubah-bayi&kode=<?=$a->Kode_bayi; ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="?view=hapus-bayi&kode=<?=$a->Kode_bayi; ?>" class="btn btn-sm btn-danger">Hapus</a>
      </td>
    </tr>
    <?php
     $no++;
     }
     ?>
  </tbody>
</table>
</div>

<a href="?view=tambah-bayi">
    <button type="button" class="btn btn-primary">Tambah</button>
</a>
<a href="view/laporan/laporan-bayi.php">
    <button type="button" class="btn btn-default">Cetak Laporan</button>
</a>
<?php } ?>
