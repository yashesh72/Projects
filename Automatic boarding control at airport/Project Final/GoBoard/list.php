<html>
<head>
	<title>List of Flight</title>
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
<?php

            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);

            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            $from = $_POST['from'];
            $to = $_POST['to'];
            $depart_date = $_POST['depart_date'];


            /*$sql = " SELECT * FROM flight WHERE From_Loc=".$_SESSION['$from']." AND To_Loc=".$_SESSION['$to']." AND Date=".$_SESSION['$depart_date']." AND Class=".$_SESSION['$class']." ";*/
            $sql = " SELECT * FROM flight WHERE From_Loc='$from' AND To_Loc='$to' AND Date='$depart_date' ";

            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );

            mysql_close($conn);

?>
<div class="container">
  <h2>Show Flight Record:</h2>
  <?php
  if (mysql_num_rows($retval) <= 0)
  {?>
    <h3 align="center">!!!NO Record Found!!!!</h3>
    <br>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <a class="btn btn-primary" href="book.php" role="button">Close</a>
      </div>
    </div>
  <?php
  }
  else{
  ?>
  <h3 align="center">Record Found</h3>
    <table align="center" border='1' class="table table-striped">
      <thead>
            <tr align='center'>
              <th scope="col">Flight_Name</th>
              <th scope="col">Flight_No</th>
              <th scope="col">Company_Name</th>
              <th scope="col">From_Loc</th>
              <th scope="col">To_Loc</th>
              <th scope="col">Time</th>
              <th scope="col">Date</th>
              <th scope="col">Class</th>
              <th scope="col">Rate</th>
							<th scope="col">Book</th>

            </tr>
      </thead>
  <tbody>

</form>
            <?php
              while($row = mysql_fetch_array($retval))
              {

                $fno=$row['Flight_No'];
                $from=$row['From_Loc'];
                $to=$row['To_Loc'];
                $depart_date=$row['Date'];

                echo "<tr align='center'>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "<td>" . $row[5] . "</td>";
                echo "<td>" . $row[6] . "</td>";
                echo "<td>" . $row[9] . "</td>";
                echo "<td>" . $row[10] . "</td>";
                echo "<td><a class='btn btn-primary' href='reserv.php?fno=".$row[1]."&&from=".$row[3]."&&to=".$row[4]."&&time=".$row[5]."&&date=".$row[6]."&&B_time=".$row[7]."&&Gate=".$row[8]."&&rate=".$row[10]."' name='book'>Book</a></td>";
                echo "</tr>";
              }
            }
              ?>
              <br>
       </tbody>
</table>
<br>
<div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <a class="btn btn-primary" href="book.php" role="button">Close</a>
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
          <h6 class="text-uppercase mb-4 font-weight-bold">Goboard</h6>
          <p style="text-align:justify">GoBoard provides options for viewing different flights available with different timings for a particular date and provides customers with the booking facility with Easy boarding facility at airport.</p>
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
