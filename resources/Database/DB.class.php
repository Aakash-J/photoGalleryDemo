<?php
error_reporting(E_ERROR | E_PARSE);
require_once('SiteConfigVars.php');
    class DB{
        private $dbh;

        function __construct(){
        try
        {



           $dbhost = getConfigValue('dbHost_w_cascade');
			$dbuser  = 'w-cascade';
			$dbpass = getConfigValue('dbPass_w_cascade');
			$dbname = 'w_cascade';
					
            $this->dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

                     $this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                     }

                     catch(PDOException $e) {
						 echo $e;
                     }

        }


   function getUserId($userName){

		$stmt = $this->dbh->prepare("SELECT userId FROM UserDetails where email = :userName");
					$stmt->execute(array(':userName' => $userName));
					$result = $stmt->fetchALL(PDO::FETCH_ASSOC);
		 return $result;

	}

	function uploadImages($file_name,$userName)	{
        
		$result =  $this->getUserId($userName);
		
		 foreach ($result as $row) {

				 $userId = $row['userId'];
			}

		$stmt = $this->dbh->prepare( "insert into tbl_images(userId,fileName) VALUES(:userId,:file_name)");
		$stmt->bindparam(':userId', $userId);
		$stmt->bindparam(':file_name', $file_name);
		$stmt->execute();
		return $stmt->rowCount();
	}
	
	function getAlbumImage($userId,$fileName){
		
		
		
		

		$stmt = $this->dbh->prepare("SELECT * FROM tbl_images where userId = :userId and fileName = :fileName");
					$stmt->execute(array(':userId' => $userId,':fileName' => $fileName));
					$result = $stmt->fetchALL(PDO::FETCH_ASSOC);
		 foreach ($result as $row) {

			return	 $photoId = $row['photoId'];
			}
         
	}
	
	
function uploadAlbumImages($file_name,$userName,$albumId)	{
        
		$result =  $this->getUserId($userName);
		
		 foreach ($result as $row) {

				 $userId = $row['userId'];
			}

		$stmt = $this->dbh->prepare( "insert into tbl_images(userId,fileName) VALUES(:userId,:file_name)");
		$stmt->bindparam(':userId', $userId);
		$stmt->bindparam(':file_name', $file_name);
		$stmt->execute();
		
		$photoId = $this->getAlbumImage($userId,$file_name);
		
		
		$stmt = $this->dbh->prepare( "insert into AlbumImages(albumId,photoId,userId) VALUES(:albumId,:photoId,:userId)");
		$stmt->bindparam(':userId', $userId);
		$stmt->bindparam(':photoId', $photoId);
		$stmt->bindparam(':albumId', $albumId);
		$stmt->execute();
		
		return $stmt->rowCount();
	}


    function getImages($userName){
		try {
		
		$result =  $this->getUserId($userName);
		
	 if(count($result) != 0){
		
		foreach ($result as $row) {

				 $userId = $row['userId'];
			}
				}
		$stmt = $this->dbh->prepare("SELECT * FROM tbl_images where userId = :userId");
					$stmt->execute(array(':userId' => $userId));
					$result = $stmt->fetchALL(PDO::FETCH_ASSOC);
		 return $result;
		 } catch (Exception $e) {
    echo "No Photos";
} 

	}
	
	function getAlbumImages($userName,$albumId){
		
		$result =  $this->getUserId($userName);
		
		 if(count($result) != 0){
		
		 foreach ($result as $row) {

				 $userId = $row['userId'];
			}
				

	 if($userId != ""){
	 
		$stmt = $this->dbh->prepare("SELECT t.fileName,t.photoId,al.albumName FROM AlbumImages a inner join tbl_images t inner join Albums al where al.albumId = a.albumId and a.photoId = t.photoId and a.userId = :userId and a.albumId = :albumId");
					$stmt->execute(array(':userId' => $userId,':albumId' => $albumId));
					$result = $stmt->fetchALL(PDO::FETCH_ASSOC);
		 return $result;
		 
	 }
}
	}
	
	
	
	
	function getAlbums($userName){
		
		$result =  $this->getUserId($userName);
		
		 foreach ($result as $row) {

				 $userId = $row['userId'];
			}

		$stmt = $this->dbh->prepare("SELECT * FROM Albums where userId = :userId");
					$stmt->execute(array(':userId' => $userId));
					$result = $stmt->fetchALL(PDO::FETCH_ASSOC);
		 return $result;

	}
	
	
		function getAlbumById($albumId){
		
			$stmt = $this->dbh->prepare("SELECT * FROM Albums where albumId = :albumId");
					$stmt->execute(array(':albumId' => $albumId));
					$result = $stmt->fetchALL(PDO::FETCH_ASSOC);
		 return $result;

	}

		// Check for existing email

		function checkEmail($email) {

			$stmt = $this->dbh->prepare("select * from UserDetails where email = :email");
			$stmt->execute(array(':email' => $email));
			return count($stmt->fetchAll());

		}
		
        // Validate User

		function validateUser($email,$password) {

			$stmt = $this->dbh->prepare("select * from UserDetails where email = :email and password = :password");
			$stmt->execute(array(':email' => $email,':password' => $password));
			return count($stmt->fetchAll());

		}

		
	   // Add new album

	    function addAlbum($albumName,$userName) {
			
			$result =  $this->getUserId($userName);
		
		 foreach ($result as $row) {

				 $userId = $row['userId'];
			}

			$stmt = $this->dbh->prepare("INSERT INTO Albums(albumName,userId) VALUES(:albumName,:userId)");
			$stmt->execute(array(':albumName' => $albumName,':userId' => $userId));
			return $stmt->rowCount();


		}

       // Add member

	    function insertUserDetails($firstName,$lastName,$email,$password) {

			$stmt = $this->dbh->prepare("INSERT INTO UserDetails(email,firstName,lastName,password) VALUES(:email,:firstName,:lastName,:password)");
			$stmt->execute(array(':email' => $email,':firstName' => $firstName, ':lastName' => $lastName, ':password' => $password));
			return $stmt->rowCount();


		}






		
		// Delete Image

		function deleteImage($id,$fileName) {

			$fileName = str_replace('"','',$fileName);

            $dir = "../../imageUpload3";

                         unlink($dir.'/'.$fileName);

			 $dir = "../../gcatch";

			 unlink($dir.'/'.$fileName);


            $stmt = $this->dbh->prepare("delete from AlbumImages where photoId = :id");
			$stmt->execute(array(':id' => $id));

		    


			$stmt = $this->dbh->prepare("delete from tbl_images where photoId = :id");
			$stmt->execute(array(':id' => $id));

		     return $stmt->rowCount();


		}
		
		function deleteAlbum($id){
			
			$stmt = $this->dbh->prepare("SELECT * FROM AlbumImages where albumId = :albumId");
					$stmt->execute(array(':albumId' => $id));
					$result = $stmt->fetchALL(PDO::FETCH_ASSOC);
		echo $id;
		    foreach ($result as $row) {

				 $photoId = $row['photoId'];
				 
				 $stmt = $this->dbh->prepare("delete from AlbumImages where photoId = :photoId");
			    $stmt->execute(array(':photoId' => $photoId));
				
				 $stmt1 = $this->dbh->prepare("delete from tbl_images where photoId = :photoId");
			     $stmt1->execute(array(':photoId' => $photoId));

			}

			 
			 $stmt2 = $this->dbh->prepare("delete from Albums where albumId = :albumId");
			 $stmt2->execute(array(':albumId' => $id));
		
		     return $stmt->rowCount();
			
			
		}

	}

	   

	?>