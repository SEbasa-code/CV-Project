<?php
  session_start();
  include("db.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
        // Query to fetch the user by email
        $query = "SELECT * FROM form WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($result)
        {
            // If user exists
            if(mysqli_num_rows($result) > 0) 
            {
                $user_data = mysqli_fetch_assoc($result);

                // Compare the entered password with the stored plain-text password
                if($user_data["password"] == $password)
                {
                    // Login successful
                    $_SESSION['email'] = $email;
                    header("location:CV.php");
                    die;
                }
                else
                {
                    echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
                }
            } 
            else
            {
                echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
            }
        }
        else
        {
            echo "<script type='text/javascript'> alert('Database error')</script>";
        }
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
    <meta name="viewpoint"	content="width=device-width,initial-scale=1.0">
    <title>CV Project</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="Login">
        <h1>Login</h1>
        <form method="post">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" name=""value="Submit" >

        </form>
        <p>Not have an accout?<a href="Register.php">Sign Up here</a></p>
        
</body>
</html>