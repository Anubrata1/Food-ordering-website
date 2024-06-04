<?php
 include('connection.php');
 $x=$_GET['q'];
 $sqi ="DELETE from cart where cartid='$x'";
 if(mysqli_query($conn,$sqi))
 {
    echo "<script>window.location.href='cart.php';</script>" ;
}
else
{
  echo "<script>alert('Delete Unsuccessfull');</script>" ;
}
?>
