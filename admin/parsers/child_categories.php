<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/series2/core.init.php';
$parentID = (int)$_POST['parentID'];
$childQuery = $db->query("SELECT * FROM categories WHERE categories_parent = '$parentID' ORDER BY categories_category");
ob_start(); ?>
 <option value=""></option>
 <?php while($child = mysqli_fetch_assoc($childQuery)): ?>
    <option value="<?php echo $child['categories_id'];?>" ><?php echo $child['categories_category'];?></option>
 <?php endwhile; ?>
 <?php echo ob_get_clean(); ?>
