<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="favicon.ico" type="image/x-icon">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-N2fzAaZotwGXtGJINhkbkRbQwfX/yir9H5nD1xM5JKXehvbzLbfMxlHTRcP0H1SdK8SiYlPQw1R+b47WiYJYQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="SCSS/dist/style.css">
    <link rel="icon" href=" img/siteicon.svg" type="image/svg+xml" sizes="2700x2700">

	<title>SIGN UP</title>
    
</head>
<body>

<form action="signup-check.php" method="post">
    <h2>SIGN UP</h2><br><br><br>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>

    <label for="name"><i class="far fa-user"></i>Username</label>
    <input type="text" id="name" name="name" placeholder="Enter your username" required>

    <label for="email"><i class="far fa-envelope"></i> Email</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>

    <label for="password"><i class="fas fa-lock"></i> Password</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required>
    <span class="password-requirements">Password must be at least 8 characters long, contain at least one uppercase letter (A-Z), one lowercase letter (a-z), and one special character (@, #, $).</span><br>

    <label for="re_password"><i class="fas fa-lock"></i> Confirm Password</label>
    <input type="password" id="re_password" name="re_password" placeholder="Confirm your password" required>

    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" required>
    </div>

    <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter your DOB" required>
    </div>

    <div class="form-group">
        <label for="contact">Contact:</label>
        <input type="tel" class="form-control" id="contact" name="contact" placeholder="Enter your Contact No" required>
    </div>

    <button type="submit">Sign Up <i class="fas fa-arrow-right"></i></button>
    <br><br>
    <a href="index.php" class="ca">Already have an account? <i class="fas fa-sign-in-alt"></i></a>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="signup.js"></script>
</body>
</html>
