<?php
require_once "inc/header.php" ;
require_once "app/classes/Cart.php" ;
require_once "app/classes/Order.php" ;


if(!$user->is_logged()) {
    header("Location :  Login.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $delivery_address = $_POST['country'].", ". $_POST['city'].", ". $_POST[ 'zip'].", ". $_POST['address'];
    $order = new Orders();
    $order = $order->create($delivery_address);

    $_SESSION['message']['type'] = "success" ;
        $_SESSION['message']['text'] = "Uspesno naruceno!" ;
        header("location: orders.php") ;
        exit();
}
?>

<form method="POST" action="">
    <div class="form-group mb-3">
        <label for="country">Drzava: </label>
        <input type="text" class="form-control" id="country" name="country" required>
    </div>

    <div class="form-group mbb-3">
        <label for="city">Grad: </label>
        <input type="text" class="form-control" id="city" name="city" required>
    </div>

    <div class="form-group mb-3">
        <label for="zip">Postanski broj: </label>
        <input type="text" class="form-control" id="zip" name="zip" required>
    </div>

    <div class="form-group mb-3">
        <label for="address">Adresa: </label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <button type="submit" class="bn btn-primary">Order</button>
</form>

<?php require_once "inc/footer.php" ?>