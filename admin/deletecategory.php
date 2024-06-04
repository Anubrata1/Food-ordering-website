<?php
 include('connection.php');
 $x=$_GET['s'];
 $sqi ="DELETE from foodcategory where cno='$x'";
 if(mysqli_query($conn,$sqi))
 {
    echo "<script>alert('Delete Successfull');window.location.href='addcategory.php';</script>" ;
}
else
{
  echo "<script>alert('Delete Unsuccessfull');</script>" ;
}
?>
