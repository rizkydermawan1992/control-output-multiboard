$(document).ready(function(){

  
		//real time halaman dashboard.php
				setInterval(function() {
            		$('.dashboard-value').load('dashboard-value.php');
          							}, 100);

		//sweet alert hapus data 
          $('.alert_hapus').on('click',function(e){

                e.preventDefault();
                var getLink = $(this).attr('href');
                Swal.fire({
                        icon : 'warning',
                        title: 'Alert',
                        text: 'Apakah yakin ingin menghapus data ini?',
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,  
                    }).then((result) => {
                       if(result.value == true){
                        document.location.href = getLink;
                    }

            });
                
            });

          //sweet alert logout 
          $('.alert_logout').on('click',function(e){

                e.preventDefault();
                var getLink = $(this).attr('href');
                Swal.fire({
                        icon : 'warning',
                        title: 'Alert',
                        text: 'Apakah yakin ingin logout?',
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,  
                    }).then((result) => {
                       if(result.value == true){
                        document.location.href = getLink;
                    }
            });
            });
                


  });