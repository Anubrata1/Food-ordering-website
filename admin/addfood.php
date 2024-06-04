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

<script>
    function getsubcat(str)
    {
       
        if(str=="")
        {
            document.getElementById("subc").innerHTML="";
            return;
        }
        else
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()
            {
                if(this.readyState == 4 && this.status == 200)
                {
                    
                    document.getElementById("subc").innerHTML=this.responseText;
                }
            };
            xmlhttp.open("GET","getsubcat.php?q="+str,true);
            xmlhttp.send();
        }
    }
</script>
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
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required onchange="getsubcat(this.value);">
                    <option value="">select category</option>
                    <?php
                    $cat="SELECT * from foodcategory";
                    $res= mysqli_query($conn,$cat);
                    while($row = mysqli_fetch_assoc($res))
                    {
                      ?>
                      <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
                      <?php
                    }
                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="subc">Sub category</label>
                    <select class="form-control" id="subc"  name="subc" required>
                   <option value="">select subcategory</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="food_name">Food name</label>
                    <input type="text" class="form-control" id="fname" placeholder="Enter Food name" name="fname" required >
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter Price"  name="price" required >
                  </div>
                  <div class="form-group">
                    <label for="type">Type</label>
                    <br>
                    <input type="radio" class="form-input-check" id="type" value="Veg"  name="type" checked>     
                    <label for="veg">VEG</label>
                    <input type="radio" class="form-input-check" id="type"  value = "Nonveg" name="type"  >
                    <label for="male">NONVEG</label>
                  </div>
                  <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" class="form-control" id="desc" placeholder=" Enter Description"  name="desc" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
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
                  echo"<script>alert('unknown extension!');</script>";
                  $errors=1;
                }
                
                else
                {

                  $image_name=time().'.'.$extension;
                  $newname="foodimage/".$image_name;
                  $copied=copy($_FILES['image']['tmp_name'],$newname);
                  if(!$copied)
                  {
                    echo"<script>alert('copy unsuccessfull');</script>";
                    $errors=1;
                  }
                  }
              }

              if($errors==0)
              {

                $category = $_POST['category'];
                $subc = $_POST['subc'];
                $type = $_POST['type'];
                $fname = $_POST['fname'];
                $price = $_POST['price'];
                $desc = $_POST['desc'];
                


              $sqcheck="SELECT * from addfood where foodname ='$fname'";
              $result = mysqli_query($conn,$sqcheck);
              $rc=mysqli_num_rows($result);
              if($rc == 0)
              {
                $sql = "INSERT INTO addfood VALUES('','$category','$subc','$fname','$price','$type','$desc','$image_name' )";

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
                    <th>category</th>
                    <th>subcategory</th>
                    <th>food name</th>
                    <th>type</th>
                    <th>Price</th>
                    <th>description</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sl=1;
                    $sqsel="SELECT * from addfood";
                    $ressel = mysqli_query($conn,$sqsel);
                    while($row = mysqli_fetch_assoc($ressel))
                    {
                    ?>
                    <tr>
                    <td ><?php echo $sl;?></td>
                    <td><?php echo $row['category'];?></td>
                    <td><?php echo $row['subcategory'];?></td>
                    <td><?php echo $row['foodname'];?></td>
                    <td><?php echo $row['type'];?></td>
                    <td><?php echo $row['price'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td><img src="foodimage/<?php echo $row['image'];?>" width="100px" height="100px"></td>
                    <td><a href='editfood.php?s=<?php echo $row['slno'];?>'target="blank">Edit</a>
                    <td><a href='deletefood.php?s=<?php echo $row['slno'];?>' >Delete</a></td>
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
