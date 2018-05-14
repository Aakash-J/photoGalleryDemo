 <?php
	require_once ("resources/Database/DB.class.php");
	$db= new DB();


		// Get Member details
          $albums =  $db->getAlbums($_SESSION['username']);


	
	
	
     if(isset($_POST['album'])){

  
	 if($db->addAlbum($_POST['album'],$_SESSION['username'])	 > 0)
		 {
			 echo "<script language='javascript' type='text/javascript'> location.href='index.php?page=viewAlbums&msg=success' </script>";

		 }

	 else
		{

		echo "error";

        }
	   
   }

	
	
	
	
	
	
	
	
	
 ?>



<?php

    if(isset($_GET['msg'])){

   if($_GET['msg'] == "success"){
	   echo '<div class="alert alert-success alert-dismissible" id="alertAdd">
								 <a href="index.php?page=viewAlbums" class="close" aria-label="close">&times;</a>
								<strong>Album added Successfully!</strong>
							  </div>';
	   
	   
   }
	}

?>
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
				event.preventDefault();
                $(this).ekkoLightbox();
            });


$("#alertAdd").fadeTo(2000, 500).slideUp(500, function(){
    $("#alertAdd").slideUp(500);
});

</script>
<br><br>
    <div class="col-md-10">
                      <form action="#" method="post">

                         <div class="col-md-9">
                                        <div class="form-group">
										<div class="form-row">
										<div class="col-md-6">
                                            
                                            <input type="text"  class="form-control" name="album"  placeholder="Enter Album Name" required>

											 </div>
																					
										<div class="col-md-3">
											<button type="submit" class="btn btn-primary" name="submit">Add</button>
											</div>  </div>
											 </div>       
							</form>
										</div>
               </div>

								

    


<hr class="style18"><br>

<div class="row justify-content-center ">
    <div class="col-md-12">



	<?php
	         $count  = 0;
			  foreach ($albums as $row) {

				  if($count == 0){
					  echo ' <div class="row">';

				  }

				  $albumName = $row['albumName'];
				  $albumId = $row['albumId'];
				  
  				  
				  
				   echo '<div class="col-md-3">
				    <a href="javascript:deleteAlbumModal('.$row['albumId'] . ')" <i class="fa fa-trash" style="color:red;"> Delete</i></a>&nbsp;&nbsp;<a href="sharedView.php?id='.$albumId.'&userId='.$_SESSION['username'].'" <i class="fa fa-share-alt" style="color:green;"> Share</i></a>
    <div class="thumbnail">
      <a href="index.php?page=photoAlbum&id='.$albumId.'">
        <img src="images/6.jpg" class="img-thumbnail" alt="Lights" style="width:100%">
        <div class="caption"><p><h6>'.$albumName.'</h6></p>
        </div>
      </a>
	 
    </div>
  </div>';

			$count ++;

			 if($count % 4 == 0) {

					echo '</div> <div class="row">';

				  }

			}
			echo '</div>';

	?>



    </div>
</div>


