<?php  

require_once ("resources/Database/DB.class.php");
$db= new DB();

setcookie("username", "", time() - (86400 * 30), "/"); 

if($_SERVER['REQUEST_METHOD'] == 'POST' ) {

		// Check if email address already exists
            if ($db->validateUser($_POST['email'],$_POST['password']) > 0 )
			{
				 $username = $_POST['email'];
				 
				 
				 $cookie_name = "username";
				 $cookie_value =  $username;
				 
				
				 
				 setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
									 
				 
				 
				 
				 
				 
				 
				 session_start();
                 $_SESSION['username'] = $username;  
				 
				session_write_close();
				$url = "index.php";
		       	header("Location: index.php");
					exit;
				
					
					  var_dump($_SESSION);
					
		//  echo "<script language='javascript' type='text/javascript'> location.href='index.php' </script>";
		
		
			echo '<div class="alert alert-success alert-dismissible">
								 <a href="index.php" class="close" aria-label="close">&times;</a>
								<strong>Login Successfull!</strong>
							  </div>';

			}
			else {


					echo '<div class="alert alert-success alert-dismissible">
								 <a href="login.php" class="close" aria-label="close">&times;</a>
								<strong>Invalid Email or Password!!</strong>
							  </div>';
			

			}

	}


?>
<html>

  <head>

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
  
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>



	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
 <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
		<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
	<style>
	
	 .panel-transparent {
        background: none;
    }

    .panel-transparent .panel-heading{
        background: rgba(122, 130, 136, 0.1)!important;
    }

    .panel-transparent .panel-body{
        background: rgba(46, 51, 56, 0.1)!important;
    }
	</style>

  </head>

   <body id="page">
   
    <ul class="cb-slideshow">
            <li><span>Image 01</span><div><h3>se·ren·i·ty</h3></div></li>
            <li><span>Image 02</span><div><h3>com·po·sure</h3></div></li>
            <li><span>Image 03</span><div><h3>e·qua·nim·i·ty</h3></div></li>
            <li><span>Image 04</span><div><h3>bal·ance</h3></div></li>
            <li><span>Image 05</span><div><h3>qui·e·tude</h3></div></li>
            <li><span>Image 06</span><div><h3>re·lax·a·tion</h3></div></li>
        </ul>

    <div class="container">

      <div class=" mx-auto mt-5 panel panel-primary panel-transparent">
      
        <div class="card-body">
          <form action="#" method="post">
            <div class="form-group">
             
                <div class="col-md-3">
                 
                  <input type="text"  class="form-control" name="email"  placeholder="Email" required>
                </div><br>
                <div class="col-md-3">
                 
                  <input type="password"  class="form-control" name="password"  placeholder="Password" required>
                </div>
              
			 </div>
			  <div class="col-md-3">
              <input type="submit" value= "Login" class="btn btn-primary btn-block"><br>
			   <strong><a class="btn btn-warning" href="register.php">Register</a></strong>
			  </div>
          </form>



        </div>

      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
