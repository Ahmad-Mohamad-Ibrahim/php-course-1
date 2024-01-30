<?php 

$nameErr = $passwordErr = "";
$name = $password = "";
$error = false;
$errorText = "";


if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["username"])) {
        $nameErr = "Name is required!";
        $error = true; 
    }
    else {
        $name = $_POST["username"];
    }

    if(empty($_POST["password"])) {
        $passwordErr = "Password is required!";
        $error = true; 
    }
    else {
        $password = $_POST["password"];
    }

    if(! $error) {

        // first query database to check if username is found
        
        include 'db.php';
        $sql = "SELECT id FROM users WHERE username = \"" . $name . "\";";
        $ret = mysqli_query($conn, $sql);

        if(! $ret) {
            print("Connection failed: " . mysqli_connect_error());
        }
        if(mysqli_num_rows($ret) > 0) {
            // username already exists
            $error = true;
            $errorText = "Username Exists";
        }
        mysqli_close($conn);
    }

        if(! $error) {
            include 'db.php';
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT, array("cost" => 10));
            // $pass = $_POST["password"];
            $sql = "INSERT INTO users (username, pass_hash) 
            VALUES (\"$name\", \"$hash\");";
            $ret = mysqli_query($conn, $sql);

            if(! $ret) {
                print("Connection failed: " . mysqli_connect_error());

            }
            mysqli_close($conn);
            header("Location:login.php");
        }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h2 class="text-center my-4">Sign Up</h2>
    <div id="formContainer" class="container py-5">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input  value="<?php echo htmlspecialchars($name);?>" type="text" class="form-control" name="username" id="username" placeholder="Name">
                <span style="color:red;" class="highlight">*<?php echo $nameErr ?></span>
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <span style="color:red;">*<?php echo $passwordErr ?></span>
            <i class="far fa-eye eye-icon" id="togglePassword"></i>
            </div>
    
            <button type="submit" class="btn btn-primary" name="sub">Sign Up</button>
            <a class="mx-5" href="./login.php">Log in here</a>
            <p style="color:red;"><?php echo $errorText ?></p>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>




