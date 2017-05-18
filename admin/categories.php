<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/series2/core/init.php';
 include 'includes/head.php';
 include 'includes/navigation.php';

 $sql = "SELECT * FROM categories WHERE categories_parent = 0";
 $result = $db->query($sql);
 $errors = array();

 //Process form
if(isset($_POST) && !empty($_POST)){
  $parent = sanitize($_POST['categories_parent']);
  $category = sanitize($_POST['categories_category']);
  $sqlcat = "SELECT * FROM categories WHERE categories_category = '$category' AND categories_parent = '$parent'";
  $catresult = $db->query($sqlcat);
  $count = mysqli_num_rows($catresult);

  //check if category is blank
  if($category == ''){
    $errors[] .= 'Please fill out the category.';
  }
  //if exists in the Database
  if ($count > 0) {
    $errors[] .= $category. 'already exists';
    # code...
  }
  //Display errors
  if (!empty($errors)) {
    $display = display_errors($errors); ?>
    <script>
     $('document').ready(function(){
      $('#errors').html(<?php echo $display; ?>);
     });
    </script>

<?php  }else{
    //update database

  }

}
 ?>
 <h2 class="text-center">Categories</h2><hr>
 <div class="row">

   <!--Form column-->
   <div class="col-md-6">
     <form class="form" action="categories.php" method="post">
       <legend>Add A Category</legend>
        <div id="errors"></div>
       <div class="form-group">
         <label for="parent">Parent</label>
         <select class="form-control" name="parent" id="parent">
          <option value="0">Parent</option>
          <?php while($parent = mysqli_fetch_assoc($result)) :?>
            <option value="<?php echo $parent['categories_id']; ?>"><?php echo $parent['categories_category']; ?></option>
        <?php endwhile; ?>
         </select>
       </div>
       <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" name="category">
       </div>
       <div class="form-group">
        <input type="text" value="Add category" class="btn btn-success" >
       </div>
     </form>
   </div>

   <!--categories column-->
   <div class="col-md-6">
    <table class="table table-bordered">
      <thead>
        <th>Category</th><th>Parent</th>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM categories WHERE categories_parent = 0";
        $result = $db->query($sql);
         while ($parent = mysqli_fetch_assoc($result)):
          $parent_id = (int)$parent['categories_id'];
           $sql2 ="SELECT * FROM categories WHERE categories_parent ='$parent_id' ";
           $childresult = $db->query($sql2);
         ?>
         <tr class="bg-primary">
          <td><?php echo $parent['categories_category']; ?></td>
          <td>Parent</td>
          <td>
            <a href="categories.php?edit=<?php echo $parent['categories_id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="categories.php?delete=<?php echo $parent['categories_id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a>
          </td>
         </tr>
         <?php while($child = mysqli_fetch_assoc($childresult)): ?>
           <tr class="bg-info">
            <td><?php echo $child['categories_category']; ?></td>
            <td><?php echo $parent['categories_category']; ?></td>
            <td>
              <a href="categories.php?edit=<?php echo $child['categories_id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
              <a href="categories.php?delete=<?php echo $child['categories_id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a>
            </td>
         <?php endwhile; ?>
       <?php endwhile; ?>
      </tbody>
    </table>
   </div>
 </div>




 <?php
 include 'includes/footer.php';
  ?>
