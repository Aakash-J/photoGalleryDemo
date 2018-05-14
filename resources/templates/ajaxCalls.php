<?php


	include_once ("../Database/DB.class.php");
	$db= new DB();




	  	// Delete Image
		   if($_GET['functionName'] == 'deleteImage'){
           $result =  $db->deleteImage($_GET['deleteImage_id'],$_GET['deleteFileName']);

		   header('Location: ../../index.php?page=viewPhotos');

		   }
		   
		// Delete Album
		   if($_GET['functionName'] == 'deleteAlbum'){
           $result =  $db->deleteAlbum($_GET['deleteAlbum_id']);

		   header('Location: ../../index.php?page=viewAlbums');

		   }

  


   ?>



