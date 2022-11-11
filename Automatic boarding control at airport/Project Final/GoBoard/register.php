<html>
<head>
   <title>Registration Page</title>
</head>
<style type="text/css">
  h2
  {
    color: #003284;
  }
</style>
<script type="text/javascript">
function checkFile(yourForm){

    var name = yourForm.elements['name'].value;
    var email = yourForm.elements['email'].value;
    var fileVal = yourForm.elements['image'].value;

    if(!name)
    {
      alert('name field is empty');
      return false;
    }
    if(!email)
    {
      alert('email field is empty');
      return false;
    }


    //RegEx for valid file name and extensions.
    var pathExpression = "[?:[a-zA-Z0-9-_\.]+(?:.png|.jpeg|.jpg)";


    if(fileVal != ""){
        if(!fileVal.toString().match(pathExpression) && confirm("The file is not a valid image. Do you want to continue?")){
            yourForm.submit();
        } else {
            return;
        }
    } else {

            alert('image is not uploaded');
            return false;
        }
    }

</script>
<body>
  <?php
         if(isset($_POST['submit'])) {
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysqli_connect("localhost", "root", "", "test_db");


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

            $cno = $_POST['cno'];
            $add = $_POST['add'];
            $name= $_POST['name'];
            $img = $_FILES['image']['name'];
            $temp_name = $_FILES['image']['tmp_name'];
            $folder = "user_images/".$name.".jpeg";
            $img_name = $name.".jpeg";

            $img_query = "insert into images values ('$email', '$name', '$img_name')";

            if(mysqli_query($conn, $img_query))
           {
             move_uploaded_file($temp_name, $folder);
           }
           else
           {
             echo "<script>alert('Failed to upload image')</script>";
           }
            $sql = "INSERT INTO signup ". "(Email,Password,ContactNo,Address) ". "VALUES('$email','$pwd','$cno','$add')";


            $retval = mysqli_query( $conn, $sql );

            if(! $retval ) {
               /*die('Could not enter data: ' . mysql_error());*/
              echo '<script language="javascript">';
              echo 'alert("Register not successfully.(DUPLICATE DATA)")';
              echo '</script>';
              echo "<script> location.href='register.php'; </script>";
            }
              echo '<script language="javascript">';
              echo 'alert("Registration successfully.")';  //not showing an alert box.
              echo '</script>';
              echo "<script> location.href='login.php'; </script>";
            mysqli_close($conn);
         }else {
            ?>
<!---Header File-->
<?php include('header.php'); ?>
<hr>
<div class="container">
  <h2>Register</h2>
  <form method = "post" class="form-horizontal"  action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" >Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" title="Enter Your Name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" title="Enter valid Email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="cpwd">Confirm Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="cpwd" onchange="passvalideator()" placeholder="Re-enter password" name="cpwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
         <p style="color:red;font-size:20px;" id="chek"></p>
          <script type="text/javascript">
            function passvalideator()
            {
              var pwd1=document.getElementById("pwd").value;
              var pwd2=document.getElementById("cpwd").value;
              if(pwd1!=pwd2)
              {
                document.getElementById("chek").innerHTML="**Password not match Renter Both Password.**";
                document.getElementById("submit").disabled = true;
              }
              else
              {
                document.getElementById("chek").innerHTML=" ";
                document.getElementById("submit").disabled = false;
              }
          </script>
  </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="cno">Contact-No:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="cno" placeholder="Enter Moblie-No" name="cno" minlength="10"  title="Enter valid Moblie-No" required>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Upload Your Image:</label>
        <div class="col-sm-10">

        <input type="file" name="image">
        </div>
      </div>

    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="add">Address:</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" id="add" placeholder="Enter Address" name="add" required></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="submit" id="submit" onClick="checkFile(this.form)">Submit</button>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="reset" class="btn btn-primary" id="reset">Reset</button>
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
