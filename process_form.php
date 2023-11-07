<?php 
    include "config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $label = $_POST["label"];
        $status = $_POST["status"];
    
        // Insert data into the database
        $sql = "INSERT INTO cases (case_desc, stat) VALUES (?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("si", $label, $status);
    
        if ($stmt->execute()) {
            echo "Data inserted successfully.";
            header("Location: cases.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    }
    
    // Close the database connection
    $mysqli->close();
    ?>
