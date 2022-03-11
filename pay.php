<?php
require_once("./db_connect.php");

if(isset($_SESSION["cart"])) {
  $user_id=1;
  $now=date('Y-m-d H:i:s');
  $sql="INSERT INTO user_order_products (user_id, order_time) VALUES ('$user_id', '$now') ";
  if ($conn->query($sql) === TRUE) {
    // echo "新資料輸入成功<br>";
    $order_id = $conn->insert_id;
    // echo "id 為 $order_id";
    foreach($_SESSION["cart"] as $product) {
      $product_id =key($product);
      $value=current($product );
      $sqlDetail="INSERT INTO user_order_products_detail (order_id, product_id, amount) VALUES ('$order_id', '$product_id', '$value')";
      $conn->query($sqlDetail);
    }

    // $sqlDetail="INSERT INTO ";
    unset($_SESSION["cart"]);
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

} else {
  echo "購物車是空的";
  exit;

}
?>

<!doctype html>
<html lang="">
  <head>
    <title>pay</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>