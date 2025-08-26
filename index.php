<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
</head>
<body>
    <!-- background -->
    <div class="background">
        <img src="./image/background1.jpg" alt="">
    </div>

    <!-- login form -->
    <div class="wrapper">
        <div class="logo">
            <a href="index.php">
                <img src="./image/logo.jpg" alt="">
            </a>
        </div>
        <div class="text-center mt-4 name">
            Fabric Agency
        </div>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"> <?php echo($_GET['error'])?> </p>
        <?php } ?>
        <form class="p-3 mt-3" method="post" action="./php/login_old.php">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="userName" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="#">Sign up</a>
        </div>
    </div> 
</body>
</html>