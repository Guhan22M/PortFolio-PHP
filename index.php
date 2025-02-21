<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <header>
        <h1>Personal Portfolio</h1>
    </header>
    <main>
        <section id="about">
            <h2>About Me</h2>
            <?php
            $result = $conn->query("SELECT * FROM user_details WHERE id = 1");
            $user = $result->fetch_assoc();
            ?>
            <img src="<?php echo $user['profile_picture']; ?>" alt="Profile Picture">
            <h3><?php echo $user['name']; ?></h3>
            <p><?php echo $user['bio']; ?></p>
            <p>Email: <?php echo $user['email']; ?></p>
            <p>Location: <?php echo $user['location']; ?></p>
        </section>
        <section id="projects">
            <h2>Projects</h2>
            <?php
            $projects = $conn->query("SELECT * FROM projects");
            while ($project = $projects->fetch_assoc()) {
                echo "<div class='project'>
                    <h3>{$project['title']}</h3>
                    <p>{$project['description']}</p>
                    <p><strong>Tech Stack:</strong> {$project['tech_stack']}</p>
                    <a href='{$project['project_url']}' target='_blank'>View Project</a>
                </div>";
            }
            ?>
        </section>
        <section id="skills">
            <h2>Skills</h2>
            <?php
            $skills = $conn->query("SELECT * FROM skills");
            while ($skill = $skills->fetch_assoc()) {
                echo "<p>{$skill['skill_name']} - {$skill['proficiency_level']}%</p>";
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Personal Portfolio</p>
    </footer>
</body>
</html>
