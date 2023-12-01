<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href=" img/siteicon.svg" type="image/svg+xml" sizes="2700x2700">
    <link rel="stylesheet" href="SCSS/dist/style.css">
    <title>LOGIN</title>

</head>

<body>

 
    <form action="login.php" method="post">
        <div class="logo-container">
             <h2>LOGIN</h2>
        </div>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label for="uname">Username</label>
        <input type="text" id="uname" name="uname" placeholder="Enter your username">

        <label for="password">Password <i class="fas fa-lock"></i></label>
        <input type="password" id="password" name="password" placeholder="Enter your password">
         <button type="submit">Login</button>

        <a href="signup.php" class="ca">Create an account</a>
    </form>
    </div>
    

</body>

</html>
