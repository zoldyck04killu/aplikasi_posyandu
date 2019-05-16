<?php if (@$_SESSION['user']) { ?>

<?php
$id = $_GET['kode'];
$data = $objAdmin->rubahPertumbuhan($id);
$a = $data->fetch_object();
 ?>
 <div class="header-hal">
   <h1>Data Pertumbuhan</h1>
     <hr>
 </div>

 <div class="form">
     <form method="post" action="">
       <input class="form-control" type="hidden" placeholder="No Pemeriksaan" name="no_pemeriksaan_lama" value="<?= $a->No_pemeriksaan ?>">
       <div class="form-group row">
         <label for="staticEmail" class="col-sm-2 col-form-label" >No Pemeriksaan</label>
         <div class="col-sm-10">
             <input class="form-control" type="text" placeholder="No Pemeriksaan" name="no_pemeriksaan" value="<?= $a->No_pemeriksaan ?>">
         </div>
       </div>
       <div class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label" >Tanggal Pemeriksaan</label>
           <div class="col-sm-10">
               <input class="form-control" type="date" name="tgl_pemeriksaan" value="<?= $a->Tanggal ?>">
           </div>
       </div>
       <div class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label" >Nip Petugas</label>
           <div class="col-sm-10">
               <select class="form-control" id="exampleFormControlSelect1" name="nip_petugas" >
                 <?php
                $data = $objAdmin->showPetugas();
                while ($b = $data->fetch_object()) {
                    ?>
                <option value="<?= $a->Nip_petugas ?>"><?= $a->Nip_petugas ?></option>
                <option value="<?= $b->Nip_petugas ?>"><?= $b->Nip_petugas ?></option>
                 <?php
                 }
                 ?>
               </select>
           </div>
       </div>
       <div class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label" >Kode Jadwal Imunisasi</label>
           <div class="col-sm-10">
               <input class="form-control" type="text" placeholder="Kode Jadwal Imunisasi" name="kode_jadwal" value="<?= $a->Kode_jadwal ?>">
           </div>
       </div>

       <div class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label" >Kode Vaksin</label>
           <div class="col-sm-10">
               <select class="form-control" id="exampleFormControlSelect1" name="kode_vaksin" >
                 <?php
                $data = $objAdmin->showVaksin();
                $no = 1;
                while ($b = $data->fetch_object()) {
                    ?>
                <option value="<?= $a->Kode_vaksin; ?>"><?= $a->Kode_vaksin; ?></option>
                <option value="<?= $b->Kode_vaksin; ?>"><?= $b->Kode_vaksin; ?></option>
                 <?php
                 }
                 ?>
               </select>
           </div>
       </div>

       <div class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label" >Kode Bayi</label>
           <div class="col-sm-10">
               <input class="form-control" type="text" placeholder="Kode Bayi" name="kode_bayi" value="<?= $a->Kode_bayi; ?>">
           </div>
       </div>

       <div class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label" >Keterangan</label>
           <div class="col-sm-10">
               <input class="form-control" type="text" placeholder="Keterangan" name="keterangan" value="<?= $a->Keterangan; ?>">
           </div>
       </div>
       <div class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label" >Keluhan</label>
           <div class="col-sm-10">
               <input class="form-control" type="text" placeholder="Keluhan" name="keluhan" value="<?= $a->Keluhan; ?>">
           </div>
       </div>
       <div class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label" >Berat Badan</label>
           <div class="col-sm-10">
               <input class="form-control" type="text" placeholder="Berat Badan" name="berat_badan" value="<?= $a->Berat_badan; ?>">
           </div>
       </div>
       <div class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label" >Lingkar Kepala</label>
           <div class="col-sm-10">
               <input class="form-control" type="text" placeholder="Lingkar Kepala" name="lingkar_kepala" value="<?= $a->Lingkar_kepala; ?>">
           </div>
       </div>
       <div class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label" >Lebar Badan</label>
           <div class="col-sm-10">
               <input class="form-control" type="text" placeholder="Lebar Badan" name="lebar_badan" value="<?= $a->Lebar_badan; ?>" >
           </div>
       </div>
       <div class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label" >Keterangan Gizi</label>
           <div class="col-sm-10">
               <input class="form-control" type="text" placeholder="Keterangan Gizi" name="keterangan_gizi" value="<?= $a->Keterangan_gizi; ?>" >
           </div>
       </div>

       <button type="submit" class="btn btn-primary" name="rubahPertumbuhan">Simpan</button>

     </form>
 </div>
 <?php
 if (isset($_POST['rubahPertumbuhan']))
 {
   $no_pemeriksaan_lama = $obj->conn->real_escape_string($_POST['no_pemeriksaan_lama']);

   $no_pemeriksaan = $obj->conn->real_escape_string($_POST['no_pemeriksaan']);
   $tgl_pemeriksaan = $obj->conn->real_escape_string($_POST['tgl_pemeriksaan']);
   $nip_petugas = $obj->conn->real_escape_string($_POST['nip_petugas']);
   $kode_jadwal = $obj->conn->real_escape_string($_POST['kode_jadwal']);

   $kode_vaksin = $obj->conn->real_escape_string($_POST['kode_vaksin']);

   $kode_bayi = $obj->conn->real_escape_string($_POST['kode_bayi']);

   $keterangan = $obj->conn->real_escape_string($_POST['keterangan']);
   $keluhan = $obj->conn->real_escape_string($_POST['keluhan']);
   $berat_badan = $obj->conn->real_escape_string($_POST['berat_badan']);
   $lingkar_kepala = $obj->conn->real_escape_string($_POST['lingkar_kepala']);
   $lebar_badan = $obj->conn->real_escape_string($_POST['lebar_badan']);
   $keterangan_gizi = $obj->conn->real_escape_string($_POST['keterangan_gizi']);

   $rubahPertumbuhan = $objAdmin->aksiRubahPertumbuhan($no_pemeriksaan_lama,$no_pemeriksaan, $tgl_pemeriksaan,$nip_petugas,$kode_jadwal,$kode_vaksin,$kode_bayi,$keterangan,$keluhan,$berat_badan,$lingkar_kepala,$lebar_badan,$keterangan_gizi);
   if ($rubahPertumbuhan) {
       echo "<script>
       swal(
         'Update Pertumbuhan Bayi Success!',
         'You clicked the button!',
         'success'
       ).then(function() {
           window.location = '?view=pertumbuhan';
       });
       </script>";
   }else{
     echo "<script>
     swal({
           title: 'Error Update Pertumbuhan Bayi!',
           text: 'Do you want to continue',
           type: 'error'
         })
     </script>";
   }
 }


 ?>

<?php } ?>
