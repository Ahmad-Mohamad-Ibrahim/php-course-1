<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Form</title>
</head>
<body>
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);


        $nameErr = $emailErr = $genderErr = $groupErr = $websiteErr = "";
        $name = $email = $gender = $group = $comment = $website = "";
        $error = false;

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            if(empty($_POST["name"])) {
                $nameErr = "Name is required!";
                $error = true; 
            }
            else {
                $name = $_POST["name"];
            }

            if(empty($_POST["email"])) {
                $emailErr = "Email is required!";
                $error = true; 
            }
            else {
                $email = $_POST["email"];
            }

            if(empty($_POST["group"])) {
                $groupErr = "Group is required!";
                $error = true; 
            }
            else {
                $group = $_POST["group"];
            }

            if(empty($_POST["gender"])) {
                $genderErr = "gender is required!";
                $error = true; 
            }
            else {
                $gender = $_POST["gender"];
            }

        

            // echo "Name          : {$name}<br>";
            // echo "Email         : {}<br>";
            // echo "Group #       : {$_POST['group']}<br>";
            // echo "Class details : {$_POST['classDetails']}<br>";
            // // echo $_POST['classDetails'] ?"Gender : {$_POST['classDetails']}<br>";
            // echo "Gender is : {$_POST['gender']}<br>";
            // echo "Courses : ";
            // foreach($_POST['courses'] as $course ) {
            //     echo $course . " ,"; 
            // } 
            // echo "<br>";
            // echo "Agreed : " . (isset($_POST['agree']) == 1 ? "yes" : "No");


        }
    ?>
<div id="formContainer" class="container py-5">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input  value="<?php if(empty($nameErr)) { echo htmlspecialchars($_POST['name']);} ?>" type="text" class="form-control" name="name" id="name" placeholder="Name">
            <span class="highlight">*<?php echo $nameErr ?></span>
          </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input value="<?php if(empty($emailErr)) { echo htmlspecialchars($_POST['email']);} ?>" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
          <span class="highlight">*<?php echo $emailErr ?></span>
        </div>


        <div class="mb-3">
            <label for="group" class="form-label">Group</label>
            <input value="<?php if(empty($groupErr) && $error) { echo htmlspecialchars($_POST['group']);} ?>" type="text" class="form-control" name="group" id="group" placeholder="Group">
          <span class="highlight">*<?php echo $groupErr ?></span>

          </div>

        <div class="mb-3">
            <label for="classDetails" class="form-label">Class Details</label>
            <textarea class="form-control" name="classDetails" id="classDetails" rows="3"></textarea>
        </div>

        <div class="form-check col-5 d-inline-block">
            <input class="form-check-input" type="radio" value="male" name="gender" id="male">
            <label class="form-check-label" for="male">
              Male
            </label>
          </div>
          <div class="form-check col-5 d-inline-block">
            <input class="form-check-input" type="radio" value="female" name="gender" id="female" checked>
            <label class="form-check-label" for="female">
              Female
            </label>
          </div>

          <select class="form-select" aria-label="Courses" width=300 style="width: 350px"
                size="8" name="courses[]" multiple>
            <option value='blue'>Blue</option>
            <option value='green'>Green</option>
            <option value='red'>Red</option>
            <option value='yellow'>Yellow</option>
            <option value='orange'>Orange</option>
        </select>

       <div class="form-check">
        <label class="form-check-label" for="agree">
            Agree
          </label>
            <input class="form-check-input" type="checkbox" value="" name="agree" id="agree">
        </div>
        <button type="submit" class="btn btn-primary" name="sub">Submit</button>
      </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>