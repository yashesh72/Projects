<?php
   session_start();
   unset($_SESSION["email"]);
   unset($_SESSION["pwd"]);
   session_destroy();
?>
<script type="text/javascript">
	window.location="alogin.php";
</script>