<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Content-Type");

  require_once 'config/connect.php';

  $json_data = file_get_contents('php://input');
  $data = json_decode($json_data, true);

  if(isset($data['login']) && isset($data['password'])) {
    $login = mysqli_real_escape_string($connect, $data['login']);
    $password = mysqli_real_escape_string($connect, $data['password']);

    $user_query = mysqli_query($connect, "SELECT * FROM `users` WHERE login = '$login' AND password = '$password'");

    if($user_query) {
      $result = mysqli_fetch_object($user_query);
      
      if($result) {
        echo json_encode($result);
      } else {
        echo json_encode(array('error' => 'User not found'));
      }
    } else {
      echo json_encode(array('error' => mysqli_error($connect)));
    }
  } else {
    echo json_encode(array('error' => 'Missing login or password'));
  }
?>
