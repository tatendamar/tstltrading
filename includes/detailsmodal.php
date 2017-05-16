<?php
require_once '../core/init.php';
$id = $_POST['product_id'];
$id = (int)$id;
$sql = "SELECT * FROM products WHERE = '$id'";
$result = $db->query($sql);
$product = mysqli_fetch_assoc($result);
$brand_id1 = $product['product_brand'];
$sql2 = "SELECT brand_brand FROM brand WHERE brand_id = '$brand_id1'";
$brand_query = $db->query($sql2);
$brand = mysqli_fetch_assoc($brand_query);
$sizestr = $product['sizes'];
$size_exp = explode(',', $sizestr);
?>

<!--modal-->
<?php ob_start(); ?>
<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
 <div class="modal-dialog modal-lg">
   <div class="modal-content">
   <div class="modal-header">
     <button class="close" type="button" onclick="closeModal()" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
     <h4 class="modal-tittle text-center"><?php echo $product['product_title']; ?></h4>
     <?php var_dump($size_exp); ?>
   </div>
   <div class="modal-body">
     <div class="container-fluid">
       <div class="row">
         <div class="col-sm-6">
             <div class="center-block">
                <img src="<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_title']; ?>" class="details img-responsive" />
             </div>
         </div>
         <div class="col-sm-6">
           <h4>Details</h4>
            <p><?php echo $product['product_description']; ?></p>
            <hr>
            <p class="price"><?php echo $product['product_price']; ?></p>
            <p>Brand:<?php echo $brand['brand_brand']; ?></p>
            <form action="add_cart.php" method="post">
              <div class="form-group">
                <div class="col-xs-3">
                  <label for="quantity">Quantity:</label>
                  <input type="text" class="form-control" id="quantity" name="quantity">
                </div><div class="col-xs-9"</div>
                  <p>Available: 3</p>
              </div><br /><br />
                 <div class="form-group">
                   <label for="range">Range:</label>
                   <select name="size" id="size" class="form-control">
                     <option value=""></option>
                     <?php foreach($size_exp as $string){
                       $string_exp = explode(':', $string);
                       $size = $string_exp[0];
                       $quantity = $string_exp[1];
                       echo '<option value="'.$size.'">'.$size.' ('.$quantity.' Available)</option>';
                     } ?>
                   </select>
                 </div>
            </form>
         </div>
       </div>
     </div>
   </div>
   <div class="modal-footer">
    <button class="btn btn-default" onclick="closeModal()">Close</button>
    <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</button>
   </div>
 </div>
</div>
</div>
<script>
 function closeModal(){
   $('#details-modal').modal('hide');
   setTimeout(function(){
     $('#details-modal').remove();
     $('.modal-backdrop').remove();
   },500);
 }
</script>
<?php echo ob_get_clean(); ?>
