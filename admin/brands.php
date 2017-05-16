<?php
 require_once '../core/init.php';
 include 'includes/head.php';
 include 'includes/navigation.php';
 //brands from database
 $sql = "SELECT * FROM brand ORDER BY brand_brand";
 $results = $db->query($sql);
 $errors = array();
 //if add form submitted
 if(isset($_POST['add_submit'])){
   $brand = $_POST ['brand'];
   //check if brand is blank
    if($_POST['brand'] == ''){
      $errors[] .= 'You must enter a brand!';
    }
    //check for brand existance in Database
    $sql ="SELECT * FROM brand WHERE brand_brand = '$brand'";
    $result = $db->query($sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
      $errors[] .= 'That brand exists';
    }
    //display errors
    if(!empty($errors)){
      echo display_errors($errors);
    }else{
      //add brand
    }
 }
 ?>
<h2 class="text-center">brands</h2><hr>
  <!-- form-->
  <div class="text-center">
    <form class="form-inline" action="brands.php" method="post">
      <div class="form-group">
        <label for="brand">Add A Product</label>
        <input type="text" name="brand" id="brand" class="form-control" value="<?php echo((isset($_POST['brand']))?$_POST['brand']: ''); ?>">
        <input type="submit" name="add_submit" value="Add Brand" class="btn btn-success">
      </div>
    </form>
  </div><hr>

<table class="table table-bordered table-striped table-auto">
  <thead>
    <th></th><th>Brand</th><th></th>
  </thead>
  <tbody>
    <?php while($brand = mysqli_fetch_assoc($results)): ?>
   <tr>
     <td><a href="brands.php?edit=<?php echo $brand['brand_id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a></td>
     <td><?php echo $brand ['brand_brand']; ?></td>
     <td><a href="brands.php?delete=<?php echo $brand['brand_id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
   </tr>
 <?php endwhile; ?>
  </tbody>
</table>

<?php include 'includes/footer.php'

 ?>
