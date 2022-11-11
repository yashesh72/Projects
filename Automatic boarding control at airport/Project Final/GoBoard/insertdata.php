<html>
<head>
	<title>Insert Data</title>
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
         if(isset($_POST['rate'])) {
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);

            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            if(! get_magic_quotes_gpc() ) {
               $fname = addslashes ($_POST['fname']);
               $fno  = addslashes ($_POST['fno']);
            }else {
               $fname = $_POST['fname'];
               $fno = $_POST['fno'];
            }

            $cname = $_POST['cname'];
            $from = $_POST['from'];
            $to = $_POST['to'];
            $time = $_POST['time'];
            $date = $_POST['date'];
            $class= $_POST['class'];
            $rate = $_POST['rate'];
						$B_time=$_POST['B_time'];
						$Gate=$_POST['Gate'];

            $sql = "INSERT INTO flight ". "(Flight_Name ,Flight_No ,Company_Name ,From_Loc ,To_Loc ,Time ,Date ,B_time,Gate,Class ,Rate) ". "VALUES('".$fname."','".$fno."','".$cname."','".$from."','".$to."','".$time."','".$date."','".$B_time."','".$Gate."','".$class."','".$rate."')";

            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );

            if(! $retval ) {
               /*die('Could not enter data: ' . mysql_error());*/
              echo '<script language="javascript">';
              echo 'alert("Insert not successfully.(DUPLICATE DATA)")';
              echo '</script>';
              echo "<script> location.href='insertdata.php'; </script>";
            }
              echo '<script language="javascript">';
              echo 'alert("Insert successfully.")';
              echo '</script>';
              echo "<script> location.href='insertdata.php'; </script>";
            mysql_close($conn);
         }else{
            ?>
<!---Header File-->
<?php include('header.php'); ?>
<hr>
<div class="container">
  <h2>Insert Flight Record:</h2>
  <form method = "post" class="form-horizontal"  action="<?php $_PHP_SELF ?>">

    <div class="form-group">
      <label class="control-label col-sm-2" for="fname">Flight Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fname" name="fname" title="Enter valid Flight Name" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="fno">Flight No:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fno" name="fno" title="Enter valid Flight No" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="cname">Company Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="cname" name="cname" title="Enter valid Flight No" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="from">From:</label>
      <div class="col-sm-10">
        <select class="custom-select" id="from" name="from" placeholder="From" required>
              <?php
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);

            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            $sql = "select * from city";

            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );
            while($row = mysql_fetch_array($retval))
            {
              echo "<option value=".$row[0].">".$row[0]."</option>";
            }

            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            mysql_close($conn);
            ?>
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="to">To:</label>
      <div class="col-sm-10">
        <select class="custom-select" id="to" name="to" placeholder="To" required>
         <?php
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);

            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            $sql = "select * from city";

            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );
            while($row = mysql_fetch_array($retval))
            {
              echo "<option value=".$row[0].">".$row[0]."</option>";
            }

            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            mysql_close($conn);
            ?>
              </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="time">Time:</label>
      <div class="col-sm-10">
        <input type="time" class="form-control" id="time" name="time" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="date">Date:</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="date" name="date" required>
      </div>
    </div>

		<div class="form-group">
      <label class="control-label col-sm-2" for="date">Board Time:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="B_time" name="B_time" required>
      </div>
    </div>

		<div class="form-group">
      <label class="control-label col-sm-2" for="date">Gate Number:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Gate" name="Gate" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="class">Class:</label>
      <div class="col-sm-10">
            <select class="custom-select" id="class" name="class">
            <option value="Bussiness class" selected>Bussiness class</option>
            <option value="Economy class">Economy class</option>
            </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="rate">Rate:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="rate" name="rate" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Insert</button>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="reset" class="btn btn-primary" id="reset">Reset</button>
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
<div class="container">
<?php
         if(isset($_POST['city'])) {
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);

            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            $city = $_POST['city'];

            $sql = "INSERT INTO city ". "(City) ". "VALUES('".$city."')";

            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );

            if(! $retval ) {
               /*die('Could not enter data: ' . mysql_error());*/
              echo '<script language="javascript">';
              echo 'alert("Insert not successfully.(DUPLICATE DATA)")';
              echo '</script>';
              echo "<script> location.href='insertdata.php'; </script>";
            }
              echo '<script language="javascript">';
              echo 'alert("Insert successfully.")';
              echo '</script>';
              echo "<script> location.href='insertdata.php'; </script>";
            mysql_close($conn);
         }
            ?>
  <h2>Insert City Record:</h2>
  <form method = "post" class="form-horizontal"  action="<?php $_PHP_SELF ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="city">City Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="city" name="city" required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Insert</button>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="reset" class="btn btn-primary" id="reset">Reset</button>
      </div>
    </div>

      <br>
      <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <a class="btn btn-primary" href="mangesite.php" role="button">Close</a>
      </div>
    </div>

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
