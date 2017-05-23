<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/series2/core/init.php';
 include 'includes/head.php';
 include 'includes/navigation.php';

 $sql = "SELECT * FROM categories WHERE categories_parent = 0";
 $result = $db->query($sql);
 $errors = array();
 $category = '';
 $post_parent = '';


 //edit categories
 if (isset($_GET['edit']) && !empty($_GET['edit'])) {
   $edit_id = (int)$_GET['edit'];
   $edit_id = sanitize($edit_id);
   $edit_sql = "SELECT * FROM categories WHERE categories_id = '$edit_id'";
   $edit_result = $db->query($edit_sql);
   $edit_category = mysqli_fetch_assoc($edit_result);
   # code...
 }

 //delete categories
 if(isset($_GET['delete']) && !empty($_GET['delete'])){
   $delete_id = (int)$_GET['delete'];
   $delete_id = sanitize($delete_id);
   $sql = "SELECT * FROM categories WHERE categories_id = '$delete_id'";
   $result = $db->query($sql);
   $delete_category = mysqli_fetch_assoc($sql);
   if ($category['parent'] == 0) {
     $sql = "DELETE FROM categories WHERE categories_parent = '$delete_id'";
     $db->query($sql);
   }
   $dsql = "DELETE FROM categories WHERE categories_id = '$delete_id'";
   $db->query($dsql);
   header('Location: categories.php');

 }

 //Process form
if(isset($_POST) && !empty($_POST)){
  $post_parent = sanitize($_POST['parent']);
  $category = sanitize($_POST['category']);
  $sqlcat = "SELECT * FROM categories WHERE categories_category = '$category' AND categories_parent = '$post_parent'";
  if(isset($_GET['edit'])){
    $id = $edit_category['id'];
    $sqlcat = "SELECT * FROM categories WHERE categories_category = '$category' AND '$post_parent' AND categories_id != '$id' ";
  }
  $catresult = $db->query($sqlcat);
  $count = mysqli_num_rows($catresult);

  //check if category is blank
  if($category == ''){
    $errors[] .= ' Please fill out the category.';
  }
  //if exists in the Database
  if ($count > 0) {
    $errors[] .= $category. ' already exists';
    # code...
  }
  //Display errors
  if (!empty($errors)) {
    $display = display_errors($errors); ?>
    <script>
     $('document').ready(function(){
      $('#errors').html('<?php echo $display; ?>');
     });
    </script>

<?php  }else{
    //update database
   $updatesql = "INSERT INTO categories (categories_category, categories_parent) VALUES ('$category', '$post_parent')";
   if (isset($_GET['edit'])) {
     $updatesql = "UPDATE categories SET categories_category = '$category', categories_parent = '$post_parent' WHERE categories_id = '$edit_id'";
   }
   $db->query($updatesql);
   header('Location: categories.php');
  }

}
 $category_value =  '';
 $parent_value = 0;
  if (isset($_GET['edit'])) {
    $category_value = $edit_category['categories_category'];
    $parent_value =$edit_category['categories_parent'];
    # code...
  }else{
    if(isset($_POST)){
      $category_value = $category;
      $parent_value = $post_parent;

    }
  }
 ?>
 <h2 class="text-center">Categories</h2><hr>
 <div class="row">

   <!--Form column-->
   <div class="col-md-6">
     <form class="form" action="categories.php<?php echo ((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="post">
       <legend><?php echo ((isset($_GET['edit']))?'Edit':'Add A');?> Category</legend>
        <div id="errors"></div>
       <div class="form-group">
         <label for="parent">Parent</label>
         <select class="form-control" name="parent" id="parent">
          <option value="0"<?php echo(($parent_value == 0)?' selected="selected"':'');?>>Parent</option>
          <?php while($parent = mysqli_fetch_assoc($result)) :?>
            <option value="<?php echo $parent['categories_id']; ?>"<?php echo(($parent_value == $parent['categories_id'])?'selected="selected"':'');?>><?php echo $parent['categories_category']; ?></option>
        <?php endwhile; ?>
         </select>
       </div>
       <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" name="category" value="<?php echo $category_value;?>">
       </div>
       <div class="form-group">
        <input type="submit" value="<?php echo ((isset($_GET['edit']))?'Edit':'Add');?> category" class="btn btn-success" >
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
