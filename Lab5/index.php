<?php 
session_start();
if(!isset($_SESSION["username"])) {
    // redirect to signup
    header("Location: Signup.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    unset($_COOKIE['PHPSESSID']); 
    setcookie('PHPSESSID', '', -1, '/');
    session_destroy();
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome - <?php echo $_SESSION["username"] ?></title>
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
</head>
<body>
    <div class="row py-5 mx-3">
        <h1 class="col-6">Welcome - <?php echo $_SESSION["username"] ?></h1>
        <form class="col-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <button class="btn btn-danger" name="logout">Logout</button>
        </form>
    </div>
    <?php // print_r($_SESSION) ?>
</body>
</html>