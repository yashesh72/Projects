  <?php
  if(isset($_POST['from'])) {
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            $sql = "select *  from flight where From_Loc= '".$from."' or To_Loc='".$to."' or Date='".$date."' or Class='".$class."' ";
  
            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );
     
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            mysql_close($conn);
            }
      ?>