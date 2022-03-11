<?php
session_start();

$id = $_POST["id"];

$newItem = [
  $id => 1
];


if (!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = [];
}

$product_exist = 0;
foreach ($_SESSION["cart"] as $value) {
  if (array_key_exists($id, $value)) {
    $product_exist = 1;
  }
}
if ($product_exist === 0) {
  array_push($_SESSION["cart"], $newItem);
}

echo json_encode($newItem);
?>
<html lang="zh-TW"></html>