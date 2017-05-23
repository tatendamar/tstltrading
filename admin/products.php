<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/series2/core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
if (isset($_GET['add'])) {
  $brandQuery = $db->query("SELECT * FROM brand");
  $parentQuery = $db->query("SELECT * FROM categories WHERE categories_parent == 0 ORDER BY categories_category");
  ?>
  <h2 class="text-center">Add A New Product</h2><hr>
    <form action="products.php?add=1" method="POST" enctype="multipart/form-data">
      <div class="form-group col-md-3">
        <label for="title">Title*:</label>
        <input type="text" name="title"  class="form-control" id="title" value="<?php echo((isset($_POST['title']))?sanitize($_POST['title']):'');?>">
      </div>
      <div class="form-group col-md-3">
       <label for="brand">brand*:</label>
       <select class="form-control" id="brand" name="brand">
           <option value=""<?php echo((isset($_POST['brand_brand']) && $_POST['brand_brand'] == '')?' selected':'');?>></option>
           <?php while($brand = mysqli_fetch_assoc($brandQuery)): ?>
               <option value="<?php echo $brand['brand_id'];?>"<?php echo ((isset($_POST['brand_brand']) && $_POST['brand_brand'] == $brand['brand_brand'])?' selected':'');?><?php echo $brand['brand_id'];?></option>
         <?php endwhile; ?>
       </select>
      </div>
      <div class="form-group col-md-3">
       <label for="parent">Parent Category*:</label>
        <select class="form-control" id="parent" name="parent">
         <option value=""<?php echo((isset($_POST['categories_parent']) && $_POST ['categories_parent'] == '' )?' selected':'');?>></option>
         <?php while ($parent = mysqli_fetch_assoc($parentQuery)): ?>
           <option value="<?php echo $parent['categories_id'];?>"<?php echo ((isset($_POST['categories_parent']) && $_POST['categories_parent'] == $parent['categories_parent'] )?' select':'');?>><?php echo $parent['categories_id'];?></option>


         <?php endwhile;?>
        </select>
      </div>
      <div class="form-group col-md-3">
      <label for="child">Child category*:</label>
      <select id="child" name="child" class="form-control"></select>
    </div>
    <div class="form-group col-md-3">
      <label for="price">Price*:</label>
      <input type="text" id="price" name="price" class="form-control" value="<?php echo ((isset($_POST['price']))?sanitize($_POST['price']):'');?>">
    </div>
    <div class="form-group col-md-3">
      <label for="price">List Price*:</label>
      <input type="text" id="list_price" name="list_price" class="form-control" value="<?php echo ((isset($_POST['list_price']))?sanitize($_POST['list_price']):'');?>">
    </div>
    <div class="form-group col-md-3">
      <label>Quantity & Sizes*: </label>
     <button class="btn btn-default form-control" onclick="$('#sizesModal').modal('toggle');return false;">Quantity & Sizes</button>
    </div>
    <div class="form-group col-md-3">
     <label for="sizes">Sizes & Qty Preview</label>
     <input type="text" class="form-control" name="size" id="size" value="<?php echo ((isset($_POST['sizes']))?$_POST['sizes']:'');?>" readonly>
    </div>
    <div class="form-group col-md-6">
     <label for="photo">Product Photo</label>
     <input type="file" name="photo" id="photo" class="form-control">
    </div>
    <div class="form-group col-md-6">
     <label for="description">Description*:</label>
     <textarea id="description" name="description" class="form-control" rows="6"><?php echo((isset($_POST['description']))?sanitize ($_POST['description']):'');?></textarea>
    </div>
    <div class="col-md-3 pull-right">
       <input type="submit" value="Add Product" class="form-control btn btn-success">
    </div><div class="clearfix"></div>
    </form>
    <!--Modal-->
    <div class="modal fade" id="sizesModal" tabindex="-1" role="dialog" aria-labelledby="sizesModalLabel" aria=hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="sizesModalLabel">Size & Quantity</h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick= "updateSizes();$('#sizesModal').modal('toggle');return false;">Save changes</button>
          </div>
        </div>
      </div>
    </div>
<?php }else {
$sql = "SELECT * FROM products WHERE deleted != 1 ";
$presults = $db->query($sql);
if (isset($_GET['featured'])) {
  $id = (int)$_GET['id'];
  $featured = (int)$_GET['featured'];
  $featSql = "UPDATE products SET featured = '$featured' WHERE product_id = '$id'";
  $db->query($featSql);
  header('Location: products.php');

}

 ?>
<h2 class="text-center">Products</h2>
 <a href ="products.php?add=1" class="btn btn-success pull-right" id="add-product-btn">Add Product</a><div class="clearfix"></div>
<hr>
<table class="table table-bordered table-condensed table-striped">
<thead><th></th><th>Product</th><th>Price</th><th>Category</th><th>Featured</th><th>Sold</th></thead>
<tbody>
 <?php while ($product = mysqli_fetch_assoc($presults)):
   $childID = $product['product_categories'];
   $catSql = "SELECT * FROM categories WHERE categories_id = '$childID'";
   $result = $db->query($catSql);
   $child = mysqli_fetch_assoc($result);
   $parentID = $child['categories_parent'];
   $parentSql = "SELECT * FROM categories WHERE categories_id = '$parentID' ";
   $presult = $db->query($parentSql);
   $parent = mysqli_fetch_assoc($presult);
   $category = $parent['categories_category'].'-'.$child['categories_category'];
      ?>
   <tr>
    <td>
      <a href="products.php?edit=<?php echo $product['product_id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
      <a href="products.php?delete=<?php echo $product['product_id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a>
    </td>
    <td><?php echo $product['product_title']; ?></td>
    <td><?php echo money($product ['product_price']); ?></td>
    <td><?php echo $category; ?></td>
    <td><a href="products.php?featured=<?php echo (($product['featured'] == 0)?'1':'0');?>&id=<?php echo $product['product_id'];?>" class="btn btn-xs btn-default">
      <span class=" glyphicon glyphicon-<?php echo(($product['featured']== 1)?'minus':'plus');?>"></span></a>
    &nbsp <?php echo(($product['featured'] == 1)?'Featured Product':'');?></td>
    <td>0</td>
   </tr>

 <?php endwhile;?>
</tbody>
</table>


<?php }
include 'includes/footer.php';
 ?>
