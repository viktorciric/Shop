<?php
require_once "inc/header.php";
require_once "app/classes/Cart.php";
require_once "app/classes/Order.php";

if (!$user->is_logged()) {
    header("Location: Login.php");
    exit;
}

$order = new Orders();
$order_items = $order->get_orders(); 

?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Order ID: </th>
            <th scope="col">Product Name: </th>
            <th scope="col">Quantity: </th>
            <th scope="col">Price: </th>
            <th scope="col">Size: </th>
            <th scope="col">Image: </th>
            <th scope="col">Delivery Address: </th>
            <th scope="col">Order Date</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($order_items as $item) : ?>
            <tr>
                <td><?= $item['order_id']; ?></td>
                <td><?= $item['name']; ?></td>
                <td><?= $item['quantity']; ?></td>
                <td><?= $item['price']; ?></td>
                <td><?= $item['size']; ?></td>
                <td><img src="public/product_images/<?= $item['image'] ?>" height="50"></td>
                <td><?= $item['delivery_address']; ?></td>
                <td><?= $item['created_at']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once "inc/footer.php"; ?>
