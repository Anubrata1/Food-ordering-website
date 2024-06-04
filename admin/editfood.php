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
            $x=$_GET['s'];
            $sql ="SELECT * from addfood where slno='$x'";
            $res= mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($res);
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
                    <input type="text" class="form-control" id="category"  name="category" readonly value="<?php echo $row['category'];?>">
                  </div>
                  <div class="form-group">
                    <label for="subcategory">Sub Category</label>
                    <input type="text" class="form-control" id="subc" name="subc" readonly value="<?php echo $row['subcategory'];?>">
                  </div>
                  <div class="form-group">
                    <label for="food_name">Food name</label>
                    <input type="text" class="form-control" id="fname"  name="fname" required value="<?php echo $row['foodname'];?>">
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price"   name="price" required value="<?php echo $row['price'];?>">
                  </div>
                  <div class="form-group">
                    <label for="type">Type</label>
                    <br>
                    <?php
                    if($row['type']=='Veg')
                    {
                    ?>
                    <input type="radio" class="form-input-check" id="type" value="Veg"  name="type" checked>     
                    <label for="male">Veg</label>
                    <input type="radio" class="form-input-check" id="type"  value ="Nonveg" name="type" >
                    <label for="male">Nonveg</label>
                <?php 
                    }
                    else
                    {
                    ?>
                        <input type="radio" class="form-input-check" id="type" value="Veg"  name="type" >     
                    <label for="male">Veg</label>
                    <input type="radio" class="form-input-check" id="type"  value = "Nonveg" name="type" checked >
                    <label for="male">Nonveg</label>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="desc"  name="desc" required value="<?php echo $row['description'];?>" >
                  </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update" value="update">Submit</button>
                </div>
              </form>
            </div>
            <?php
            if(isset($_POST['update']))
            {
                 $fname = $_POST['fname'];
                 $price = $_POST['price'];
                 $type = $_POST['type'];
                 $desc = $_POST['desc'];

                 $sq= "UPDATE addfood SET foodname='$fname',price='$price',type='$type',description= '$desc' where slno='$x'";
                 if(mysqli_query($conn,$sq))
                  {
                     echo "<script>alert('Update Successfull');window.location.href='addfood.php';</script>" ;
                  }
                else
                  {
                    echo "<script>alert('Update Unsuccessfull');</script>" ;
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
