
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Project</title>
    <link rel="stylesheet" href="education.css">
</head>
<body>
    <header class="header">
        <a href="#" class="logo">Sebastian.</a>
        <nav class="navbar">
            <a href="CV.php">Home</a>
            <a href="personalinfo.php">Personal Info</a>
            <a href="education.php">Education</a>
            <a href="#" class="active">Experience</a>
            <a href="skills.php">Skills</a>
            <a href="contacts.php">Contact</a>
            <a href="login.php">Logout</a>
        </nav>
    </header>
    <div class="container">
        <main class="row">
            <section class="col">
                <header class="title">
                    <h2>EXPERIENCE</h2>
                </header>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "cv_project";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch existing experience entries
                $sql = "SELECT * FROM experiance";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='box' data-id='" . $row["id"] . "'>";
                        echo "<h4 contenteditable='true'>" . $row["year"] . "</h4>";
                        echo "<h3 contenteditable='true'>" . $row["title"] . "</h3>";
                        echo "<p contenteditable='true'>" . $row["description"] . "</p>";
                        echo "<button class='delete'>Delete</button>";
                        echo "</div>";
                    }
                } else {
                    echo "No experience entries found.";
                }
                ?>
                <div class="box" id="new-experience" style="display: none;">
                    <h4 contenteditable="true" placeholder="Year"></h4>
                    <h3 contenteditable="true" placeholder="Title"></h3>
                    <p contenteditable="true" placeholder="Description"></p>
                    <button id="save-new">Save</button>
                </div>
                <button id="add-new">Add New Experience</button>
            </section>
        </main>
    </div>
    <script>
    document.getElementById('add-new').addEventListener('click', () => {
        document.getElementById('new-experience').style.display = 'block';
    });

    document.getElementById('save-new').addEventListener('click', () => {
        const newExperience = document.getElementById('new-experience');
        const year = newExperience.children[0].innerText;
        const title = newExperience.children[1].innerText;
        const description = newExperience.children[2].innerText;

        fetch('add_new_experience.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ year, title, description })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const newBox = document.createElement('div');
                newBox.className = 'box';
                newBox.setAttribute('data-id', data.id);
                newBox.innerHTML = `
                    <h4 contenteditable='true'>${year}</h4>
                    <h3 contenteditable='true'>${title}</h3>
                    <p contenteditable='true'>${description}</p>
                    <button class='delete'>Delete</button>
                `;
                document.querySelector('section.col').insertBefore(newBox, newExperience);
                newExperience.children[0].innerText = '';
                newExperience.children[1].innerText = '';
                newExperience.children[2].innerText = '';
            } else {
                console.error('Error adding new experience entry:', data.message);
            }
        })
        .catch(error => console.error('Error:', error));

        newExperience.style.display = 'none';
    });

    document.addEventListener('click', (event) => {
        if (event.target.classList.contains('delete')) {
            const box = event.target.parentElement;
            const id = box.getAttribute('data-id');
            fetch('delete_experience.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    box.remove();
                } else {
                    console.error('Error deleting experience entry:', data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
    </script>
</body>
</html>

