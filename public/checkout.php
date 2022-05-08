<!DOCTYPE html>
<html>
  <head>
    <title>Buy cool new product</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <section>
      <?php
        require '../dbConnection.php';
        
        $sql = 'SELECT * FROM products';
        $req = $db->prepare($sql);
        $req->execute();
        $products = $req->fetchAll(PDO::FETCH_ASSOC);
        ?>
        
        <div class="product">
        <div class="description">
        <?php
        foreach ($products as $product) {
            echo '<form action="../create-checkout-session.php" method="post">';
            echo '<input type="hidden" name="product" value="'.$product['productID'].'">';
            echo '<input type="number" name="quantity">';
            echo '<button type="submit">'.$product['name'].'</button>'; echo '<br>';
            echo '</form>';
        }
      ?>
    </div>
      </div>
    </section>
  </body>
</html>