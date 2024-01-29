<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
</head>
<style>
    .highlight {
        color : red;
    }
</style>
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
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
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
        $nameErr = $emailErr = $genderErr = "";
        $name = $email = $gender = $agree = "";
        $error = false;
        $update = false;

        if(isset($_GET["userId"]) && !empty($_GET["userId"])) {
            $update = true;
            $name = $_GET["name"];
            $email = $_GET["email"];

        }
        if(isset($_POST['sub']) && $_SERVER["REQUEST_METHOD"] == "POST") {
            include 'db.php';
            if(empty($_POST["name"])) {
                $nameErr = "Name is required!";
                $error = true; 
            }
            else {
                $name = $_POST["name"];
                $_SESSION["username"] = $name;
            }

            if(empty($_POST["email"])) {
                $emailErr = "Email is required!";
                $error = true; 
            }
            else {
                $email = $_POST["email"];
                $_SESSION["email"] = $email;
            }

            if(empty($_POST["gender"])) {
                $genderErr = "gender is required!";
                $error = true; 
            }
            else {
                $gender = $_POST["gender"];
            }

            if(!isset($_POST["agree"])) {
                $agree = 0; 
            }
            else {
                $agree = 1;
            }
            if(!$error) {
                $sql = "";
                if($update) {
                    $sql = "UPDATE users
                    SET username = \"$name\",email = \"$email\", 
                    gender = \"$gender\",mail_status = $agree
                    WHERE id = " . $_GET["userId"] . ";";
                }
                else {
                    $sql = "INSERT INTO users (username, email, gender, mail_status) 
                    VALUES (\"$name\", \"$email\", \"$gender\", $agree);";
                }
                $ret = mysqli_query($conn, $sql);

                if(! $ret) {
                die("Connection failed: " . mysqli_connect_error());
                }
            }
            

            mysqli_close($conn);

            function get_name_val() {
                
            }

            function get_email_val() {
                
            }
        }
        
    ?>
    <h1 class="text-center p-3 m-2">Add User</h1>
    <div id="formContainer" class="container py-5">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="<?php 
                    if(isset($_SESSION["username"]) && !$update) 
                        echo htmlspecialchars($_SESSION["username"]);
                    else if($update) {
                        echo htmlspecialchars($name);
                    }
                 ?>"  type="text" class="form-control" name="name" id="name" placeholder="Name">
                <span class="highlight">*<?php echo $nameErr ?></span>
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input value="<?php 
                if(isset($_SESSION["username"]) && !$update) 
                    echo htmlspecialchars($_SESSION["username"]);
                else if($update) {
                    echo htmlspecialchars($email);
                }
            ?>" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
            <span class="highlight">*<?php echo $emailErr ?></span>
            </div>

            <div class="form-check col-5 d-inline-block">
                <input class="form-check-input" type="radio" value="M" name="gender" id="male"
                <?php 
                    if(isset($_GET["gender"])) {
                        if($_GET["gender"] == "M" && $update) {
                            echo "checked";
                        }
                    }
                ?>
                >
                <label class="form-check-label" for="male">
                Male
                </label>
            </div>
            <div class="form-check col-5 d-inline-block">
                <input class="form-check-input" type="radio" value="F" name="gender" id="female" 
                <?php 
                    if(isset($_GET["gender"])) {
                        if($_GET["gender"] == "F" && $update) {
                            echo "checked";
                        }
                    }
                    else {
                        echo "checked";
                    }
                ?>
                >
                <label class="form-check-label" for="female">
                Female
                </label>
            </div>
        <div class="form-check my-5">
            <label class="form-check-label" for="agree">
                Agree to Recieve Emails.
            </label>
            <input class="form-check-input" type="checkbox" value="" name="agree" id="agree" 
                    <?php 
                        if(isset($_GET["reciveMail"])) {
                            if($_GET["reciveMail"] == 1 && $update) {
                                echo "checked";
                            }
                    }
                    ?>
            >
        </div>
            <button type="submit" class="btn btn-primary" name="sub" onclick="window.location.replace(`./index.php`);">Submit</button>
        </form>
    </div>
    
</body>
</html>
