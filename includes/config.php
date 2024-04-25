<?php
ob_start(); //turn on output buffering
session_start();

date_default_timezone_set("Indian/Chagos");
try {
   $con=new PDO("mysql:dbname=streaming;host=localhost","root","");
   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}
catch (Exception $e) {  

exit("connection failed". $e->getMessage());
}
?>