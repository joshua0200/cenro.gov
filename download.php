<?php 
        // Get the file name from the "file" parameter
        $filename = $_GET['file'].".pdf";
        // Define the file path (replace with the path to your file)
        $file = "forms/application forms/".$filename;

        // Check if the file exists
        if (file_exists($file)) {
            // Set the appropriate headers to trigger a download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
        // Output the file content
            readfile($file);
            exit;
        } else {
        // File not found
            echo 'File not found.';
            echo $file;
        }
?>