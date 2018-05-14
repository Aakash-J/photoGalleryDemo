<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Photo Gallery Demo</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="js/libFunctions.js"></script>
      <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.css"/>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

<style>


 </style>
</head>

<body class="fixed-nav sticky-footer " id="page-top"	>





 <?php
	require_once ("resources/Database/DB.class.php");
	$db= new DB();


		// Get Album images
          $images =  $db->getAlbumImages($_GET['userId'],$_GET['id']);
          $albumName =  $db->getAlbumById($_GET['id']);

 ?>


<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
				event.preventDefault();
                $(this).ekkoLightbox();
            });



</script>
<br />






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
				   <img src= "gcatch/'.$row['fileName']. '" class="img-fluid img-thumbnail" width= "200" height = "100"> </a></div>
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

</body>

 