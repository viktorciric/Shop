<?php
require_once "app/config/config.php";
require_once "app/classes/User.php";
$user = new User();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shop</title>
    <link rel="stylesheet" href="public/CSS/register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
 
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container"> 
            <a class="navbar-brand" href="#">Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if(!$user->is_logged()) :?>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Login.php">Login</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M22 9.9a1 1 0 0 0-1-1h-1V5a5 5 0 0 0-5-5H8a5 5 0 0 0-5 5v3.9H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h1v1a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-1h1a1 1 0 0 0 1-1V9.9zM7 5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2H7zm2 12a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm8 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zM6 9.9V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v4.9H6zm12 9.1H6V14h12v4z"/>
                            </svg> Cart
                         </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="orders.php">My orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Logout.php">Logout</a>
                        </li>
                    <?php endif ; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php if(isset($_SESSION['message'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show" role="alert">
            <?php 
                echo $_SESSION['message']['text'];
                unset($_SESSION['message']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="close">X</button>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>

<style>
    #close {
        background-color: gray;
        color:white;
        position: relative;
        right:-1300px ;
        border:none ; 
        border-radius:10px ;
    }
</style>
