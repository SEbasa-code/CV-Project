<?php
  session_start();
  include("db.php");

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
        // Directly use the password without hashing
        $plain_password = $password;

        $query = "INSERT INTO form (fname, lname, gender, contact, email, address, password) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $gender, $contact, $email, $address, $plain_password);
        mysqli_stmt_execute($stmt);

        if(mysqli_stmt_affected_rows($stmt) > 0)
        {
            echo "<script type='text/javascript'> alert('Successful Register')</script>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('Registration failed')</script>";
        }

        mysqli_stmt_close($stmt);
    }
    else
    {
        echo "<script type='text/javascript'> alert('Please Enter Some Valid Information')</script>";
    }
  }

  mysqli_close($con);
?>


<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>CV Project</title>
    <link rel="stylesheet" href="register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<video autoplay loop muted id="background-video">
        <source src="videos/vovo.mp4" type="video/mp4">
    </video>
    <div class="signup">
        <h1>Sign up</h1>
        <h4>It's free a only takes a minute </h4>
        <form method="post">
            <label>First Name</label>
            <input type="text" name="fname" required>
            <label>Last Name</label>
            <input type="text" name="lname" required>
            <label>Gender</label>
            <input type="text" name="gender" required>
            <label>Contact</label>
            <input type="text" name="contact" required>
            <label>Address</label>
            <input type="text" name="address" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" value="Submit" >
        </form>
        <p>By clicking the Sign Up button, you agree to our<br>
            <a href="#">Terms and Conditions</a> and <a href="#">Policy Privacy </a>
        </p>
        <p>Already have an account?<a href="login.php">Login Here</a></p>
    </div>
</body>
</html>