<html>
<head>
	<title>Login Page</title>
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
  ?>
  <?php
         if(isset($_POST['email']) && !empty($_POST['email']) 
               && !empty($_POST['pwd'])) {
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            if(! get_magic_quotes_gpc() ) {
               $email = addslashes ($_POST['email']);
               $pwd = addslashes ($_POST['pwd']);
            }else {
               $email = $_POST['email'];
               $pwd = $_POST['pwd'];
            }
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['email'] = $_POST['email'];

            $sql = "SELECT * FROM signup where Email='".$email."' and Password='".$pwd."'";
            
            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );

            if (mysql_num_rows($retval) > 0) 
            {
              echo "<script> location.href='flight.php'; </script>";
              exit;
              //echo "login successfully..";
            } 
            else 
            {
              echo '<script language="javascript">';
              echo 'alert("Email-Id or Password is incorrect.")';  //not showing an alert box.
              echo '</script>';
              echo "<script> location.href='login.php'; </script>";
              //echo "login fail..";
            }
            mysql_close($conn);
         }else {
            ?>
<!---Header File-->
<?php include('header.php'); ?> 
<hr>
<div class="container">
  <h2>Customer Log in</h2>
  <form method="post" class="form-horizontal" action="<?php $_PHP_SELF ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" title="Enter valid Email-Id" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" title="Enter valid Password" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button id="submit" type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>	
<hr>
<!---Footer File-->
<?php include('footer.php'); ?>
    <?php
         }
      ?>
  </body>
</html>
