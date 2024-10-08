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
            <a href="#" class="active">Education</a>
            <a href="experiance.php">Experiance</a>
            <a href="skills.php">Skills</a>
            <a href="contacts.php">Contact</a>
            <a href="login.php">Logout</a>
        </nav>
    </header>
    <div class="container">
        <main class="row">
            <section class="col">
                <header class="title">
                    <h2>EDUCATION</h2>
                </header>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "cv_project";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch existing education entries
                $sql = "SELECT * FROM education";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='box' data-id='" . $row["id"] . "'>";
                        echo "<h4 contenteditable='true'>" . htmlspecialchars($row["start_year"]) . " - " . htmlspecialchars($row["end_year"]) . "</h4>";
                        echo "<h3 contenteditable='true'>" . htmlspecialchars($row["degree"]) . "</h3>";
                        echo "<p contenteditable='true'>" . htmlspecialchars($row["description"]) . "</p>";
                        echo "<button class='delete'>Delete</button>";
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
                <button id="add-new">Add New</button>
                <div id="new-education" style="display: none;">
                    <h4 contenteditable="true" placeholder="Start Year - End Year"></h4>
                    <h3 contenteditable="true" placeholder="Degree"></h3>
                    <p contenteditable="true" placeholder="Description"></p>
                    <button id="save-new">Save</button>
                </div>
            </section>
        </main>
    </div>
    <script>
    document.getElementById('add-new').addEventListener('click', () => {
        document.getElementById('new-education').style.display = 'block';
    });

    document.getElementById('save-new').addEventListener('click', () => {
        const newEducation = document.getElementById('new-education');
        const startYear = newEducation.children[0].innerText;
        const endYear = prompt("Please enter the end year"); // Prompt for end year
        const degree = newEducation.children[1].innerText;
        const description = newEducation.children[2].innerText;

        fetch('add_new_education.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ startYear, endYear, degree, description })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const newBox = document.createElement('div');
                newBox.className = 'box';
                newBox.setAttribute('data-id', data.id); // Set data-id for delete functionality
                newBox.innerHTML = `
                    <h4 contenteditable='true'>${startYear} - ${endYear}</h4>
                    <h3 contenteditable='true'>${degree}</h3>
                    <p contenteditable='true'>${description}</p>
                    <button class='delete'>Delete</button>
                `;
                document.querySelector('section.col').insertBefore(newBox, newEducation);
                newEducation.children[0].innerText = '';
                newEducation.children[1].innerText = '';
                newEducation.children[2].innerText = '';
                newEducation.style.display = 'none'; // Hide new education form after saving
            } else {
                console.error('Error adding new education entry:', data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });

    document.addEventListener('click', (event) => {
        if (event.target.classList.contains('delete')) {
            const box = event.target.parentElement;
            const id = box.getAttribute('data-id');
            if (id) {
                fetch('delete_education.php', {
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
                        console.error('Error deleting education entry:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            } else {
                box.remove(); // If there's no ID, just remove the box
            }
        }
    });
    </script>
</body>
</html>

