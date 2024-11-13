<?php

try {
$conn = new PDO('mysql:host=localhost;port=3306;dbname=gulf_racing', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
 
}

catch(PDOException $ex)
{
echo ("Internal Login Error, Please Contact Web Site Support");
$error = "Error message: ".$e->getMessage() ." Error at line: ".$e->getLine()."  
in a file named :  ".$e->getFile(); 
error_log($error);  
return;
}
?>

