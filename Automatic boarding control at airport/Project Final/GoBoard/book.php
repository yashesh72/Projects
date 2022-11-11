<html>
<head>
	<title>Reservation Flight</title>
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
<script type="text/javascript">

		/*	function display() {

     document.getElementById("return_date").readOnly = false;
        }
    function hide() {

    document.getElementById("return_date").readOnly = true;

	}*/
	function hidesrt(select){
		var selectedOption = select.options[select.selectedIndex];
		if(selectedOption.value=="One way Trip")
		{
			document.getElementById("return_date").readOnly = true;
		}
		else {
				document.getElementById("return_date").readOnly = false;
		}

	}

</script>
<?php
            $from = $_POST['from'];
            $to = $_POST['to'];
            $depart_date = $_POST['depart_date'];
            $class = $_POST['class'];
?>
<!---Header File-->
<?php include('header.php'); ?>
<hr>
<div class="container">
<?php
    echo "<h2> Welcome " .$_SESSION['email']. ".</h2><br>";
?>
 <form method = "post" class="form-horizontal"  action="list.php">

 <div class="form-group">
    <label class="control-label col-sm-2" for="tt">Trip Type:</label>
      <div class="col-sm-10">
            <select class="custom-select" id="tt" name="tt" onchange="hidesrt(this)">
						<option value="Round Trip">Round Trip</option>
            <option value="One way Trip">One way Trip</option>

            </select>

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
      <label style="display:block" class="control-label col-sm-2" for="date" id="label0">Depart date:</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="depart_date"  id="depart_date" placeholder="Pick a date" required>
      </div>
    </div>

    <div class="form-group">
      <label style="display:block" class="control-label col-sm-2" for="date" id="label1">Return date:</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="return_date"  id="return_date" placeholder="Pick a date" required>
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
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="Show">Show</button>
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
        <a class="btn btn-primary" href="flight.php" role="button">Close</a>
      </div>
    </div>
</form>
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
