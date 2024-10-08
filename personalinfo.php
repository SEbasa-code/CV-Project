<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewpoint"	content="width=device-width,initial-scale=1.0">
    <title>CV Project</title>
    <link rel="stylesheet" href="beautiful.css">

</head>
<body>
    <header class="head">
        <a href="#" class="logo">Sebastian.</a>
        <nav class="navbar">
            <a href="CV.php" >Home</a>
            <a href="#" class="active">Personal Info</a>
            <a href="education.php">Education</a>
            <a href="experiance.php">Experiance</a>
            <a href="skills.php">Skills</a>
            <a href="contacts.php">Contact</a>
            <a href="login.php">Logout</a>
        </nav>
    </header>
    <section class="container">
        <header>Personal infomation</header>
        
        <form action="Save.php" method="post" class="form"><div class="input-box">
            <label>Full Name</label>
            <input type="text" id="fullname" name="fullname" value="Sebasa Mokwele" required/>
        </div>
        <form action="Save.php" method="post" class="form"><div class="input-box">
            <label>Email Address</label>
            <input type="text" name="Email" value="thomassebasa@gmail.com" required/>
        </div>
        <div class="column">
            <form action="Save.php" method="post" class="form"><div class="input-box" >
                <label>Phone number</label>
                <input type="text" name="Phonenumber" value="0660139016"required/>
            </div>

            <form action="Save.php" method="post" class="form">
                <div class="input-box">
                <label>Birth date</label>
                <input type="text" name="Birthdate" value="17/11/2005" required/>
            </div>
        </div>
        <div class="gender-box">
            <h3>
                Gender
            </h3>
            <div class="gender-option">
                <div class="gender">
                    <input type="radio" id="check-male" name="Gender" value="m" checked/>
                    <label for="check-male">Male</label>
                </div>
                <div class="gender">
                    <input type="radio" id="check-female" name="Gender" value="f" />
                    <label for="check-female">Female</label>
                </div>
                <div class="gender">
                    <input type="radio" id="check-other" name="Gender" value="o" />
                    <label for="check-other">Prefer no to say</label>
                </div>
            </div>
        </div>

        <div class="input-box">
            <label>Home address</label>
            <input type="text" name="HomeAddress" value="759, seshego, zone8, polokwane" required/>
        </div>
        <input type="submit" class="btn btn-primary">
    </form>

    </section>










</body>




</html>