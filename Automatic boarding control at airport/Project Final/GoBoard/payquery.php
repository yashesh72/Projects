<?php

session_start();
$total=$_SESSION['total'];
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

  $sql = "Update book set paid='1' where User_Id='$userid'";
  	$retval = mysql_query( $sql, $conn );
    if($retval)
    {
      echo "<script> location.href='flight.php'; </script>";
    }
    else
    {
      echo "<script> alert('Wrong Details') </script>";
    }
?>
