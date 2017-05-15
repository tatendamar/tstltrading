<?php
 require_once 'core/init.php';
 include 'includes/head.php';
 include 'includes/navigation.php';
 include 'includes/headerfull.php';
 include 'includes/leftside.php';

 $sql = "SELECT * FROM products WHERE featured = 1";
 $featured = $db->query($sql);
 ?>

    <!--main content-->
    <div class="col-md-8">
      <div class="row">
        <h2 class="text-center">Featured Products</h2>
         <?php while($product = mysqli_fetch_assoc($featured)) : ?>
          <div class="col-md-3 text-center">
            <h4><?php echo $product ['product_title']; ?></h4>
            <img src="<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_title']; ?>" class="img-thumb" />
            <p class="list-price text-danger">List Price: <s>$<?php echo $product['product_list_price']; ?></s></p>
            <p class="price">Our Price:$<?php echo $product ['product_price']; ?></p>
            <button type="button" class="btn btn-sm btn-success" onclick="detailsmodal(<?php $product['product_id']; ?>)">Details</button>
          </div>
        <?php endwhile; ?>
      </div>
    </div>

    <?php
      //include 'includes/detailsmodal.php';
      include 'includes/rightside.php';
      include 'includes/footer.php';
     ?>
