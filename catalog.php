<?php
  header("Access-Control-Allow-Origin: *");
  require_once 'config/connect.php';

  $brands = mysqli_query($connect, "SELECT * FROM `catalog`");

  $result = [];
  while ($row = mysqli_fetch_object($brands)) {
      $result[] = $row;
  }

  echo json_encode($result);
?>
