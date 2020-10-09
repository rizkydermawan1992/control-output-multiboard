<?php

require "template.php";
	  
	if(isset($_POST["simpan"]) ) {
	   if( ubahDevice($_POST) > 0 ) {
		echo "
			 <script>
				  Swal.fire({ 
                  title: 'SELAMAT',
                  text: 'Perubahan data device telah disimpan',
                  icon: 'success', buttons: [false, 'OK'], 
                  }).then(function() { 
                  window.location.href='index.php'; 
                  }); 
			 </script>
		";
	   }
	   else {
	    echo "
         <script> 
         Swal.fire({ 
            title: 'OOPS', 
            text: 'Data device gagal disimpan', 
            icon: 'warning', 
            dangerMode: true, 
            buttons: [false, 'OK'], 
            }).then(function() { 
                window.location.href='controlling.php'; 
            }); 
         </script>
        ";
	   }
	 }


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>

    <?php 
        if(isset($_GET["ID"])){
      $ID       = $_GET["ID"];
      $data     = query("SELECT * FROM tabel_kontrol WHERE ID = '$ID'")[0];
     ?>
			
    <div class="card mt-4" style="width: 25rem;">
      <div class="card-body">
        <h5 class="card-title">UBAH DATA DEVICE</h5>
          <form action="ubahdevice.php" method="post">
                    <div class="form-group">
                      <input type="text" name="ID"  class="form-control" value="<?=$data["ID"];?>" hidden ><br>
                      <input type="text" name="DEVICE"  class="form-control" placeholder="Device Name" autocomplete="off" value="<?=$data["DEVICE"];?>" ><br>
                      <input type="text" name="BOARD"  class="form-control" placeholder="Board" autocomplete="off" value="<?=$data["BOARD"];?>" ><br>
                      <input type="text" name="GPIO"  class="form-control" placeholder="GPIO" autocomplete="off" value="<?=$data["GPIO"];?>" ><br>

                       <div class="row">
                        <?php if($data["TYPE"] == "Active High") {
                            echo '
                                  <div class ="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="TYPE" value="Active High" checked="checked">
                                        <label class="form-check-label">Active High</label>
                                    </div>
                                  </div>
                                  <div class ="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="TYPE" value="Active Low">
                                        <label class="form-check-label">Active Low</label>
                                    </div>
                                  </div>
                                ';}

                                    else if($data["TYPE"] == "Active Low") {
                            echo '
                                  <div class ="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="TYPE" value="Active High">
                                        <label class="form-check-label">Active High</label>
                                    </div>
                                  </div>
                                  <div class ="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="TYPE" value="Active Low" checked="checked">
                                        <label class="form-check-label">Active Low</label>
                                    </div>
                                  </div>
                                ';}
                        ?>
                       </div>
                       <br>

                         <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                         <a href="index.php" name="batal" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</a> 
                    </div>
                  </form>
      </div>
    </div>
  <?php   } ?>

 </center>
    
   

</body>
</html>


