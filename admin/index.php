<?php

require_once "../app/config/config.php" ;
require_once "../app/classes/User.php" ;
require_once "../app/classes/Product.php" ;


$user = new User();

if($user->is_logged() && $user->is_admin()) :

$products = new Product();
$products = $products->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <a href="add_product.php" class="btn btn-success">Add Product</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Size</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>

            <tbody>
                <?php foreach($products as $product) : ?>
                <tr>
                    <th scope="row"><?= $product['product_id']; ?></th>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['size'] ?></td>
                    <td><?= $product['image'] ?></td>
                    <td><?= $product['created_at'] ?></td>
                    <td>
                        <a href="edit_product.php?id=<?= $product['product_id'];?>" class="btn btn-primary">Edit</a>
                        <a href="delete_prduct.php?id=<?= $product['product_id'];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

<?php endif; ?>

