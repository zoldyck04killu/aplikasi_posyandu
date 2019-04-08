<?php if (@$_SESSION['user']) { ?>
<?php if (@$_SESSION['hak_akses'] == 0) { ?>

<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>

<div class="header-hal">
    <h1>Data Petugas</h1>
    <hr>
</div>

<div class="table-responsive">
<table class="table" id="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nip Petugas</th>
      <th scope="col">Nama Petugas</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Jekel</th>
      <th scope="col">Tempat Lahir</th>
      <th scope="col">Tgl Lahir</th>
      <th scope="col">No Hp</th>
      <th scope="col">Alamat</th>
      <th scope="col">Config</th>
    </tr>
  </thead>
  <tbody>
      <?php
     $data = $objAdmin->showPetugas();
     $no = 1;
     while ($a = $data->fetch_object()) {
         ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $a->Nip_petugas; ?></td>
      <td><?= $a->Nama_petugas; ?></td>
      <td><?= $a->Jabatan; ?></td>
      <td><?= $a->Jenis_kelamin; ?></td>
      <td><?= $a->Tempat_lahir; ?></td>
      <td><?= $a->Tgl_lahir; ?></td>
      <td><?= $a->No_hp; ?></td>
      <td><?= $a->alamat; ?></td>
      <td>
          <a href="?view=rubah-petugas&nip=<?=$a->Nip_petugas; ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="?view=hapus-petugas&nip=<?=$a->Nip_petugas; ?>" class="btn btn-sm btn-danger">Hapus</a>
      </td>
    </tr>
    <?php
     $no++;
     }
     ?>
  </tbody>
</table>
</div>

<a href="?view=tambah-petugas">
    <button type="button" class="btn btn-primary">Tambah</button>
</a>
<a href="view/laporan/laporan-petugas.php">
    <button type="button" class="btn btn-default">Cetak Laporan</button>
</a>
<?php } ?>
<?php } ?>
