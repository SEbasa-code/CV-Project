<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Corrected "viewpoint" -->
    <title>CV Project</title>
    <link rel="stylesheet" href="cv.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
    <header class="header">
    <a href="#" class="logo">Sebastian.</a>
    <nav class="navbar">
        <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="personalinfo.php">Personal Info</a></li>
            <li><a href="education.php">Education</a></li>
            <li><a href="experiance.php">Experience</a></li>
            <li><a href="skills.php">Skills</a></li>
            <li><a href="contacts.php">Contact</a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>
    </nav>
</header>

    </header>
    <section class="home">
        <div class="home-content">
            <h1>Hi, I'm Sebasa Mokwele</h1>
            <h3>University student</h3>
            <p>Hello everyone! My name is Sebasa Mokwele. I’m currently studying BSC mathematical sciences at University of Limpopo. I have a passion for TECHNOLOGY and I’m eager to deepen my knowledge and skills in this area.</p>
            <div class="btn-box">
                <a href="#">Hire me</a>
                <a href="#">Let's talk</a>
            </div>
        </div>
        <div class="home-sci">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-whatsapp'></i></a>
            <a href="#"><i class='bx bxl-linkedin'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
        </div>
        <span class="home-imghover"></span>
    </section>
    <script>
    const toggleButton = document.querySelector('.toggle');
    const navbar = document.querySelector('.navbar');

    toggleButton.addEventListener('click', () => {
        navbar.classList.toggle('active');
    });
</script>
</body>


</html>


















