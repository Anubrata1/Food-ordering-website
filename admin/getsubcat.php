
<select class="form-control"  required>
<option value="">select subccategory</option>
<?php
include('connection.php');

$q=$_GET['q'];
                    $c="SELECT * from foodsubcategory where category='$q'";
                    $r= mysqli_query($conn,$c);
                    while($row = mysqli_fetch_assoc($r))
                    {
                      ?>
                      <option value="<?php echo $row['subcategory'];?>"><?php echo $row['subcategory'];?></option>
                      <?php
                    }
                    ?>
                    </select>