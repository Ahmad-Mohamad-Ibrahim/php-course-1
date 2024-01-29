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
            
        $nameErr = $emailErr = $genderErr = "";
        $name = $email = $gender = $agree = "";
        $error = false;
        $update = false;

        if(isset($_GET["userId"]) && !empty($_GET["userId"])) {
            $update = true;
            $name = $_GET["name"];
            $email = $_GET["email"];
            $gender = $_GET["gender"];
            $agree = $_GET["reciveMail"];
            $_SESSION["userID"] = $_GET["userId"];
            $_SESSION["update"] = 1;
        }

        // html Variables

        // gender check when updating
        $female_checked = $male_checked = "";
        if(isset($_GET["gender"])) {
            if($gender == "F" && $update) {
                $female_checked = "checked";
            }
            else if($gender == "M" && $update) {
                $male_checked = "checked";

            }
            else {
                $female_checked = "checked";
            }
        }
            
        // receieveMail checked
        $recieve_mail_checked = "";
        if(isset($_GET["reciveMail"])) {
            if($agree == 1 && $update) {
                $recieve_mail_checked =  "checked";
            }
        }

        // email placeholder
        $email_placeholder = "";
        if(isset($_SESSION["email"]) && !$update) 
            $email_placeholder =  htmlspecialchars($_SESSION["email"]);
        else if($update) {
            $email_placeholder = htmlspecialchars($email);
        }

        // username placeholder
        $username_placeholder = "";
        if(isset($_SESSION["username"]) && !$update) 
            $username_placeholder =  htmlspecialchars($_SESSION["username"]);
        else if($update) {
            $username_placeholder = htmlspecialchars($name);
        }

        // get form input
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
                if(isset($_SESSION["update"])) {
                    // echo $_SESSION["update"];
                    $sql = "UPDATE users
                    SET username = \"$name\",email = \"$email\", 
                    gender = \"$gender\",mail_status = $agree
                    WHERE id = " . $_SESSION["userID"] .  ";";
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
            session_destroy();

        }
        
    ?>
    <h1 class="text-center p-3 m-2">Add User</h1>
    <div id="formContainer" class="container py-5">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="<?php 
                    echo $username_placeholder;
                 ?>"  type="text" class="form-control" name="name" id="name" placeholder="Name">
                <span class="highlight">*<?php echo $nameErr ?></span>
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input value="<?php 
                echo $email_placeholder;
            ?>" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
            <span class="highlight">*<?php echo $emailErr ?></span>
            </div>

            <div class="form-check col-5 d-inline-block">
                <input class="form-check-input" type="radio" value="M" name="gender" id="male"
                <?php 
                    echo htmlspecialchars($male_checked);
                ?>
                >
                <label class="form-check-label" for="male">
                Male
                </label>
            </div>
            <div class="form-check col-5 d-inline-block">
                <input class="form-check-input" type="radio" value="F" name="gender" id="female" 
                <?php 
                     echo htmlspecialchars($female_checked);
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
                        echo $recieve_mail_checked;
                    ?>
            >
        </div>
            <button type="submit" class="btn btn-primary" name="sub" onclick="window.location.replace(`./index.php`);">Submit</button>
        </form>
    </div>
    
</body>
</html>
