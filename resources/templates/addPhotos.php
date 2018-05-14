 <?php
	require_once ("resources/Database/DB.class.php");
	$db= new DB();
   ini_set('memory_limit', '100M');
   ini_set('upload_max_filesize', '100M');
   ini_set('post_max_size', '100M');
   ini_set('max_execution_time', '600');


$gdate = date('Y-m-d H:i:s');
$status='process';

$rd=rand();
if(isset($_FILES['upload1'])){
    $errors= array();
	foreach($_FILES['upload1']['tmp_name'] as $key => $tmp_name){
		$file_name = $key.$rd.$_FILES['upload1']['name'][$key];
		$file_size =$_FILES['upload1']['size'][$key];
		$file_tmp =$_FILES['upload1']['tmp_name'][$key];
		$file_type=$_FILES['upload1']['type'][$key];

   if($tmp_name == '')
	    continue;

        $desired_dir="imageUpload3";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0777);
            }
            if(is_dir("$desired_dir/".$file_name)==false){

			$tmp_name = str_replace("jpeg","jpg",$tmp_name);
			$file_name = str_replace("jpeg","jpg",$file_name);

			$type = exif_imagetype($tmp_name); // [] if you don't have exif you could use getImageSize()



            ini_set('memory_limit', '-1');

				$allowedTypes = array(
					1,  // [] gif
					2,  // [] jpg
					3,  // [] png
					6   // [] bmp
				);
				if (!in_array($type, $allowedTypes)) {
					return false;
				}
				switch ($type) {
					case 1 :
						$im = imageCreateFromGif($tmp_name);
					break;
					case 2 :
						$im = imageCreateFromJpeg($tmp_name);
					break;
					case 3 :
						$im = imageCreateFromPng($tmp_name);
					break;
					case 6 :
						$im = imageCreateFromBmp($tmp_name);
					break;
				}







			$src = $im;
			list($width,$height)=getimagesize($tmp_name);
			$newwidth= 150;
			$newheight=150;
           $tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			$rd=rand();
			$filename = "gcatch/".$file_name;

			switch ($type) {
					case 1 :
						imagegif($tmp,$filename,100);
					break;
					case 2 :
						imagejpeg($tmp,$filename,100);
					break;
					case 3 :
						imagepng($tmp,$filename,9);
					break;
					case 6 :
						imagebmp($tmp,$filename,100);
					break;
				}




			imagedestroy($src);
			move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;
            }


		 if($db->uploadImages($file_name,$_SESSION['username'])	 > 0)
		 {
			 continue;

		 }

	 else
		{

		echo "error";

        }
    }
	if(empty($errors)){


	}
}
   if($tmp_name != '')
   {
	
							  
    echo "<script language='javascript' type='text/javascript'> location.href='index.php?page=viewPhotos&msg=success' </script>";

   }
}

?>





