<div class="container my-4">
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

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $slug = basename(parse_url($url, PHP_URL_PATH));

    $sql = "SELECT * FROM `comments_table` WHERE `blog_slug`=$slug";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>$result->num_rows Comments</h3>";
        foreach ($result as $row) {
            $commentName = $row["name"];
            $commentMessage = $row["message"];
            echo <<< commentblock
            <div class="card p-2 my-2">
                <h5 class="fw-bold">$commentName</h5>
                <p>$commentMessage</p>
            </div>
            commentblock;
        }
    } else {
        echo "<h3>No Comments. Be the first to leave a comment.</h3>";
    }

    $conn->close();
    ?>
</div>