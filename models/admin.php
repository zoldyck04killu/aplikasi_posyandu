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

}

?>
