<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caseNum = $_POST["caseNum"];
    $label = $_POST["label"];
    $details = $_POST["caseDetails"];
    $status = $_POST["status"];
    $id = $_POST["id"]; // Get the id if it exists

    if (empty($id)) {
        // No id provided, so we're inserting a new record
        $sql = "INSERT INTO cases (case_number, case_desc, case_details, stat) VALUES (?, ?, ?, ?)";
    } else {
        // An id is provided, so we're updating an existing record
        $sql = "UPDATE cases SET case_number = ?, case_desc = ?, case_details=?, stat = ? WHERE case_id = ?";
    }

    $stmt = $mysqli->prepare($sql);

    if (empty($id)) { 
        $stmt->bind_param("sssi", $caseNum, $label, $details, $status);
    } else {
        $stmt->bind_param("sssii", $caseNum, $label, $details, $status, $id);
    }

    if ($stmt->execute()) {
        echo "Data inserted or updated successfully.";
        
        //header("Location: cases.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$mysqli->close();
?>
