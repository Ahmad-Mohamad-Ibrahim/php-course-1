<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - <?php echo "user " . $_GET["userId"]; ?></title>
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Users</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./form.php">Add User</a>
            </li>
            <li class="nav-item">
        </ul>
        </div>
    </div>
    </nav>

<?php 
    include 'db.php';
    // session_start();
    // echo $_SESSION["favanimal"];

    $userid = $_GET["userId"];
    echo "<h1 class=\"text-center p-5\">" ."user " . $userid . "</h1>"; 

    $sql = "SELECT username, email, gender, mail_status FROM users WHERE id = " . " $userid;";

    $ret = mysqli_query($conn, $sql);
    if(!$ret) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(mysqli_num_rows($ret) > 0) {
        while($record = mysqli_fetch_assoc($ret)) {
            echo "<div class=\"container\">";
            echo "<h2 class=\"text-center text-primary bg-secondary-subtle\">" . $record["username"] . "</h2>";
            echo "<h4 class=\"text-center  text-primary bg-secondary-subtle\">Email: " . $record["email"] . "</h4>";
            echo "<p class=\"text-center text-primary bg-secondary-subtle\">Gender: " . $record["gender"] . "</p>";
            echo "<p class=\"text-center text-primary bg-secondary-subtle\">Recive Emails: " . ($record["mail_status"] ? "Yes" : "No") . "</p>";
            echo "</div>";
        }
    }
?>
</body>
</html>