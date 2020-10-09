<?php

require "template.php";

$data = query("SELECT * FROM tabel_kontrol");


if(isset($_POST["simpan"]))  {
    if( tambahOutput($_POST) > 0 ) {

            echo "
                 <script> 
                  Swal.fire({ 
                  title: 'BERHASIL',
                  text: 'Device baru telah disimpan',
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
            text: 'Device baru gagal disimpan', 
            icon: 'warning', 
            dangerMode: true, 
            buttons: [false, 'OK'], 
            }).then(function() { 
                window.location.href='index.php'; 
            }); 
         </script>
        ";
    }
  } 




?>

<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title></title>
    

  </head>
<body>

<!--  -->
  <center>
    <h4 class="mt-4">CONTROL PANEL</h4>
    <br>

    <button type="button" class="tambah btn" href="#" style="background:#2E8B57; color:white;"data-toggle="modal"data-target="#tambahOutput"><i class="fa fa-plus"></i> Create New Device</button>
    <a href="gpio.php" class="btn btn-primary"><i class="fa fa-cog"></i> GPIO</a>

        <div class="table table-responsive-sm mt-3">
            <table class="table table-bordered table-hover table-striped" style="width:48rem;">
               <tr class="bg-dark text-white text-center">
                  <th>Switch</th>
                  <th>Device</th>
                  <th>Board</th>
                  <th>GPIO</th>
                  <th>Type</th>
                  <th>Log Time</th>
                  <th>Action</th>
               </tr>
               <?php foreach ($data as $row) :?>
                 <tr>
                    <td class="text-center"> 
                      <?php 
                      // Active High
                      if ($row["TYPE"] == "Active High") {
                           if($row["STATE"] == 0) { //unchecked = OFF
                               echo '<input type="checkbox" id ='.$row["ID"].' onchange="sendData(this)" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">';
                             }
                            else { //checked = ON
                                echo '<input type="checkbox" checked id ='.$row["ID"].' onchange="sendData(this)" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">';
                            }
                      }
                      // Active Low
                      if ($row["TYPE"] == "Active Low") {
                           if($row["STATE"] == 1) { //unchecked = OFF
                               echo '<input type="checkbox" id ='.$row["ID"].' onchange="sendData(this)" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">';
                             }
                            else  { //checked = ON
                                echo '<input type="checkbox" checked id ='.$row["ID"].' onchange="sendData(this)" data-toggle="toggle" data-onstyle="primary" data-offstyle="danger">';
                            }
                      }
                        

                      ?>
                    </td>
                    <td><?=$row["DEVICE"];?></td>
                    <td class="text-center"><?=$row["BOARD"];?></td>
                    <td class="text-center"><?=$row["GPIO"];?></td>
                    <td class="text-center"><?=$row["TYPE"];?></td>
                    <td class="text-center"><?=$row["LOGTIME"];?></td>
                    <td class="text-center">
                       <a class="ubah btn btn-success btn-sm" href="ubahdevice.php?ID=<?=$row["ID"];?>"><i class="fa fa-edit"></i></a>
                       <a class="hapus btn btn-danger btn-sm alert_hapus" href="hapusOutput.php?ID=<?=$row["ID"];?>"><i class="fa fa-trash"></i></a>
                    </td>
                 </tr>
               <?php endforeach; ?>
            </table>
        </div>

        <!-- Modal Tambah Device -->
<div class="modal fade" id="tambahOutput" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">CREATE NEW DEVICE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="index.php" method="post">
         <div class="modal-body">
              <div class="form-group">
                  <input class="form-control" name="DEVICE" type="text" autocomplete="off" placeholder="Device Name"><br>
                  <input class="form-control" name="BOARD" type="text" autocomplete="off" placeholder="Board" required><br>
                  <input class="form-control" name="GPIO" type="text" autocomplete="off" placeholder="GPIO" required><br>
                  <p>Output Type:</p>
                  <div class="row px-6">
                            <div class="col">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="TYPE" value="Active High" required>
                                <label class="form-check-label">Active High</label>
                              </div>
                            </div>
                            <div class="col">
                               <div class="form-check">
                                  <input class="form-check-input" type="radio" name="TYPE" value="Active Low" required>
                                  <label class="form-check-label">Active Low</label>
                              </div>
                            </div>
                          </div>          
            </div>  
      </div>
      <div class="modal-footer">
        <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" name="reset" class="btn text-white" style="background: blue"><i class="fa fa-sync-alt"></i> Reset</button>
        <button type="button" class=" btn btn-danger" data-dismiss="modal"> <i class="fa fa-undo"></i> Batal</button>
      </div>
     </form>
    </div>
  </div>
</div>

      <script>
          //send data
           function sendData(e){
              var xhr = new XMLHttpRequest();
                  if(e.checked){
                    xhr.open("GET", "proses.php?id="+e.id+"&state= 1", true);
                  }
                  else{
                    xhr.open("GET", "proses.php?id="+e.id+"&state= 0", true);
                  }
                xhr.send();
              }
      </script>


</body>
</html> 
