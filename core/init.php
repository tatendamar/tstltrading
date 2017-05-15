<?php
 $db = mysqli_connect('localhost', 'tatenda', 'DH@dhu05', 'tsltrading');
  if(mysqli_connect_errno()) {
    echo 'Database connection failed with following errors: '. mysqli_connect_error();
    die();
  }

  define('BASEURL', '/series2/');
