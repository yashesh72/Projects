<html>
<head>
	<title>Reservation</title>
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
<?php
session_start();
$_SESSION['fno']=$_GET['fno'];
$_SESSION['from']=$_GET['from'];
$_SESSION['to']=$_GET['to'];
$_SESSION['depart_date']=$_GET['date'];
$_SESSION['rate']=$_GET['rate'];
$_SESSION['time']=$_GET['time'];
$_SESSION['B_time']=$_GET['B_time'];
$_SESSION['Gate']=$_GET['Gate'];
?>
<!---Header File-->
<?php include('header.php'); ?>
<hr>
<div class="container">
  <h2>Fill Your Details:</h2>

    <br>
    <?php
    echo "<h3>You are booking your ticket from " .$_SESSION['from']. " to " .$_SESSION['to']. " of Flight No : ".$_SESSION['fno']. " Dated: ".$_SESSION['depart_date'].".</h3>";
    ?>

    </div>
		<form class="form-horizontal" action="pay.php" method="get">
    <table align="center" border='1' class="table table-striped">
      <tr>
            <tr align='center'>
              <th>Serial No</th>
							<th>Passport ID</th>
              <th>Name</th>
              <th>Sex</th>
              <th>Age</th>
            </tr>
      </tr>

    <tr>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <p>1.</p>
            </div>
          </div>
        </td>
				<td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="text" name="pid1"/>
              </div>
          </div>
        </td>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="text" name="uname1"/>
              </div>
          </div>
        </td>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10"><select class="custom-select" name="usex1"><option value="male">Male</option><option value="female">Female</option></select>
            </div>
        </div>
        </td>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="text" name="uage1" style="width:40px;"/>
            </div>
          </div>
        </td>
    </tr>
		<tr>
				<td>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						<p>2.</p>
						</div>
					</div>
				</td>
				<td>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="text" name="pid2"/>
							</div>
					</div>
				</td>
				<td>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="text" name="uname2"/>
							</div>
					</div>
				</td>
				<td>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10"><select class="custom-select" name="usex2"><option value="male">Male</option><option value="female">Female</option></select>
						</div>
				</div>
				</td>
				<td>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="text" name="uage2" style="width:40px;"/>
						</div>
					</div>
				</td>
		</tr>
		<tr>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <p>3.</p>
            </div>
          </div>
        </td>
				<td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="text" name="pid3"/>
              </div>
          </div>
        </td>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="text" name="uname3"/>
              </div>
          </div>
        </td>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10"><select class="custom-select" name="usex3"><option value="male">Male</option><option value="female">Female</option></select>
            </div>
        </div>
        </td>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="text" name="uage3" style="width:40px;"/>
            </div>
          </div>
        </td>
    </tr>
		<tr>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <p>4.</p>
            </div>
          </div>
        </td>
				<td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="text" name="pid4"/>
              </div>
          </div>
        </td>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="text" name="uname4"/>
              </div>
          </div>
        </td>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10"><select class="custom-select" name="usex4"><option value="male">Male</option><option value="female">Female</option></select>
            </div>
        </div>
        </td>
        <td>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="text" name="uage4" style="width:40px;"/>
            </div>
          </div>
        </td>
    </tr>
  </table>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="submit" onclick="show_alert()">Submit</button>
    </div>
  </div>
  <br>
<div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <a class="btn btn-primary" href="book.php" role="button">Close</a>
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
