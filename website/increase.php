<?php
 include('connection.php');
 $x=$_GET['q'];
 $sqi ="UPDATE cart set quantity=quantity+1 where cartid='$x'";
 if(mysqli_query($conn,$sqi))
 {
    echo "<script>window.location.href='cart.php';</script>" ;
}
else
{
  echo "<script>window.location.href='404.html';</script>" ;
}
?>