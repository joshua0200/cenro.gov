<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $stmt = $mysqli->prepare("DELETE FROM cases WHERE case_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Case deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>
