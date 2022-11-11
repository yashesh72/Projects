<html>
<head>
	<title>Show Data</title>
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
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            $sql = "select * from signup";
  
            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );
     
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            mysql_close($conn);
            ?> 
<!---Header File-->
<?php include('header.php'); ?> 
<hr>
<div class="container">
  <h2>Information of registed user:</h2>
  <?php
  if (mysql_num_rows($retval) <= 0) 
  {?>    
    <h3 align="center">!!!NO Record Found!!!!</h3>
  <?php
  }
  else{ 
  ?> 
    <h3 align="center">Signup DataBase Display</h3>
    <table align="center" border='1' class="table table-striped">
      <thead>
            <tr align='center'>
              <th scope="col">Email</th>
              <th scope="col">ContactNo</th>
              <th scope="col">Address</th>
            </tr>
      </thead>
  <tbody> 
            <?php
              while($row = mysql_fetch_array($retval))
              { 
                echo "<tr align='center'>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "</tr>";
              }
            }
              ?>
              <br>
       </tbody>
</table>
      <br>
      <form method = "post" class="form-horizontal"  action="<?php $_PHP_SELF ?>">
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
</body>
</html>