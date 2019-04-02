<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>

<div class="header-hal">
    <h1>Data Jadwal Imunisasi</h1>
    <hr>
</div>

<div class="table-responsive">
<table class="table" id="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Imunisasi</th>
      <th scope="col">Jadwal Imunisasi</th>
      <th scope="col">Config</th>
    </tr>
  </thead>
  <tbody>
      <?php
     $data = $objAdmin->showImunisasi();
     $no = 1;
     while ($a = $data->fetch_object()) {
         ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $a->Kode_imunisasi; ?></td>
      <td><?= $a->Jadwal_imunisasi; ?></td>
      <td>
          <a href="?view=rubah-imunisasi&kode=<?=$a->Kode_imunisasi; ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="?view=hapus-imunisasi&kode=<?=$a->Kode_imunisasi; ?>" class="btn btn-sm btn-danger">Hapus</a>
      </td>
    </tr>
    <?php
     $no++;
     }
     ?>
  </tbody>
</table>
</div>

<a href="?view=tambah-imunisasi">
    <button type="button" class="btn btn-primary">Tambah</button>
</a>
<a href="#">
    <button type="button" class="btn btn-default">Cetak Laporan</button>
</a>
