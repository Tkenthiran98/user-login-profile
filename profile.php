<?php
session_start();

 if (!isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit();
}


include "includes/db.php";

$user_id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
     echo "User details not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SCSS/dist/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href=" img/siteicon.svg" type="image/svg+xml" sizes="2700x2700">
     <style>
       
    </style>
    <title>www.userdetails.com</title>
</head>
<body>
<h1 class="page-title">User Details </h1>
<a class="logout" href="logout.php">Logout</a>


<h2>Welcome to <?php echo $_SESSION['user_name']; ?>!</h2>


<div class="profile-container">
    <h3>Your Profile Details:</h3>
    <p>Email: <?php echo isset($user['email']) ? $user['email'] : "Not specified"; ?></p>
    <p>Age: <?php echo isset($user['age']) ? $user['age'] : "Not specified"; ?></p>
    <p>Date of Birth: <?php echo isset($user['dob']) ? $user['dob'] : "Not specified"; ?></p>
    <p>Contact: <?php echo isset($user['contact']) ? $user['contact'] : "Not specified"; ?></p>
</div>
</body>
</html>
