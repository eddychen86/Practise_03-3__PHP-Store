<?php
require_once("./db_connect.php");
?>

<!doctype html>
<html lang="">
  <head>
    <title>Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="constianer">
      <table class="table table-bordered table-sm">
        <thead>
          <tr class="text-center">
            <th>產品名稱</th>
            <th>數量</th>
            <th>單價</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
            <td class="text-end"></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td class="text-end" colspan="4">總價：</td>
          </tr>
        </tfoot>
      </table>
      <div class="py-2 text-end">
        <a href="" class="btn btn-info">結帳</a>
      </div>
      <div id="data"></div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
      let cart = localStorage.getItem('cart');
      // console.log(cart);
      let formData=new FormData();
      formData.append('cart', cart);
      axios({
          method: "post",
          url: "/store/api/cart.php",
          data: formData,
          headers: { 'Content-Type': "multipart/form-data"}
      }).
      then(function(response){
          console.log(response.data)
          let product = response.data.product;
          products.forEach(function(product){
            $("#data").append(`<div>${product.name}: ${product.price}</div>`)
          })

      })
      .catch(function(response){
          console.log(response);
      })

    </script>
  </body>
</html>