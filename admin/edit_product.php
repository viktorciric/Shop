<?php
require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";


$user = new User();

if($user->is_logged() && $user->is_admin()) :

    $product_obj = new Product();
    $product = $product_obj->read($_GET['id']);

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $product_id = $_GET['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $image = $_POST['image'];

        $product_obj->update($product_id, $name, $price, $size, $image) ;

        header("Location: index.php");
        exit;
    }
endif; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5/dist/dropzone.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<form action="" method="POST">
<div class="form-group">  <input type="tex" name="name" value="<?= $product['name']?>"></div>
<div class="form-group">  <input type="text" name="price" value="<?= $product['price']?>"></div>
<div class="form-group"> <input type="text" name="size" value="<?= $product['size']?>"></div>
<div class="form-group"> <input type="submit" class="btn btn-primary" value="Update Products">
</form>


</body>
</html>

<style>
.form-group input[name="name"],
.form-group input[name="price"],
.form-group input[name="size"] {
 
    position: relative;
    right: -500px ;
    width:500px ;
    margin:15px;
    }
.dropzone {
    width: 300px ;
    position: relative;
    right: -620px;
}

.form-group input[type="submit"] {
    position: relative;
    right: -700px ;
    margin:15px;
}
</style>




