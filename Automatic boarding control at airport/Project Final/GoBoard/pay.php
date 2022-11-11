<html>
<head>
	<title>Pay</title>
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
session_start();
if(isset($_GET['submit']))
{
	$count=0;
	$dbhost = 'localhost:3306';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);

	if(! $conn ) {
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db('test_db');
	$userid=$_SESSION['email'];
	$fno=$_SESSION['fno'];
	$from=$_SESSION['from'];
	$to=$_SESSION['to'];
	$depart_date=$_SESSION['depart_date'];
	$rate=$_SESSION['rate'];
	$time=$_SESSION['time'];
	$B_time=$_SESSION['B_time'];
	$Gate=$_SESSION['Gate'];

	if(!empty($_GET['pid1']))
	{
		$pid1=$_GET['pid1'];
		$name1=$_GET['uname1'];
		$sex1=$_GET['usex1'];
		$age1=$_GET['uage1'];
	$sql = "INSERT INTO book"." (User_Id ,Passport_Id,Name,Sex,Age,Flight_No ,From_Loc ,To_Loc, Time ,Date ,B_time ,Gate ,Rate  ,Paid)"."
	 VALUES('".$userid."','".$pid1."','".$name1."','".$sex1."','".$age1."','".$fno."','".$from."','".$to."','".$time."','".$depart_date."',
	'".$B_time."','".$Gate."','".$rate."',0)";


	$retval = mysql_query( $sql, $conn );
	$count++;
	if(!retval1)
	{
		 echo "ERROR".mysql_error($con);
	}

}
if(!empty($_GET['pid2']))
{
	$pid2=$_GET['pid2'];
	$name2=$_GET['uname2'];
	$sex2=$_GET['usex2'];
	$age2=$_GET['uage2'];
	$sql2 = "INSERT INTO book"." (User_Id ,Passport_Id,Name,Sex,Age,Flight_No ,From_Loc ,To_Loc, Time ,Date ,B_time ,Gate ,Rate  ,Paid)"."
	 VALUES('".$userid."','".$pid2."','".$name2."','".$sex2."','".$age2."','".$fno."','".$from."','".$to."','".$time."','".$depart_date."',
	'".$B_time."','".$Gate."','".$rate."',0)";
	$count++;
	$retval2 = mysql_query( $sql2, $conn );
	if(!retval2)
	{
		 echo "ERROR".mysql_error($con);
	}
}
if(!empty($_GET['pid3']))
{
	$pid3=$_GET['pid3'];
	$name3=$_GET['uname3'];
	$sex3=$_GET['usex3'];
	$age3=$_GET['uage3'];
	$sql3= "INSERT INTO book"." (User_Id ,Passport_Id,Name,Sex,Age,Flight_No ,From_Loc ,To_Loc, Time ,Date ,B_time ,Gate ,Rate  ,Paid)"."
	 VALUES('".$userid."','".$pid3."','".$name3."','".$sex3."','".$age3."','".$fno."','".$from."','".$to."','".$time."','".$depart_date."',
	'".$B_time."','".$Gate."','".$rate."',0)";

	$count++;
	$retval3 = mysql_query( $sql3, $conn );
	if(!retval3)
	{
		 echo "ERROR".mysql_error($con);
	}
}
if(!empty($_GET['pid4']))
{
	$pid4=$_GET['pid4'];
	$name4=$_GET['uname4'];
	$sex4=$_GET['usex4'];
	$age4=$_GET['uage4'];
	$sql4= "INSERT INTO book"." (User_Id ,Passport_Id,Name,Sex,Age,Flight_No ,From_Loc ,To_Loc, Time ,Date ,B_time ,Gate ,Rate  ,Paid)"."
	 VALUES('".$userid."','".$pid4."','".$name4."','".$sex4."','".$age4."','".$fno."','".$from."','".$to."','".$time."','".$depart_date."',
	'".$B_time."','".$Gate."','".$rate."',0)";

	$count++;
	$retval4 = mysql_query( $sql4, $conn );
	if(!retval4)
	{
		 echo "ERROR".mysql_error($con);
	}
}
	$totalcount=$count*$rate;
	$_SESSION['total']=$totalcount;



  echo "<div class='container'>
  <h3 align='center'>Invoice Of Ticket</h3>
  <table align='center' border='1' class='table table-striped'>
      <thead>
            <tr align='center'>
              <th scope='col'>User_Id</th>
							<th scope='col'>Passport_Id</th>
							<th scope='col'>Name</th>
							<th scope='col'>sex</th>
							<th scope='col'>age</th>
              <th scope='col'>Flight_No</th>
              <th scope='col'>From_Loc</th>
              <th scope='col'>To_Loc</th>
							<th scope='col'>Time</th>
              <th scope='col'>Date</th>
							<th scope='col'>Rate</th>



            </tr>
      </thead>
  <tbody>";

  $sql1 = " SELECT * FROM book WHERE User_Id='$userid' AND Flight_No='$fno' AND Paid='0'";
  mysql_select_db('test_db');
  $retval1 = mysql_query( $sql1, $conn);
  while($row1 = mysql_fetch_array($retval1))
  {
                echo "<tr align='center'>";
                echo "<td>" . $row1[0] . "</td>";
                echo "<td>" . $row1[1] . "</td>";
                echo "<td>" . $row1[2] . "</td>";
                echo "<td>" . $row1[3] . "</td>";
                echo "<td>" . $row1[4] . "</td>";
                echo "<td>" . $row1[5] . "</td>";
                echo "<td>" . $row1[6] . "</td>";
								echo "<td>" . $row1[7] . "</td>";
								echo "<td>" . $row1[8] . "</td>";
								echo "<td>" . $row1[9] . "</td>";
								echo "<td>" . $row1[13] . "</td>";
                echo "</tr>";

}
	mysql_close($conn);
	}
  ?>
  <br>
  </tbody>
</table>


<form method = "post" class="form-horizontal">
	<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="submit" formaction="payment.php"<?php $totalcount?>"><?php echo'Pay Rs. '.$totalcount.''?></button>
    </div>
  </div>
    <br>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
              <a class="btn btn-primary" href="flight.php" role="button">Close</a>
          </div>
        </div>
</from>
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
          <h6 class="text-uppercase mb-4 font-weight-bold">GoBoard</h6>
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
