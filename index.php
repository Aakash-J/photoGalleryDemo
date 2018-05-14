<?php
session_start();

require_once ("resources/Database/DB.class.php");
$db= new DB();




$_SESSION['username'] = $_COOKIE['username'];

if(isset($_COOKIE['username'])) {
	
	?>

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


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<style>


 </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top"	>

  <!-- Navigation-->

<?php
include 'resources/templates/navbar.php';

?>



  <div class="content-wrapper">
    <div class="container-fluid">

<script type="text/javascript" src="https://www.wikplayer.com/code.js"
data-config="{'skin':'skins/wikfull/funkyOrange/skin.css','volume':78,'autoplay':true,'shuffle':false,'repeat':1,'showcomment':false,'marqueetexton':true,'placement':'top','showplaylist':false,'playlist':[{'title':'Waka%20Waka','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DpRpeEdMmmQ0'},{'title':'Baby%20ft.%20Ludacris','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DkffacxfA7G4'},{'title':'Back%20To%20You%20','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DulNswX3If6U'},{'title':'Just%20The%20Way%20You%20Are','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DLjhCEhWiKXk'},{'title':'Let%20Her%20Go','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DdT4A3rttrs8'},{'title':'Say%20You%20Won%27t%20Let%20Go','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D0yW7w8F2TVA'},{'title':'Shape%20of%20You','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DJGwWNGJdvx8'},{'title':'Thinking%20Out%20Loud%20','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3Dlp-EO5I60KA'},{'title':'Too%20Good%20At%20Goodbye','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DJ_ub7Etch2U'},{'title':'Waka%20Waka','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DpRpeEdMmmQ0'},{'title':'%20Boyzone%20-%20Words','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3Dw_Rut4qm33g'},{'title':'All%20of%20Me','url':'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DR21EU8SKUM0'}]}" ></script>






<?php
//echo "<h6>Welcome, {$_SERVER['givenName']} {$_SERVER['sn']}</h6>";
?>


<?php
define('viewPhotos', 'viewPhotos');
define('viewAlbums', 'viewAlbums');
define('photoAlbum', 'photoAlbum');
define('logout', 'logout');

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case viewPhotos:
            include 'resources/templates/viewPhotos.php';
        break;
        case viewAlbums:
            include 'resources/templates/viewAlbums.php';
        break;
        case logout:
            include 'logout.php';
        break;
        case photoAlbum:
            include 'resources/templates/photoAlbum.php';
        break;
     }
} else {
    include 'resources/templates/viewPhotos.php';
}
?>

<?php

include 'resources/templates/confirmationModals.php';
?>
  <br />

  <br />

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">

          <small>Copyright © Aakash Jain. All Rights Reserved</small>
        </div>
      </div>
    </footer>

	  </div>
 </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php?page=logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

</body>
<?php
}
else {
	
 echo "<script language='javascript' type='text/javascript'> location.href='login.php' </script>";
}

?>