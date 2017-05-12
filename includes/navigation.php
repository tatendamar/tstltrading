<?php
   $sql = "SELECT * FROM categories WHERE categories_parent = 0 ";
   $pquery = $db->query($sql);

?>
<!-- top nav-->

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <a href="index.php" class="navbar-brand">TSL Trading</a>
    <ul class="nav navbar-nav">
      <?php while($categories_parent = mysqli_fetch_assoc($pquery)) : ?>
        <?php $category = $categories_parent ['categories_id'];
         $sql2 = "SELECT * FROM categories WHERE categories_parent = '$category'";
         $childquery =$db->query($sql2);
         ?>
        <!-- Menu items -->

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $categories_parent ['categories_category']; ?><span class="caret"></span></a>
        <ul class="dropdown-menu " role="menu">
          <?php while($child = mysqli_fetch_assoc($childquery)) :?>
         <li><a href="#"><?php echo $child['categories_category']; ?></a></li>
       <?php endwhile; ?>

      </li>
    </ul>
     <?php endwhile; ?>
  </div>
</nav>
