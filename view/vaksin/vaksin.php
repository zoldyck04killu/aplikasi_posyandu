<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>

<div class="header-hal">
    <h1>Data Vaksin</h1>
    <hr>
</div>

<div class="table-responsive">
<table class="table" id="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Vaksin</th>
      <th scope="col">Nama Vaksin</th>
      <th scope="col">Dosis</th>
      <th scope="col">Keterangan Vaksin</th>
      <th scope="col">Config</th>
    </tr>
  </thead>
  <tbody>
      <?php
     $data = $objAdmin->showVaksin();
     $no = 1;
     while ($a = $data->fetch_object()) {
         ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $a->Kode_vaksin; ?></td>
      <td><?= $a->Nama_vaksin; ?></td>
      <td><?= $a->Dosis; ?></td>
      <td><?= $a->Keterangan_vaksin; ?></td>
      <td>
          <a href="?view=rubah-vaksin&kode=<?=$a->Kode_vaksin; ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="?view=hapus-vaksin&kode=<?=$a->Kode_vaksin; ?>" class="btn btn-sm btn-danger">Hapus</a>
      </td>
    </tr>
    <?php
     $no++;
     }
     ?>
  </tbody>
</table>
</div>

<a href="?view=tambah-vaksin">
    <button type="button" class="btn btn-primary">Tambah</button>
</a>
<a href="#">
    <button type="button" class="btn btn-default">Cetak Laporan</button>
</a>
