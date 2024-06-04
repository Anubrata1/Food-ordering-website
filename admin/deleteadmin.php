<?php
 include('connection.php');
 $x=$_GET['s'];
 $sqi ="DELETE from admin where Sno='$x'";
 if(mysqli_query($conn,$sqi))
 {
    echo "<script>alert('Delete Successfull');window.location.href='addadmin.php';</script>" ;
}
else
{
  echo "<script>alert('Delete Unsuccessfull');</script>" ;
}
?>
