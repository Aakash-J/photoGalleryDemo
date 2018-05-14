<?php  

require_once ("resources/Database/DB.class.php");
$db= new DB();
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' ) {

		// Check if email address already exists
            if ($db->checkEmail($_POST['email']) > 0 )
			{

			echo '<div class="alert alert-success alert-dismissible">
								 <a href="register.php" class="close" aria-label="close">&times;</a>
								<strong>Email Address already in use!</strong>
							  </div>';

			}
			else {

			if ($db->insertUserDetails($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['password']) > 0 ) {

					echo '<div class="alert alert-success alert-dismissible">
								 <a href="register.php" class="close" aria-label="close">&times;</a>
								<strong>User registered Successfully!!</strong>
							  </div>';
			}

			}

	}


?>







<html lang="en">

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
        background: rgba(122, 130, 136, 0.5)!important;
    }

    .panel-transparent .panel-body{
        background: rgba(46, 51, 56, 0.5)!important;
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

      <div class="card-register mx-auto mt-5  panel-primary panel-transparent">
        <div>
         
        </div>
        <div>
          <form action="#" method="post">
            <div class="form-group">
            
                <div class="col-md-6">
                 
                  <input type="text"  class="form-control" name="firstName"  placeholder="First Name" required>
                </div> <br>
                <div class="col-md-6">
                 
                  <input type="text"  class="form-control" name="lastName"  placeholder="Last Name" required>
                </div> <br>
            
			
                <div class="col-md-6">
                 
                  <input type="email"  class="form-control" name="email"  placeholder="Email" required>
                </div> <br>
                <div class="col-md-6">
                 
                  <input minlength="8" type="password" class="form-control" name="password"  placeholder="Password" required>
                </div> <br>
              
            </div >
			  <div class="col-md-6">
              <input type="submit" value= "Register" class="btn btn-primary btn-block"><br>
			  <strong><a class="btn btn-warning" href="login.php">Login</a></strong>
			   </div> <br>
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
