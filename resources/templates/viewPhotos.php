 <?php
	require_once ("resources/Database/DB.class.php");
	$db= new DB();


		// Get images
          $images =  $db->getImages($_SESSION['username']);

	require_once ("resources/templates/addPhotos.php");
 ?>



<?php

    if(isset($_GET['msg'])){

   if($_GET['msg'] == "success"){
	   echo '<div class="alert alert-success alert-dismissible" id="alertAdd">
								 <a href="index.php?page=viewPhotos" class="close" aria-label="close">&times;</a>
								<strong>Photos added Successfully!</strong>
							  </div>';
	   unset($_GET['msg']);
	   
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
<br />


                            <div class="col-md-10">

                                    <form action="#" method="post" enctype="multipart/form-data" name="upload">


                                        <div class="form-group">
                                            <strong><label>Image</label></strong>
                                            <input type="file" name="upload1[]" multiple id="upload" />


                                        </div>

                                        <button type="submit" class="btn btn-primary" name="submit">Upload</button>

                                    </form>

                                </div>


<hr class="style18"><br>

<div class="row justify-content-center ">
    <div class="col-md-12">



	<?php
	         $count  = 0;
			 
			echo '<h2> All Photos </h2>';
			  foreach ($images as $row) {

				  if($count == 0){
					  echo ' <div class="row justify-content-center">';

				  }

				  $fileName = $row['fileName'];
				   echo '<div> <a href= "imageUpload3/'.$row['fileName']. '" data-toggle="lightbox" data-max-width="900" data-max-height="620" data-gallery="example-gallery" class="col-sm-3">
				   <img src= "gcatch/'.$row['fileName']. '" class="img-fluid img-thumbnail" width= "200" height = "100"> </a> <br><div align="center"> <a href="javascript:deleteImageModal('.$row['photoId'] . ',JSON.stringify(\''.$fileName.'\'))" <i class="fa fa-trash" style="color:red;"> Delete</i></a></div></div>
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


