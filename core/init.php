<?php
 $db = mysqli_connect('localhost', 'tatenda', 'DH@dhu05', 'tsltrading');
  if(mysqli_connect_errno()) {
    echo 'Database connection failed with following errors: '. mysqli_connect_error();
    die();
  }
 require_once $_SERVER['DOCUMENT_ROOT'].'/series2/config.php';
 require_once BASEURL.'helpers/helpers.php';
