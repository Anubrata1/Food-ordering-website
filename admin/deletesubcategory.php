<?php
 include('connection.php');
 $x=$_GET['s'];
 $sqi ="DELETE from foodsubcategory where sno='$x'";
 if(mysqli_query($conn,$sqi))
 {
    echo "<script>alert('Delete Successfull');window.location.href='addsubcategory.php';</script>" ;
}
else
{
  echo "<script>alert('Delete Unsuccessfull');</script>" ;
}
?>
