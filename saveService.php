<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $label = $_POST["label"];
    $details = $_POST["serviceSteps"];
    $id = $_POST["id"]; // Get the id if it exists

    if (empty($id)) {
        // No id provided, so we're inserting a new record
        $sql = "INSERT INTO services (serviceLabel, serviceSteps) VALUES (?, ?)";
    } 
    else {
    	// An id is provided, so we're updating an existing record
    	$sql = "UPDATE services SET serviceLabel = ?, serviceSteps=?, WHERE case_id = ?";
    }

    $stmt = $mysqli->prepare($sql);

    if (empty($id)) { 
        $stmt->bind_param("ss", $label, $details);
    } else {
        $stmt->bind_param("ssi", $label, $details, $id);
    }

    if ($stmt->execute()) {
        //echo "Data inserted or updated successfully.";
        
        header("Location: services.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>