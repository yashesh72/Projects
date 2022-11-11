<html>
<head>
	<title>Flight</title>
</head>
<style type="text/css">
  h2
  {
    color: #003284;
  } 
</style>
<body>
<?php
session_start();
if($_SESSION['email']==""&&$_SESSION['pwd']=="")
{
 ?>
<script type="text/javascript">
window.location="login.php";  
</script>
<?php 
}
?>
<!---Header File-->
<?php include('header.php'); ?>
<hr>
<div class="container">
<?php
    echo "<h2> Welcome " .$_SESSION['email']. ".</h2><br>";
?>
  <hr><br><h2>Book Flight:</h2>
  <form method = "post" class="form-horizontal"  action="<?php $_PHP_SELF ?>">
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <a class="btn btn-primary" href="book.php" role="button" value="Book Flight">Book Flight</a>
      </div>
    </div><br><hr>
    <hr><br><h2>Cancel Flight:</h2>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <a class="btn btn-primary" href="cancel.php" role="button" value="Cancel Flight">Cancel Flight</a>
      </div>
    </div><br><hr>
  </form>
</div>
<hr>
<!-- Footer bar-->
<footer class="footer footer-transparent">
    <!-- Footer Links -->
    <div class="container text-center text-md-left">
      <!-- Footer links -->
      <div class="row text-center text-md-left mt-3 pb-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">ARS</h6>
          <p style="text-align:justify">Airline Reservation System provides options for viewing different flights available with different timings for a particular date and provides customers with the booking facility.</p>
        </div>
        <!-- Grid column -->
        <hr class="w-100 clearfix d-md-none">
        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Company</h6>
          <p>
            <a href="aboutus.php">About Us</a>
          </p>
          <p>
            <a href="contactus.php">Contact Us</a>
          </p>
          <p>
            <a href="t&c.php">Terms & Condition</a>
          </p>
          <p>
            <a href="help.php">Help</a>
          </p>
        </div>
        <!-- Grid column -->
        <hr class="w-100 clearfix d-md-none">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Account</h6>
          <p>
            <a href="register.php">Register</a>
          </p>
          <p>
            <a href="logout.php">Log Out</a>
          </p>
        </div>
        <!-- Grid column -->
      <!-- Grid row -->
      <div class="row d-flex align-items-center">
   </div>
    <!-- Footer Links -->
</div>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">Copyright&copy; 2019 All Rights Reserved: ARS
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer bar-->
</body>
</html>