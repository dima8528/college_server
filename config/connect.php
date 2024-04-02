<?php

$connect = mysqli_connect('127.0.0.1', 'root', '', 'kursova');

if (!$connect) {
  die("DB wasn't connected");
}

