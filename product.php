<?php
require_once "inc/header.php";
require_once "app/classes/Product.php";
require_once "app/classes/Cart.php";


$product = new Product() ;
$product = $product->read($_GET['product_id']);

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $product_id = $product['product_id'];

    $user_id = $_SESSION['user_id'];

    $quantity = $_POST['quantity'] ;

    $cart= new Cart();
    $cart->add_to_cart($product_id, $user_id, $quantity);

    header('Location: cart.php');
    exit();
}

?>

<div class="row">
    <div class="col-lg-6"><img src="public/product_images/<?= $product['image'] ;?>" class="img-fluid"></div>
    <div class="col-lg-6">
        <h2><?= $product['name']; ?></h2>
        <p>Size: <?= $product['size']; ?></p>
        <p>Price: <?= $product['price']; ?>$</p>
        <form action="" method="POST">
            <input type="number" name="quantity">
            <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
    </div>
</div>


<?php  require_once "inc/footer.php"; ?>

<style>
    * {
        overflow: hidden;
    }

    .img-fluid {
        height: 700px;
    }
</style>