<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="foodorder";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
   echo die("connection failed".mysqli_connect_error());
}

?>