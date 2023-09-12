<div class="container my-4">
    <h3>Add a comment</h3>
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

        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $slug = basename(parse_url($url, PHP_URL_PATH));

        $name = $_POST['nameInput'];
        $comment = $_POST['commentInput'];
        $sql = "INSERT INTO `comments_table` (`blog_slug`, `name`, `message`) VALUES ('$slug', '$name', '$comment') ";
        $result = $conn->query($sql);
        if ($result == 1) {
            echo <<<alertTag
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>Alert!</strong> Comment added!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alertTag;
        }

        $conn->close();
    }
    ?>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="nameInput" class="form-label">Enter your name</label>
            <input type="text" class="form-control" id="nameInput" name="nameInput" placeholder="Enter your name">
        </div>
        <div class="mb-3">
            <label for="commentInput" class="form-label">Enter your message here</label>
            <input class="form-control" id="commentInput" name="commentInput" placeholder="Enter your message here" />
        </div>
        <button class="btn btn-primary" type="submit">Submit!</button>
    </form>
</div>