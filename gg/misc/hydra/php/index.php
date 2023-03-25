<?php


$apiKey = 'z05QVyR4fm4Y9xBLfHdnBfE6HHYpllCGeaMIQNBJNl70qBq9hmgAt2CKytW0qrNx';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://dev.sellix.io/v1/categories',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer ' . $apiKey,
    'Cookie: __cf_bm=O04ZwPt3xgr7yFnLqtKkpyqUpidkoeN8MmIb539WDj0-1658722726-0-AYzCmBUqVMFLXYCCTRlZTAVwhn90nVHBBfRzpRvHpQGi+gFpWXhQzBRO85xQjp//FuHGbKv58aA/wWHHwRx/ssY='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$categories = json_decode($response)->data->categories;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="assets/style/style.css" />
  <link href="https://cdn.sellix.io/static/css/embed.css" rel="stylesheet" />

</head>




<body>
  <div class="hero-section">
    <h1 class="title">SHOP NAME</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In adipiscing amet, eget urna vestibulum. Accumsan pellentesque id enim in nunc, in rhoncus. Lobortis habitant massa neque, dictum. Id curabitur volutpat laoreet vel.</p>

    <div class="categories"></div>
  </div>





  <div class="products-container" id="buy">
    <div class="container">
      <h1 class="section-title">Products</h1>

      <div class="product-list-categories">

        <div class="product-categories">

          <?php
          foreach ($categories as $key => $category) {
            if ($key == 0) {
              echo '<button data-id=' . $category->id . ' onclick="showCategory(event)" class="clicked">' . $category->title . '</button>';
            } else {

              echo '<button data-id=' . $category->id . ' onclick="showCategory(event)">' . $category->title . '</button>';
            }
          }
          ?>

        </div>

        <?php
        foreach ($categories as $category) {


          echo '<div class="products" data-category="' . $category->id . '">';

          foreach ($category->products_bound as $product) {
            echo '
                <div class="product-item">
                    <img src="assets/images/product-img.svg" alt="" class="product-img" />

                    <p class="product-title">' . $product->title . '</p>
                    <div class="product-price">$' . $product->price . '</div>
                    <p class="product-desc">
                     ' . $product->description . '
                    </p>

                    <button     
                      data-sellix-product="' . $product->uniqid . '"
                      type="submit"
                      alt="Buy Now with sellix.io">
                      Buy
                    </button>
                </div>';
          }

          echo " </div>";
        }
        ?>



      </div>
    </div>
  </div>




  <footer id="contact">
    <div class="container">
      <p class="logo">LOGO</p>

      <div class="socials">
        <a href="">
          <img src="assets/images/discord.svg" alt="">

        </a>

        <a href="">
          <img src="assets/images/telegram.svg" alt="">

        </a>

      </div>
    </div>

  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.sellix.io/static/js/embed.js"></script>
  <script src="assets/script/script.js"></script>
</body>



</html>
