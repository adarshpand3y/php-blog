<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Php blog website</title>
    <style>
        <?php include "./css/style.css"; ?>
    </style>
</head>

<body>
    <?php
    include_once "./components/navbar.php";
    ?>
    <!-- <div class="container max-wid main">
        <h1 class="text-center pt-2 mt-0 mb-2">Showing all blogs</h1>
        <?php include "./utils/fetchposts.php"; ?>
    </div>  -->

    <div class="p-5 mb-4 bg-body-tertiary bg-contact">
        <div class="container p-5">
            <h1 class="display-1 fw-bold">Contact Me</h1>
            <p class="col-md-8 fs-1 text-center">Have questions? I have answers.</p>
        </div>
    </div>
    <div class="container max-wid">
        <p class="lead text-center fs-4">Fill the form below to get in touch.</p>
        <div id="alertDiv">

        </div>
        <form action="/phpblog/contact.php" method="POST">
            <div class="mb-3">
                <label for="nameInput" class="form-label">Enter your name</label>
                <input name="user_name" type="text" class="form-control" id="nameInput" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Enter your email</label>
                <input name="user_email" type="email" class="form-control" id="emailInput" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="messageInput" class="form-label">Enter your message</label>
                <textarea name="user_message" class="form-control" id="messageInput" rows="3" placeholder="Enter your message"></textarea>
            </div>
            <center>
                <button class="btn btn-primary mb-3">Submit!</button>
            </center>
        </form>
    </div>

    <?php
    include "./components/footer.php";
    ?>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $message = $_POST['user_message'];
        $sql = "INSERT INTO contact_table (name, email, message) VALUES ('$name', '$email', '$message')";
        $result = $conn->query($sql);
        if($result == 1) {
            echo "<script>";
                require("./scripts/contactsuccessscript.js");
            echo "</script>";

        }

        $conn->close();
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>