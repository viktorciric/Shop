<?php 

require_once "inc/header.php" ;

require_once "app/classes/User.php" ;

if($user->is_logged()) {
    header("location: index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ;
    $username = $_POST["username"] ;
    $email = $_POST["email"] ;
    $password =$_POST["password"] ;

    $created = $user->create($name, $username, $email, $password) ;
    
    if($created) {
        $_SESSION['message']['type'] = "success" ;
        $_SESSION['message']['text'] = "Uspesno ste se registrovali" ;
        header("location: index.php") ;
        exit();
    }else {
        $_SESSION['message']['type'] = "danger" ;
        $_SESSION['message']['text'] = "Greska pri gegistrovanju korisnika" ;
        header("location: register.php") ;
        exit();
    }

}
?>

<?php require_once "inc/header.php" ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <h1 class="text-center mt-6 mb-3" id="h1">Registracija</h1>
            <form action="" method="POST">
                <div class="form-group mb-3" id="FullName">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group mb-3" id="Username">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="form-group mb-3" id="gmail">
                    <label for="email">Gmail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group mb-3" id="Password">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <input type="checkbox" id="showPassword"> <- Show password
                </div>
               
                <input type="submit" class="btn btn-primary" id="Button" value="Registruj se">
                <a href="login.php" id="href">Login</a>
            </form>
        </div>
    </div>
</div>



 <script>
 let passwordInput = document.getElementById("password");
 let showPassword = document.getElementById("showPassword");

 showPassword.addEventListener("change", function() {
  if (showPassword.checked) {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
 });
 </script>

 <?php require_once "inc/footer.php" ?>
<style>
    * {
        overflow: hidden;
    }

    .container #gmail {
    font-size: 15px;
    border: none;
    width: 500px;
    position: relative;
    right: -200px;
}

#href {
    position: relative;
    top:-30px ;
    right: -85px ;
}

#h1 {
    position: relative;
    right: 100px ;
}
</style>

