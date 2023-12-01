<?php
session_start();
include "includes/db.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $uname = validate($_POST['name']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $age = validate($_POST['age']);
    $dob = validate($_POST['dob']);
    $contact = validate($_POST['contact']);

    $user_data = 'name=' . $uname . '&email=' . $email . '&age=' . $age . '&dob=' . $dob . '&contact=' . $contact;

    if (empty($uname) || empty($email) || empty($pass) || empty($re_pass) || empty($age) || empty($dob) || empty($contact)) {
        header("Location: signup.php?error=All fields are required&$user_data");
        exit();
    } elseif ($pass !== $re_pass) {
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
        exit();
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$])/", $pass)) {
        header("Location: signup.php?error=Password must meet certain criteria&$user_data");
        exit();
    } else {
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

         $stmt = $conn->prepare("SELECT * FROM users WHERE user_name=? OR email=?");
        $stmt->bind_param("ss", $uname, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $stmt->close();
            header("Location: signup.php?error=The username or email is taken, try another&$user_data");
            exit();
        } else {
            $stmt->close();

             $stmt = $conn->prepare("INSERT INTO users (user_name, email, password, dob, age, contact) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssis", $uname, $email, $hashed_password, $dob, $age, $contact);

            if ($stmt->execute()) {
                $stmt->close();
                header("Location: signup.php?success=Registration successful. You can now log in.");
                exit();
            } else {
                $stmt->close();
                header("Location: signup.php?error=Unknown error occurred&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location:signup.php");
    exit();
}
?>
