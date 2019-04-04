<?php

/**
 *
 */
class Admin
{

  private $mysqli;

  function __construct($mysqli)
  {
    $this->mysqli = $mysqli;
  }

  function register($username, $password_hash)
  {
    $db = $this->mysqli->conn;
    $db->query("INSERT INTO admin (admin, passadmin) VALUES ('$username','$password_hash')") or die ($db->error);
  }

  public function login($username, $password){
  $db = $this->mysqli->conn;
  $userdata = $db->query("SELECT * FROM admin WHERE admin = '$username' ") or die ($db->error);
  $cek = $userdata->num_rows;
  $cek_2 = $userdata->fetch_array();
          if (password_verify($password, $cek_2['passadmin'])) {
              $_SESSION['user'] = $cek_2['admin']; //session KTP
              return true;
          } else {
              return false; // password salah
          }
  }

  public function logout(){
    @$_SESSION['user'] == FALSE;
    unset($_SESSION);
    session_destroy();
  }

  public function savePetugas($nip, $nama, $jabatan, $jekel, $tempat_lahir, $tl, $no_handphone,$alamat){
      $db = $this->mysqli->conn;
      // var_dump($alamat);
      $savePetugas = $db->query("INSERT INTO petugas
                                (Nip_petugas,Nama_petugas,Jabatan,Jenis_kelamin,Tempat_lahir,Tgl_lahir,No_hp,alamat)
                                VALUES
                                ('$nip', '$nama', '$jabatan', '$jekel', '$tempat_lahir', '$tl', '$no_handphone','$alamat')
                                ") or die ($db->error);
      if ($savePetugas)
      {
        return true;
      }else{
        return false;
      }
  }

  public function showPetugas(){
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM petugas";
    $query = $db->query($sql);
    return $query;
  }

  public function rubahPetugas($id)
   {
     $db = $this->mysqli->conn;
     $query = $db->query("SELECT * FROM petugas WHERE Nip_petugas = '$id' ") or die ($db->error);
     return $query;
   }

   public function aksiRubahPetugas($nip_lama,$nip, $nama, $jabatan, $jekel, $tempat_lahir, $tl, $no_handphone,$alamat)
{
  $db = $this->mysqli->conn;
  $rubahPetugas = $db->query("UPDATE petugas SET Nip_petugas='$nip',Nama_petugas='$nama',Jabatan='$jabatan',Jenis_kelamin='$jekel', Tempat_lahir='$tempat_lahir',
                        Tgl_lahir='$tl',No_hp='$no_handphone',alamat='$alamat' WHERE Nip_petugas = '$nip_lama' ") or die ($db->error);
    if ($rubahPetugas)
    {
      return true;
    }else{
      return false;
    }
}

public function hapusPetugas($id)
  {
    $db = $this->mysqli->conn;
    $db->query("DELETE FROM petugas WHERE Nip_petugas = '$id' ") or die ($db->error);
  }

public function showVaksin(){
  $db = $this->mysqli->conn;
  $sql = "SELECT * FROM vaksin";
  $query = $db->query($sql);
  return $query;
}

public function simpanVaksin($kode_vaksin, $nama_vaksin, $dosis, $keterangan){
    $db = $this->mysqli->conn;
    // var_dump($alamat);
    $simpanVaksin = $db->query("INSERT INTO vaksin
                              (Kode_vaksin,Nama_vaksin,Dosis,Keterangan_vaksin)
                              VALUES
                              ('$kode_vaksin', '$nama_vaksin', '$dosis', '$keterangan')
                              ") or die ($db->error);
    if ($simpanVaksin)
    {
      return true;
    }else{
      return false;
    }
}

public function rubahVaksin($id)
 {
   $db = $this->mysqli->conn;
   $query = $db->query("SELECT * FROM vaksin WHERE Kode_vaksin = '$id' ") or die ($db->error);
   return $query;
 }

 public function aksiRubahVaksin($kode_vaksin_lama,$kode_vaksin, $nama_vaksin, $dosis, $keterangan)
{
$db = $this->mysqli->conn;
$rubahPetugas = $db->query("UPDATE vaksin SET Kode_vaksin='$kode_vaksin',Nama_vaksin='$nama_vaksin',Dosis='$dosis',
                                    Keterangan_vaksin='$keterangan' WHERE Kode_vaksin = '$kode_vaksin_lama' ") or die ($db->error);
  if ($rubahPetugas)
  {
    return true;
  }else{
    return false;
  }
}

public function hapusVaksin($id)
{
  $db = $this->mysqli->conn;
  $db->query("DELETE FROM vaksin WHERE Kode_vaksin = '$id' ") or die ($db->error);
}

public function showImunisasi(){
  $db = $this->mysqli->conn;
  $sql = "SELECT * FROM Jadwal_imunisasi";
  $query = $db->query($sql);
  return $query;
}

public function simpanImunisasi($kode_imunisasi, $jadwal_imunisasi){
    $db = $this->mysqli->conn;
    // var_dump($alamat);
    $simpanImunisasi = $db->query("INSERT INTO Jadwal_imunisasi
                              (Kode_imunisasi,Jadwal_imunisasi)
                              VALUES
                              ('$kode_imunisasi', '$jadwal_imunisasi')
                              ") or die ($db->error);
    if ($simpanImunisasi)
    {
      return true;
    }else{
      return false;
    }
}

public function rubahImunisasi($id)
 {
   $db = $this->mysqli->conn;
   $query = $db->query("SELECT * FROM Jadwal_imunisasi WHERE Kode_imunisasi = '$id' ") or die ($db->error);
   return $query;
 }

 public function aksiRubahImunisasi($kode_imunisasi_lama,$kode_imunisasi, $jadwal_imunisasi)
{
$db = $this->mysqli->conn;
$rubahPetugas = $db->query("UPDATE Jadwal_imunisasi SET Kode_imunisasi='$kode_imunisasi',Jadwal_imunisasi='$jadwal_imunisasi' WHERE Kode_imunisasi = '$kode_imunisasi_lama' ") or die ($db->error);
  if ($rubahPetugas)
  {
    return true;
  }else{
    return false;
  }
}

public function hapusImunisasi($id)
{
  $db = $this->mysqli->conn;
  $db->query("DELETE FROM Jadwal_imunisasi WHERE Kode_imunisasi = '$id' ") or die ($db->error);
}


public function showBayi(){
  $db = $this->mysqli->conn;
  $sql = "SELECT * FROM bayi";
  $query = $db->query($sql);
  return $query;
}

public function simpanBayi($kode_bayi, $nama_bayi,$jekel,$tempat_lahir,$tanggal_lahir,$nama_ibu,$umur_ibu,$agama,$no_hp,$alamat){
    $db = $this->mysqli->conn;
    // var_dump($alamat);
    $simpanBayi = $db->query("INSERT INTO bayi
                              (Kode_bayi,Nama_bayi,Jekel,Tempat_lahir,Tanggal_lahir,Nama_ibu,Umur_ibu,Agama,No_hp,Alamat)
                              VALUES
                              ('$kode_bayi', '$nama_bayi','$jekel','$tempat_lahir','$tanggal_lahir','$nama_ibu','$umur_ibu','$agama','$no_hp','$alamat')
                              ") or die ($db->error);
    if ($simpanBayi)
    {
      return true;
    }else{
      return false;
    }
}

public function rubahBayi($id)
 {
   $db = $this->mysqli->conn;
   $query = $db->query("SELECT * FROM bayi WHERE Kode_bayi = '$id' ") or die ($db->error);
   return $query;
 }

 public function aksiRubahBayi($kode_bayi_lama,$kode_bayi, $nama_bayi,$jekel,$tempat_lahir,$tanggal_lahir,$nama_ibu,$umur_ibu,$agama,$no_hp,$alamat)
{
$db = $this->mysqli->conn;
$rubahBayi = $db->query("UPDATE bayi SET Kode_bayi='$kode_bayi',Nama_bayi='$nama_bayi',Jekel='$jekel',Tempat_lahir='$tempat_lahir',Tanggal_lahir='$tanggal_lahir',
  Nama_ibu='$nama_ibu',Umur_ibu='$umur_ibu',Agama='$agama',No_hp='$no_hp',Alamat='$alamat'
  WHERE Kode_bayi = '$kode_bayi_lama' ") or die ($db->error);
  if ($rubahBayi)
  {
    return true;
  }else{
    return false;
  }
}

public function hapusBayi($id)
{
  $db = $this->mysqli->conn;
  $db->query("DELETE FROM bayi WHERE Kode_bayi = '$id' ") or die ($db->error);
}

// ============================================================================================

public function showPertumbuhan(){
  $db = $this->mysqli->conn;
  $sql = "SELECT * FROM pertumbuhan_bayi";
  $query = $db->query($sql);
  return $query;
}

public function simpanPertumbuhan($no_pemeriksaan, $tgl_pemeriksaan,$nip_petugas,$nama_petugas,$kode_jadwal,$jadwal_imunisasi,$kode_vaksin,$jens_vaksin,$nama_vaksin,$dosis,$keterangan_vaksin,$kode_bayi,$nama_bayi,$jekel_bayi,
                    $tgl_lahir,$umur_bayi,$keterangan,$keluhan,$berat_badan,$lingkar_kepala,$lebar_badan,$keterangan_gizi){
    $db = $this->mysqli->conn;
    // var_dump($alamat);
    $simpanPertumbuhan = $db->query("INSERT INTO pertumbuhan_bayi
                              (No_pemeriksaan,Tanggal,Nip_petugas,Nama_petugas,Kode_jadwal,Jadwal_imunisasi,Kode_vaksin,Jenis_vaksin,Nama_vaksin,Dosis,Keterangan_vaksin,Kode_bayi,Nama_bayi,Jenis_kelamin,Tgl_lahir,Umur_bayi,Keterangan,Keluhan,Berat_badan,Lingkar_kepala,Lebar_badan,Keterangan_gizi)
                              VALUES
                              ('$no_pemeriksaan', '$tgl_pemeriksaan','$nip_petugas','$nama_petugas','$kode_jadwal','$jadwal_imunisasi','$kode_vaksin','$jens_vaksin','$nama_vaksin','$dosis','$keterangan_vaksin','$kode_bayi','$nama_bayi','$jekel_bayi','$tgl_lahir','$umur_bayi','$keterangan','$keluhan','$berat_badan','$lingkar_kepala',
                                '$lebar_badan','$keterangan_gizi')
                              ") or die ($db->error);
    if ($simpanPertumbuhan)
    {
      return true;
    }else{
      return false;
    }
}

public function rubahPertumbuhan($id)
 {
   $db = $this->mysqli->conn;
   $query = $db->query("SELECT * FROM pertumbuhan_bayi WHERE No_pemeriksaan = '$id' or 1=1  ") or die ($db->error);
   return $query;
 }

 public function aksiRubahPertumbuhan($no_pemeriksaan_lama,$no_pemeriksaan, $tgl_pemeriksaan,$nip_petugas,$nama_petugas,
         $kode_jadwal,$jadwal_imunisasi,$kode_vaksin,$jens_vaksin,$nama_vaksin,$dosis,$keterangan_vaksin,$kode_bayi,$nama_bayi,
       $jekel_bayi,$tgl_lahir,$umur_bayi,$keterangan,$keluhan,$berat_badan,$lingkar_kepala,$lebar_badan,$keterangan_gizi)
{
$db = $this->mysqli->conn;
$rubahPertumbuhan = $db->query("UPDATE pertumbuhan_bayi SET No_pemeriksaan='$no_pemeriksaan',Tanggal='$tgl_pemeriksaan',
  Nip_petugas='$nip_petugas',Nama_petugas='$nama_petugas',Kode_jadwal='$kode_jadwal',Jadwal_imunisasi='$jadwal_imunisasi',
  Kode_vaksin='$kode_vaksin',Jenis_vaksin='$jens_vaksin',Nama_vaksin='$nama_vaksin',Dosis='$dosis',Keterangan_vaksin='$keterangan_vaksin',
  Kode_bayi='$kode_bayi',Nama_bayi='$nama_bayi',Jenis_kelamin='$jekel_bayi',Tgl_lahir='$tgl_lahir',Umur_bayi='$umur_bayi',
  Keterangan='$keterangan',Keluhan='$keluhan',Berat_badan='$berat_badan',Lingkar_kepala='$lingkar_kepala',Lebar_badan='$lebar_badan',
  Keterangan_gizi='$keterangan_gizi' WHERE No_pemeriksaan = '$no_pemeriksaan_lama' ") or die ($db->error);
  if ($rubahPertumbuhan)
  {
    return true;
  }else{
    return false;
  }
}

public function hapusPertumbuhan($id)
{
  $db = $this->mysqli->conn;
  $db->query("DELETE FROM pertumbuhan_bayi WHERE No_pemeriksaan = '$id' ") or die ($db->error);
}

}

?>
