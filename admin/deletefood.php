<?php
 include('connection.php');
 $x=$_GET['s'];
 $sqi ="DELETE from addfood where slno='$x'";
 if(mysqli_query($conn,$sqi))
 {
    echo "<script>alert('Delete Successfull');window.location.href='addfood.php';</script>" ;
}
else
{
  echo "<script>alert('Delete Unsuccessfull');</script>" ;
}
?>
