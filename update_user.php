<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Details</title>
</head>
<body>
    <h2>Update User Details</h2>
    <form action="update_user.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="bio">Bio:</label>
        <textarea id="bio" name="bio"></textarea>
        
        <label for="profile_picture">Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location">
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $profile_picture = "";
    if ($_FILES["profile_picture"]["name"]) {
        $target_dir = "uploads/";
        $profile_picture = $target_dir . basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_picture);
    }
    $sql = "UPDATE user_details SET 
                name='$name', 
                bio='$bio', 
                email='$email', 
                location='$location', 
                profile_picture='$profile_picture', 
                updated_at=NOW()
            WHERE id=1";

    if ($conn->query($sql) === TRUE) {
        echo "Details updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
