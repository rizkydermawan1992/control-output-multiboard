<?php 

//Simpan dengan nama file proses.php
require "koneksidb.php";

	if(isset($_GET['state']) OR isset($_GET["id"])){
	 	  $ID       = $_GET["id"];
		  $state    = $_GET['state'];
      $data     = query("SELECT * FROM tabel_kontrol WHERE ID = '$ID'")[0];
          if ($data["TYPE"] == "Active Low") {
              if ($state == 1) {
                  $state = 0;
              }
              else{
                  $state = 1;
              }
          }
          if ($data["TYPE"] == "Active High") {
              if ($state == 1) {
                  $state = 1;
              }
              else{
                  $state = 0;
              }
          }

		  $sql      = "UPDATE tabel_kontrol SET STATE = '$state' WHERE ID = '$ID'";
		  $koneksi->query($sql);	  
                  
	 }
        
      //proses output device
       if(isset($_GET["board"])) {
       	  $board = $_GET["board"];
       	  $data   = query("SELECT * FROM tabel_kontrol");
       	 
       	  foreach ($data as $row) {
       	     if($board == $row["BOARD"]){
	            $json[$row["GPIO"]] = $row["STATE"];
	       	  }
       	  }
     
       	  $result = json_encode($json);
	        echo $result;

       }
        
 ?>