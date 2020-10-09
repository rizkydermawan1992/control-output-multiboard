<?php   

//Simpan dengan nama file koneksidb.php

$server       = "localhost";
$user         = "root";
$password     = "";
$database     = "kontrolesp"; //Nama Database di phpMyAdmin

$koneksi      = mysqli_connect($server, $user, $password, $database);

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query );
    $box = [];
    while( $sql = mysqli_fetch_assoc($result) ){
    $box[] = $sql;
    }
    return $box;
}

function tambahOutput($post) {
    global $koneksi;
    $device = $post["DEVICE"];
    $board  = $post["BOARD"];
    $gpio   = $post["GPIO"];
    $type   = $post["TYPE"];

        if ($type == "Active High") {
          $state = 0; //0 = OFF
        }
        if ($type == "Active Low") {
          $state = 1; //1 = OFF
        }
    
    //insert data ke dalam tabel kontrol
    $sql = "INSERT INTO tabel_kontrol(DEVICE, BOARD, GPIO, STATE, TYPE) VALUES('$device', '$board', '$gpio', '$state', '$type')";
    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);
  
}


  function ubahDevice ($post) {
     global $koneksi;
     $ID     = $post ['ID'];
     $device = $post["DEVICE"];
     $board  = $post["BOARD"];
     $gpio   = $post["GPIO"];
     $type   = $post["TYPE"];

    //update data ke tabel_konrol
    $sql = "UPDATE tabel_kontrol SET DEVICE = '$device', BOARD = '$board', GPIO  = '$gpio', TYPE = '$type' 
            WHERE ID  = '$ID'";  
   
    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);

  }


function hapusOutput ($ID ) {
      global $koneksi;
      mysqli_query($koneksi, "DELETE FROM tabel_kontrol WHERE ID = '$ID'");
      return mysqli_affected_rows($koneksi);
 }
  

 ?>