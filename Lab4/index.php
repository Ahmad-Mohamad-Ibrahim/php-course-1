<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
    <!-- Users Table -->
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Mail Status</th>
            <th scope="col" colspan="3" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include 'db.php';
                $ret = mysqli_query($conn, 
                "SELECT id, username, email, gender, mail_status FROM users;"
            );

                if(!$ret) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                if(mysqli_num_rows($ret) > 0) {
                    while($record = mysqli_fetch_assoc($ret)) {
                        echo "<tr>";
                        echo "<th scope=\"row\">" . $record["id"] ."</th>";
                        echo "<td scope=\"row\">" . $record["username"] ."</td>";
                        echo "<td scope=\"row\">" . $record["email"] ."</td>";
                        echo "<td scope=\"row\">" . $record["gender"] ."</td>";
                        echo "<td scope=\"row\">" . ($record["mail_status"] ? "Yes" : "No") ."</td>";
                        echo "<td scope=\"row\">" . "
                        <a class=\"btn btn-link text-info\" role=\"link\" onclick=\"view(this)\">View</a>
                        " ."</td>";

                        echo "<td scope=\"row\">" . "
                        <a class=\"btn btn-link text-info\" role=\"link\" onclick=\"del(this)\">Delete</a>
                        " ."</td>";

                        echo "<td scope=\"row\">" . "
                        <a class=\"btn btn-link text-info\" role=\"link\" onclick=\"updateUser(this)\">Update</a>
                        " ."</td>";
                        echo "</tr>";

                    }
                }

                mysqli_close($conn);

            ?>
        </tbody>
    </table>    
<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>

<script src="./index.js"></script>
</body>
</html>