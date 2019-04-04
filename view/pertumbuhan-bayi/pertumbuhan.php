<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>

<div class="header-hal">
    <h1>Data Pertumbuhan</h1>
    <hr>
</div>

<div class="table-responsive" >
<table class="table table-responsive" id="table" width="1090">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">No Pemeriksaan</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nip Petugas</th>
      <th scope="col">Nama Petugas</th>
      <th scope="col">Kode Jadwal</th>
      <th scope="col">Jadwal Imunisasi</th>
      <th scope="col">Kode Vaksin</th>
      <th scope="col">Jenis Vaksin</th>
      <th scope="col">Nama Vaksin</th>
      <th scope="col">Dosis</th>
      <th scope="col">Keterangan Vaksin</th>
      <th scope="col">Kode Bayi</th>
      <th scope="col">Nama Bayi</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Umur Bayi</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Keluhan</th>
      <th scope="col">Berat Badan</th>
      <th scope="col">Lingkar Kepala</th>
      <th scope="col">Lebar Badan</th>
      <th scope="col">Keterangan Gizi</th>

      <th scope="col">Config</th>
    </tr>
  </thead>
  <tbody>
      <?php
     $data = $objAdmin->showPertumbuhan();
     $no = 1;
     while ($a = $data->fetch_object()) {
         ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $a->No_pemeriksaan; ?></td>
      <td><?= $a->Tanggal; ?></td>
      <td><?= $a->Nip_petugas; ?></td>
      <td><?= $a->Nama_petugas; ?></td>
      <td><?= $a->Kode_jadwal; ?></td>
      <td><?= $a->Jadwal_imunisasi; ?></td>
      <td><?= $a->Kode_vaksin; ?></td>
      <td><?= $a->Jenis_vaksin; ?></td>
      <td><?= $a->Nama_vaksin; ?></td>
      <td><?= $a->Dosis; ?></td>
      <td><?= $a->Keterangan_vaksin; ?></td>
      <td><?= $a->Kode_bayi; ?></td>
      <td><?= $a->Nama_bayi; ?></td>
      <td><?= $a->Jenis_kelamin; ?></td>
      <td><?= $a->Tgl_lahir; ?></td>
      <td><?= $a->Umur_bayi; ?></td>
      <td><?= $a->Keterangan; ?></td>
      <td><?= $a->Keluhan; ?></td>
      <td><?= $a->Berat_badan; ?></td>
      <td><?= $a->Lingkar_kepala; ?></td>
      <td><?= $a->Lebar_badan; ?></td>
      <td><?= $a->Keterangan_gizi; ?></td>

      <td>
          <a href="?view=rubah-pertumbuhan&kode=<?=$a->No_pemeriksaan; ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="?view=hapus-pertumbuhan&kode=<?=$a->No_pemeriksaan; ?>" class="btn btn-sm btn-danger">Hapus</a>
      </td>
    </tr>
    <?php
     $no++;
     }
     ?>
  </tbody>
</table>
</div>

<a href="?view=tambah-pertumbuhan">
    <button type="button" class="btn btn-primary">Tambah</button>
</a>
<a href="#">
    <button type="button" class="btn btn-default">Cetak Laporan</button>
</a>
