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

  function register_admin($username, $password_hash,$nip_petugas)
  {
    $db = $this->mysqli->conn;
    $db->query("INSERT INTO admin (username, password,hak_akses,nip_petugas) VALUES ('$username','$password_hash','0','$nip_petugas')") or die ($db->error);
    return true;
  }

  function register_posyandu($username, $password_hash,$posyandu)
  {
    $db = $this->mysqli->conn;
    $db->query("INSERT INTO posyandu (nama_posyandu,username, password,hak_akses) VALUES ('$posyandu','$username','$password_hash','3')") or die ($db->error);
    return true;
  }

  function register_pengguna($username, $password_hash, $hak_akses, $blokir_pengguna,$kode_bayi)
  {
    $db = $this->mysqli->conn;
    $tanggal = date('Y/m/d');
    $register = $db->query("INSERT INTO pengguna (username, password,hak_akses,Tanggal,Blokir_pengguna,kode_bayi) VALUES ('$username', '$password_hash', '$hak_akses', '$tanggal', '$blokir_pengguna','$kode_bayi')") or die ($db->error);
    if ($register) {
        return true;
    } else {
        return false; // password salah
    }
  }

  public function login($username, $password){
  $db = $this->mysqli->conn;
  $userdata = $db->query("SELECT * FROM admin WHERE username = '$username' ") or die ($db->error);
  $cek = $userdata->num_rows;
  $cek_2 = $userdata->fetch_array();
          if (password_verify($password, $cek_2['password'])) {
              $_SESSION['user'] = $cek_2['username'];
              $_SESSION['hak_akses'] = $cek_2['hak_akses']; //session
               //session
              return true;
          } else {
              return false; // password salah
          }
  }

  public function login_posyandu($username, $password){
  $db = $this->mysqli->conn;
  $userdata = $db->query("SELECT * FROM posyandu WHERE username = '$username' ") or die ($db->error);
  $cek = $userdata->num_rows;
  $cek_2 = $userdata->fetch_array();
          if (password_verify($password, $cek_2['password'])) {
              $_SESSION['user'] = $cek_2['username'];
              $_SESSION['hak_akses'] = $cek_2['hak_akses']; //session
              $_SESSION['nama_posyandu'] = $cek_2['nama_posyandu']; //session
               //session
              return true;
          } else {
              return false; // password salah
          }
  }

  public function login_pengguna($username, $password){
  $db = $this->mysqli->conn;
  $userdata = $db->query("SELECT * FROM pengguna WHERE username = '$username' ") or die ($db->error);
  $cek = $userdata->num_rows;
  $cek_2 = $userdata->fetch_array();
          if (password_verify($password, $cek_2['password'])) {
              $_SESSION['user'] = $cek_2['username']; //session
              $_SESSION['hak_akses'] = $cek_2['hak_akses']; //session
              $_SESSION['kode_bayi'] = $cek_2['kode_bayi']; //session

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

public function simpanVaksin($kode_vaksin,$tanggal, $nama_vaksin, $dosis, $perberian, $keterangan){
    $db = $this->mysqli->conn;
    // var_dump($alamat);
    $simpanVaksin = $db->query("INSERT INTO vaksin
                              (Kode_vaksin,tanggal,Nama_vaksin,Dosis,perberian,Keterangan_vaksin)
                              VALUES
                              ('$kode_vaksin','$tanggal', '$nama_vaksin', '$dosis', '$perberian', '$keterangan')
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

 public function aksiRubahVaksin($kode_vaksin_lama,$kode_vaksin,$tanggal, $nama_vaksin, $dosis,$perberian, $keterangan)
{
$db = $this->mysqli->conn;
$rubahPetugas = $db->query("UPDATE vaksin SET Kode_vaksin='$kode_vaksin',tanggal='$tanggal',Nama_vaksin='$nama_vaksin',Dosis='$dosis',
                                    perberian='$perberian',Keterangan_vaksin='$keterangan' WHERE Kode_vaksin = '$kode_vaksin_lama' ") or die ($db->error);
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
  $sql = "SELECT * FROM jadwal_imunisasi";
  $query = $db->query($sql);
  return $query;
}

public function simpanImunisasi($kode_imunisasi, $umur){
    $db = $this->mysqli->conn;
    // var_dump($alamat);
    $simpanImunisasi = $db->query("INSERT INTO jadwal_imunisasi
                              (Kode_imunisasi,Umur,vaksin)
                              VALUES
                              ('$kode_imunisasi', '$umur','$vaksin')
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
   $query = $db->query("SELECT * FROM jadwal_imunisasi WHERE Kode_imunisasi = '$id' ") or die ($db->error);
   return $query;
 }

 public function aksiRubahImunisasi($kode_imunisasi_lama,$kode_imunisasi, $umur,$vaksin)
{
$db = $this->mysqli->conn;
$rubahPetugas = $db->query("UPDATE jadwal_imunisasi SET Kode_imunisasi='$kode_imunisasi',Umur='$umur',vaksin='$vaksin' WHERE Kode_imunisasi = '$kode_imunisasi_lama' ") or die ($db->error);
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
  $db->query("DELETE FROM jadwal_imunisasi WHERE Kode_imunisasi = '$id' ") or die ($db->error);
}


public function showBayi(){
  $db = $this->mysqli->conn;
  $sql = "SELECT * FROM bayi";
  $query = $db->query($sql);
  return $query;
}

public function showBayiPengguna($kode_bayi){
  $db = $this->mysqli->conn;
  $sql = "SELECT * FROM bayi where kode_bayi = '$kode_bayi' ";
  $query = $db->query($sql);
  return $query;
}

public function simpanBayi($kode_bayi, $nama_bayi,$jekel,$tempat_lahir,$tanggal_lahir,$nama_ortu,$agama,$no_hp,$alamat){
    $db = $this->mysqli->conn;
    // $sql_bayi = "SELECT Tanggal_lahir FROM bayi where kode_bayi= '$kode_bayi' ";
    // $query_bayi = $db->query($sql_bayi);
    // $a = $query_bayi->fetch_object();
    $posyandu = $_SESSION['nama_posyandu'];
    $origDate = $tanggal_lahir;
    $birthDate = date("Y-m-d", strtotime($origDate));

      $birthday = new DateTime($birthDate);
      $datenew = new DateTime();
      $diff = $birthday->diff(new DateTime($tgl_pemeriksaan));
      $umurbayi = $diff->format('%m') + 12 * $diff->format('%y');
    // var_dump($alamat);
    $simpanBayi = $db->query("INSERT INTO bayi
                              (Kode_bayi,Nama_bayi,Jekel,Tempat_lahir,Tanggal_lahir,Nama_ortu,Umur_bayi,Agama,No_hp,Alamat,posyandu)
                              VALUES
                              ('$kode_bayi', '$nama_bayi','$jekel','$tempat_lahir','$tanggal_lahir','$nama_ortu','$umurbayi','$agama','$no_hp','$alamat','$posyandu')
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

 public function aksiRubahBayi($kode_bayi_lama,$kode_bayi, $nama_bayi,$jekel,$tempat_lahir,$tanggal_lahir,$nama_ortu,$agama,$no_hp,$alamat)
{
$db = $this->mysqli->conn;
// $sql_bayi = "SELECT Tanggal_lahir FROM bayi where kode_bayi= '$kode_bayi' ";
// $query_bayi = $db->query($sql_bayi);
// $a = $query_bayi->fetch_object();

// $origDate = $a->Tanggal_lahir;
$posyandu = $_SESSION['nama_posyandu'];
$origDate = $tanggal_lahir;
$birthDate = date("Y-m-d", strtotime($origDate));

  $birthday = new DateTime($birthDate);
  $datenew = new DateTime();
  $diff = $birthday->diff(new DateTime($tgl_pemeriksaan));
  $umurbayi = $diff->format('%m') + 12 * $diff->format('%y');

$rubahBayi = $db->query("UPDATE bayi SET Kode_bayi='$kode_bayi',Nama_bayi='$nama_bayi',Jekel='$jekel',Tempat_lahir='$tempat_lahir',Tanggal_lahir='$tanggal_lahir',
  Nama_ortu='$nama_ortu',Umur_bayi='$umurbayi',Agama='$agama',No_hp='$no_hp',Alamat='$alamat', posyandu='$posyandu'
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

public function showPertumbuhanPengguna($kode_bayi){
  $db = $this->mysqli->conn;
  $sql = "SELECT * FROM pertumbuhan_bayi  where pertumbuhan_bayi.Kode_bayi='$kode_bayi' ";
  $query = $db->query($sql);
  return $query;
}

public function showPertumbuhan_perbayi($kode){
  $db = $this->mysqli->conn;
  $sql = "SELECT * FROM pertumbuhan_bayi
            WHERE No_pemeriksaan='$kode'";
  $query = $db->query($sql);
  return $query;
}


public function simpanPertumbuhan($no_pemeriksaan, $tgl_pemeriksaan,$nip_petugas,$kode_jadwal,$kode_vaksin,$kode_bayi,$keterangan,$keluhan,$berat_badan,$lingkar_kepala,$tinggi_badan,$keterangan_gizi){
    $db = $this->mysqli->conn;
    $sql_bayi = "SELECT Tanggal_lahir FROM bayi where kode_bayi= '$kode_bayi' ";
    $query_bayi = $db->query($sql_bayi);
    $a = $query_bayi->fetch_object();

    $posyandu = $_SESSION['nama_posyandu'];
    $origDate = $a->Tanggal_lahir;
    $birthDate = date("Y-m-d", strtotime($origDate));

      $birthday = new DateTime($birthDate);
      $datenew = new DateTime();
      $diff = $birthday->diff(new DateTime($tgl_pemeriksaan));
      $umurbayi = $diff->format('%m') + 12 * $diff->format('%y');
      // var_dump($umurbayi);
      // die();
    // var_dump($alamat);
    $simpanPertumbuhan = $db->query("INSERT INTO pertumbuhan_bayi
                              (No_pemeriksaan,Tanggal,Nip_petugas,Kode_jadwal,Kode_vaksin,Kode_bayi,umur_bayi,Keterangan,Keluhan,Berat_badan,Tinggi_badan,Lingkar_kepala,Keterangan_gizi,posyandu)
                              VALUES
                              ('$no_pemeriksaan', '$tgl_pemeriksaan','$nip_petugas','$kode_jadwal','$kode_vaksin','$kode_bayi','$umurbayi','$keterangan','$keluhan','$berat_badan','$tinggi_badan','$lingkar_kepala',
                                '$keterangan_gizi','$posyandu')
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
   $query = $db->query("SELECT * FROM pertumbuhan_bayi WHERE No_pemeriksaan = '$id' ") or die ($db->error);
   return $query;
 }

 public function aksiRubahPertumbuhan($no_pemeriksaan_lama,$no_pemeriksaan, $tgl_pemeriksaan,$nip_petugas,$kode_jadwal,$kode_vaksin,$kode_bayi,$umur_bayi,$berat_badan,$tinggi_badan,$lingkar_kepala,$keterangan_gizi,$keterangan,$keluhan)
{
  // var_dump($umur_bayi);
  // die();
$db = $this->mysqli->conn;
$sql_bayi = "SELECT Tanggal_lahir FROM bayi where kode_bayi= '$kode_bayi' ";
$query_bayi = $db->query($sql_bayi);
$a = $query_bayi->fetch_object();

$posyandu = $_SESSION['nama_posyandu'];
$origDate = $a->Tanggal_lahir;
$birthDate = date("Y-m-d", strtotime($origDate));

  $birthday = new DateTime($birthDate);
  $datenew = new DateTime();
  $diff = $birthday->diff(new DateTime($tgl_pemeriksaan));
  $umurbayi = $diff->format('%m') + 12 * $diff->format('%y');

$rubahPertumbuhan = $db->query("UPDATE pertumbuhan_bayi SET No_pemeriksaan='$no_pemeriksaan',Tanggal='$tgl_pemeriksaan',
  Nip_petugas='$nip_petugas',Kode_jadwal='$kode_jadwal',
  Kode_vaksin='$kode_vaksin',
  Kode_bayi='$kode_bayi', umur_bayi='$umurbayi',
  Keterangan='$keterangan',Keluhan='$keluhan',Berat_badan='$berat_badan',Tinggi_badan='$tinggi_badan',Lingkar_kepala='$lingkar_kepala',
  Keterangan_gizi='$keterangan_gizi',posyandu='$posyandu' WHERE No_pemeriksaan = '$no_pemeriksaan_lama' ") or die ($db->error);
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

public function grafk_pertumbuhan($kode_bayi){
  $db = $this->mysqli->conn;
  $sql = "SELECT * FROM pertumbuhan_bayi  where Kode_bayi = '$kode_bayi' ";
  $query = $db->query($sql);
  // $b = $query->fetch_object();
  // var_dump($kode_bayi);
  // die();
  return $query;
}

public function jadwal_bayi_imunisasi($tgl_lahir){
  // $origDate = $tanggal_lahir;
  $birthDate = date("Y-m-d", strtotime($tgl_lahir));
  $tgl_now = date("Y-m-d");
  $birthday = new DateTime($birthDate);
  $datenew = new DateTime();
  $diff = $birthday->diff(new DateTime($tgl_now));
  $umurbayi = $diff->format('%m') + 12 * $diff->format('%y');

  $db = $this->mysqli->conn;
  $sql = "SELECT * FROM jadwal_imunisasi WHERE Umur='$umurbayi'";
  $query = $db->query($sql);
  $a = $query->fetch_object();
  // if ($a != null) {
  //   echo "1";
  //   var_dump($umurbayi);
  // }else{
  //   echo "0";
  //   var_dump($umurbayi);
  // }
  // die();
  return $a;
}

}

?>
