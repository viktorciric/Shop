<?php
require_once "inc/header.php" ;
require_once "app/classes/Cart.php" ;

if(!$user->is_logged()) {
    header("Location :  Login.php");
    exit;
}
 
$cart = new Cart();
$Cart_items = $cart->get_cart_items();
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Product Name: </th>
            <th scope="col"> Size: </th>
            <th scope="col">Price: </th>
            <th scope="col">Quantity: </th>
            <th scope="col">Image: </th>
            <th scopr="col">Total:</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($Cart_items as $item) : ?>
            <tr>
                <td><?= $item['name']; ?></td>
                <td><?= $item['size']; ?></td>
                <td><?= $item['price']; ?>$</td>
                <td><?= $item['quantity']; ?></td>
                <td><img src="public/product_images/<?= $item['image']?>" height="50" alt=""></td>
                <td><?= $item['price'] * $item['quantity']?>$</td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>

<a href="cheakout.php" class="btn btn-success">Cheakout</a>


<? require_once "inc.footer.php" ; ?>

