<?php
require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";

$user = new User();

if($user->is_logged() && $user->is_admin()) :

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $product = new Product();

        $name = $_POST['name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $image = $_POST['Photo_path'];

        $product->create($name, $price, $size, $image);

        header("Location: index.php");
    }

endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>



<link rel="stylesheet" href="https://unpkg.com/dropzone@5.9.3/dist/min/dropzone.min.css" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


<form action="" method="POST"> 
    <div class="form-group"><input type="text" name="name" placeholder="Product Name"></div>
    <div class="form-group">  <input type="text" name="price" step="0.01" placeholder="Product Price"></div>
    <div class="form-group"> <input type="text" name="size" placeholder="Product Size"></div>
    <div class="form-group"> <input type="hidden" name="Photo_path" id="photoPathInput"></div>
    <div class="form-group"> <div id="dropzone-upload" class="dropzone"></div></div>
    <div class="form-group">  <input type="submit" value="Add Product" class="btn btn-primary"></div>
</form>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> 

<script>
    Dropzone.options.dropzoneUpload = {
        url: "upload_photo.php",
        paramName: "photo",
        maxFilesize: 20, // MB
        acceptedFiles: "image/*", 
        init: function () {
            this.on("success", function (file, response) {
                const jsonResponse = JSON.parse(response); 
                if(jsonResponse.success)  {
                    document.getElementById('photoPathInput').value = jsonResponse.photo_path;
                } else {
                    console.error(jsonResponse.error);
                }
            });
        }
    };
</script>
<body>
    
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
