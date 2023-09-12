<?php

// Server name must be localhost
$servername = "localhost";

// In my case, user name will be root
$username = "root";

// Password is empty
$password = "";

// Creating a connection
$conn = new mysqli($servername, $username, $password, "blog");

// Check connection
if ($conn->connect_error) {
    die("Connection failure: " . $conn->connect_error);
}

function includeWithVariables($filePath, $variables = array(), $print=true) {
    // Extract the variables to a local namespace
    extract($variables);

    // Start output buffering
    ob_start();

    // Include the template file
    include $filePath;

    // End buffering and return its contents
    $output = ob_get_clean();
    if (!$print) {
        return $output;
    }
    echo $output;
}



if ($result->num_rows > 0) {
    foreach ($result as $row) {
        $blogData = array(
            'id' => $row["blogId"],
            'title' => $row["blogTitle"],
            'description' => $row["blogDescription"],
            'content' => $row["blogContent"],
            'date' => $row["blogDate"],
        );
        includeWithVariables("./components/blogdisplay.php", $blogData);
    }
} else {
    echo "0 results";
}

// Closing connection
$conn->close();
