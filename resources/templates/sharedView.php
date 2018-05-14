 <?php
	require_once ("resources/Database/DB.class.php");
	$db= new DB();


		// Get Album images
          $images =  $db->getAlbumImages($_GET['userName'],$_GET['id']);
          $albumName =  $db->getAlbumById($_GET['id']);

 ?>


<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
				event.preventDefault();
                $(this).ekkoLightbox();
            });



</script>
<br />




<hr class="style18"><br>

<div class="row justify-content-center ">
    <div class="col-md-12">
        

	<?php
	
	
	
	     foreach ($albumName as $row) {
	
	     
		 echo '<h2>'.$row['albumName'] .'</h2>';
		 
		 
		 }
		 
		 
	         $count  = 0;
			  foreach ($images as $row) {

				  if($count == 0){
					  echo ' <div class="row justify-content-center">';

				  }

				  $fileName = $row['fileName'];
				   echo '<div> <a href= "imageUpload3/'.$row['fileName']. '" data-toggle="lightbox" data-max-width="900" data-max-height="620" data-gallery="example-gallery" class="col-sm-3">
				   <img src= "gcatch/'.$row['fileName']. '" class="img-fluid " width= "200" height = "100"> </a></div>
            ';

			$count ++;

			 if($count % 4 == 0) {

					echo '</div> <div class="row  justify-content-center">';

				  }

			}
			echo '</div>';

	?>



    </div>
</div>


