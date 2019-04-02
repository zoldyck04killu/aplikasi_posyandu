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

  function saveAnggota($id, $nama, $jurusan, $jekel, $temp_lhr, $tl, $status)
  {
    $db = $this->mysqli->conn;
    $tgl_Entry = date('Y/m/d');
    $saveAnggota = $db->query("INSERT INTO anggota
                              (id_anggota, nama_anggota,jurusan, jenkel, tmp_lahir, tgl_lahir, status, tgl_entry)
                              VALUES
                              ('$id','$nama', '$jurusan', '$jekel', '$temp_lhr', '$tl', '$status','$tgl_Entry')
                              ") or die ($db->error);
    if ($saveAnggota)
    {
      return true;
    }else{
      return false;
    }
  }

  public function savePetugas($nip, $nama, $jabatan, $jekel, $tempat_lahir, $tl, $no_handphone,$alamat){
      $db = $this->mysqli->conn;
      $tgl_Entry = date('Y/m/d');
      $saveAnggota = $db->query("INSERT INTO anggota
                                (id_anggota, nama_anggota,jurusan, jenkel, tmp_lahir, tgl_lahir, status, tgl_entry)
                                VALUES
                                ('$id','$nama', '$jurusan', '$jekel', '$temp_lhr', '$tl', '$status','$tgl_Entry')
                                ") or die ($db->error);
      if ($saveAnggota)
      {
        return true;
      }else{
        return false;
      }
  }


?>
