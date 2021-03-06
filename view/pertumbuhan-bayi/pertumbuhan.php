<?php if (@$_SESSION['user']) { ?>

<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>

<div class="header-hal">
    <h1>Data Pertumbuhan</h1>
    <hr>
</div>
<?php
if (@$_SESSION['kode_bayi']) {
?>
<p>
  <a href="?view=grafik&kode=<?=$_SESSION['kode_bayi']; ?>" class="btn btn-sm btn-info">Grafik</a>
</p>
<?php } ?>

<div class="table-responsive" >
<table class="table table-responsive" id="table" width="1050">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">No Pemeriksaan</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nip Petugas</th>
      <th scope="col">Kode Jadwal</th>
      <th scope="col">Kode Vaksin</th>
      <th scope="col">Kode Bayi</th>
      <th scope="col">Umur Bayi</th>
      <th scope="col">Berat Badan</th>
      <th scope="col">Tingi Badan</th>
      <th scope="col">Lingkar Kepala</th>
      <th scope="col">Status Gizi</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Keluhan</th>
      <th scope="col">Posyandu</th>

      <?php if (@$_SESSION['hak_akses'] == 0 || @$_SESSION['hak_akses'] == 3) { ?>
      <th scope="col">Config</th>
    <?php } ?>
      <th scope="col">Fitur</th>
    </tr>
  </thead>
  <tbody>
      <?php
      if (@$_SESSION['kode_bayi']) {
        $data = $objAdmin->showPertumbuhanPengguna($_SESSION['kode_bayi']);
      }else {
        $data = $objAdmin->showPertumbuhan();
      }
     $no = 1;
     while ($a = $data->fetch_object()) {
         ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $a->No_pemeriksaan; ?></td>
      <td><?= $a->Tanggal; ?></td>
      <td><?= $a->Nip_petugas; ?></td>
      <td><?= $a->Kode_jadwal; ?></td>
      <td><?= $a->Kode_vaksin; ?></td>
      <td><?= $a->Kode_bayi; ?></td>
      <td><?= $a->umur_bayi.' bulan'; ?></td>
      <td><?= $a->Berat_badan; ?></td>
      <td><?= $a->Tinggi_badan; ?></td>
      <td><?= $a->Lingkar_kepala; ?></td>
      <td><?= $a->Keterangan_gizi; ?></td>
      <td><?= $a->Keterangan; ?></td>
      <td><?= $a->Keluhan; ?></td>
      <td><?= $a->posyandu; ?></td>

      <?php if (@$_SESSION['hak_akses'] == 0 || @$_SESSION['hak_akses'] == 3) { ?>
      <td>
          <a href="?view=rubah-pertumbuhan&kode=<?=$a->No_pemeriksaan; ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="?view=hapus-pertumbuhan&kode=<?=$a->No_pemeriksaan; ?>" class="btn btn-sm btn-danger">Hapus</a>
      </td>
    <?php } ?>
      <td>
          <a href="?view=grafik&kode=<?=$a->Kode_bayi; ?>" class="btn btn-sm btn-info">Grafik</a>
          <a href="view/laporan/laporan-pertumbuhan.php?kode=<?=$a->No_pemeriksaan; ?>" class="btn btn-sm btn-dark">Laporan</a>
      </td>
    </tr>
    <?php
     $no++;
     }
     ?>
  </tbody>
</table>
</div>

<?php if (@$_SESSION['hak_akses'] == 0 || @$_SESSION['hak_akses'] == 3) { ?>

<a href="?view=tambah-pertumbuhan">
    <button type="button" class="btn btn-primary">Tambah</button>
</a>

<?php } ?>
<?php } ?>
