<?php  
require_once "inc/header.php" ;
require_once "app/classes/user.php";

if($user->is_logged()) {
    header("location: index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $results = $user->login($username, $password);

    if(!$results) {
        $_SESSION['message']['type'] = "danger" ;
        $_SESSION['message']['text'] = "Netacan Username ili Password";

        header("location: login.php");
        exit();

    }

    header("location: index.php");
    exit();
}
?>

<div class="justify-content-center" id="div">
    <div class="col-lg-5">
        <h3 class="text-center py-5">Login</h3>
        <form action="" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" name="username" class="form-control" id="username">
        </div>

        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <input type="checkbox" id="showPassword"> <- Show password
        </div>
            <button type="submit" class="btn btn-primary" id="btn">Login</button>
        </form>
        <a href="register.php" id="href">Register</a>
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
    
#div {
   position: relative;
   right: -500px ;
}

#btn {
    position: relative;
    right: -250px ;
}

#href {
    position: relative;
    top:-50px ;
}
</style>