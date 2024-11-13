<?php
session_start();
echo "Thanks  ".$_SESSION['FirstName']."   
	  for visiting us - Stay Connected";
session_unset();
session_destroy();
echo "<br><a href='signin.php'>Click to Login Again</a><br><br>";
?>