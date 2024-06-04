<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>
  

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php
 include('adminnavbar.php'); 
 ?>
   <?php
  include('adminsidebar.php');
  ?>
  <?php
    include('connection.php');
    ?>
    <?php
        $e=$_SESSION['uemail'];
		$sqsel="SELECT * from userregistration WHERE email='$e'";
		$res = mysqli_query($conn,$sqsel);
		while($row = mysqli_fetch_assoc($res))
		 {
	?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" value=<?php echo $row['name']?> name="name" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required >
                  </div>
                  <div class="form-group">
                    <label for="dateofbirth">Date of Birth</label>
                    <input type="date" class="form-control" id="dateofbirth" placeholder="Enter DOB"  name="dateofbirth" required >
                  </div>
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <br>
                    <input type="radio" class="form-input-check" id="gender" value="Male"  name="gender" checked>     
                    <label for="male">Male</label>
                    <input type="radio" class="form-input-check" id="gender"  value = "female" name="gender"  >
                    <label for="male">Female</label>
                  </div>
                  <div class="form-group">
                    <label for="phno">Phone no</label>
                    <input type="text" class="form-control" id="phno" placeholder=" Enter phone no"  name="phoneno" pa
                    ttern="[0-9]{10}" title="jkj" required >
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password"  name="password" required >
                  </div>
                  <div class="form-group">
                    <label for="Repassword">Password</label>
                    <input type="password" class="form-control" id="Repassword" placeholder="Re enter Password"  name="repassword" required >
                  </div>
                  
                  <?php
         }
         ?>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                </div>
              </form>
            </div>
            <?php

function getExtension($str)
{
  
  $i = strrpos($str,".");
  if(!$i)
  {
    return "";
  }
  $l= strlen($str)-$i;
  $ext = substr($str,$i+1,$l);
  return $ext;

}

if(isset($_POST['submit']))
{
  $errors=0;
  $image = $_FILES['image']['name'];

if($image)
{
   $filename = stripslashes($_FILES['image']['name']);
   $extension = getExtension($filename);
   $extension = strtolower($extension);
   if(($extension != "jpg")&& ($extension !="jpeg")&&($extension != "png")&&($extension != "gif")&&($extension != "bmp"))
   {
    echo'<h1>unknown extension!</h1>';
    $errors=1;
   }
  
   else
   {

    $image_name=time().'.'.$extension;
    $newname="adminimage/".$image_name;
    $copied=copy($_FILES['image']['tmp_name'],$newname);
    if(!$copied)
    {
      echo'<h1>copy unsuccessfull!</h1>';
      $errors=1;
    }
    }
}

if($errors==0)
{

  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $dob = $_POST['dateofbirth'];
  $gender = $_POST['gender'];
  $phno = $_POST['phoneno'];
  $pass = $_POST['password'];

$sqcheck="SELECT * from admin where email='$email' or phoneno='$phno'";
$res= mysqli_query($conn,$sqcheck);
$rc=mysqli_num_rows($res);
 if($rc==0)
 {
  $sql = "INSERT INTO admin VALUES('','$name','$email','$address','$dob','$phno','$pass','$gender','$image_name')";

  if(mysqli_query($conn,$sql))
  {
    echo "<script>alert('Enter Successfull');</script>" ;
  }
  else
  {
    echo "<script>alert('Enter Unsuccessfull');</script>" ;
  }
 }
else
{
  echo "<script>alert('Already Exist');</script>" ;
}
}
}
?>

            <!-- /.card -->

            <!-- general form elements -->
            
            <!-- /.card -->

            <!-- Input addon -->
            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
         
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
           
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sno</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Phoneno</th>
                    <th>Gender</th>
                    <th>Image</th>
                    <th>Action</th>
                
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sl=1;
                    $sqsel="SELECT * from admin";
                    $ressel = mysqli_query($conn,$sqsel);
                    while($row = mysqli_fetch_assoc($ressel))
                    {
                    ?>
                    <tr>
                    <td ><?php echo $sl;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['phoneno'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><img src="adminimage/<?php echo $row['image'];?>" width="50px" height="50px"></td>
                    <td><a href='editAdmin.php?s=<?php echo $row['Sno'];?>'target="blank">Edit</a>
                        <a href='deleteadmin.php?s=<?php echo $row['Sno'];?>' >Delete</a></td>
                    <?php
                    $sl++;
                    }
                    ?>
                  </tbody>
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
