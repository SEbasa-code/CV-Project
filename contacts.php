<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Your Portfolio</title>
    <link rel="stylesheet" href="contacts.css">
</head>
<body>
    <header class="header">
        <a href="#" class="logo">Sebastian.</a>
        <nav class="navbar">
            <a href="CV.php">Home</a>
            <a href="personalinfo.php">Personal Info</a>
            <a href="education.php">Education</a>
            <a href="experience.php">Experience</a>
            <a href="skills.php">Skills</a>
            <a href="#" class="active">Contact</a>
            <a href="login.php">Logout</a>
        </nav>
    </header>
    
    <div class="container">
        <main class="row">
            <section class="col">
                <h2>Contact Me</h2>
                <form id="contact-form">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit">Send Message</button>
                </form>
            </section>
        </main>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
