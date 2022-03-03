<?php
require_once("db_connect.php");
$sql = "SELECT * FROM products WHERE valid = 1 ORDER BY name ASC";

$result = $conn->query($sql);
$products = $result -> fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="zh-TW">
  <head>
    <title>Store</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
      <div class="row">
        <!-- <?= var_dump($products); ?> -->
        <?php foreach ($products as $product): ?>

          <div class="col-md-4 col-lg-3 mb-3">
            <div class="card p-3 h-100 d-flex flex-column justify-content-between">
              <h2><?= $product["name"]; ?></h2>
              <div>$ <?= $product["price"]; ?></div>
              <div class="d-grid">
                <button class="btn btn-info add-btn" data-id="<?= $product["id"]; ?>">ADD</button>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
        <div class="py-3 text-center">
          <a href="cart.php" class="btn btn-info">購物車</a>
        </div>
      </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
      $(".add-btn").click(function(){
        let id=$(this).data("id");
        //console.log(id)
        let formData=new FormData();
        formData.append('id', id);
        axios({
          method: "post",
          url: "/store/api/add-cart.php",
          data: formData,
          headers: { 'Content-Type': "multipart/form-data"}
        }).
        then(function(response){
          console.log(response.data)
        })
        .catch(function(response){
          console.log(response)
        })
      })
    </script>
  </body>
</html>