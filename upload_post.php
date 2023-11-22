<?php
include "config.php"; // Include your database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = $_FILES["photo"];
    $filename = $file["name"];
    $filetype = $file["type"];
    $filedata = file_get_contents($file["tmp_name"]);

    // Extract additional form data
    $description = $_POST["description"];
    $caption = $_POST["caption"];

    // Insert all data into the database
    //$sql = "INSERT INTO blog (filename, filetype, data, description, caption) VALUES (?, ?, ?, ?, ?)";
    $sql = "INSERT INTO blog (postCaption, postDescription, data, filename, filetype) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $filename, $filetype, $filedata, $description, $caption);
        if ($stmt->execute()) {
            echo "Post uploaded successfully.";
        } else {
            echo "Error uploading post: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing SQL statement.";
    }
}

$mysqli->close();
?>
