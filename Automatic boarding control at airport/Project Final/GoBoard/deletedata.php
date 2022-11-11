<html>
<head>
	<title>Delete Data</title>
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
window.location="alogin.php";  
</script>
<?php 
}
?>
      <?php
         if(isset($_POST['fno']) && !empty($_POST['fno']))
         {
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            $fno = $_POST['fno'];

            $sql = "DELETE FROM flight WHERE Flight_No='$fno'";
            $sql1 = "SELECT * FROM flight WHERE Flight_No='$fno'";
    
            mysql_select_db('test_db');
            $ret = mysql_query($sql1, $conn);
            $retval = mysql_query( $sql, $conn );

            if (mysql_num_rows($ret) > 0) 
            {
                echo '<script language="javascript">';
                echo 'alert("Deleted Sucessfully...")';
                echo '</script>';
                echo "<script> location.href='deletedata.php'; </script>"; 
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Data Not Found.....")';
                echo '</script>';
                echo "<script> location.href='deletedata.php'; </script>"; 
               //die('Data Not Found.. ' . mysql_error());
            }
            mysql_close($conn);
         }else{
            ?> 
<!---Header File-->
<?php include('header.php'); ?> 
<hr>
<div class="container">
  <h2>Delete Flight Record:</h2>
  <form method = "post" class="form-horizontal"  action="<?php $_PHP_SELF ?>">
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="fno">Flight No:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="fno" name="fno" title="Enter valid Flight No" required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
    </div>
      <br>
      <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <a class="btn btn-primary" href="mangesite.php" role="button">Close</a>
      </div> 
    </div>
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
            <a href="alogout.php">Log Out</a>
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
  <?php } ?>
</body>
</html>