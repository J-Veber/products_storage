<?php

  $link = mysqli_connect('localhost', 'user', 'passw');

  $db_selected = mysqli_select_db($link, 'products_storage');

  if (!$db_selected) {
    // If we couldn't, then it either doesn't exist, or we can't see it.
    $sql = 'CREATE DATABASE products_storage';

    mysqli_query($link, $sql);
  }

  mysqli_close($link);
  exec("mysql -uuser -ppassw products_storage < products_storage.sql");