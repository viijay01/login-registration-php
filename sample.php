<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container">
        <h1>Employee Registration</h1>
        <?php
        if (isset($_POST["submit"])) {
            $FullName = $_POST["FullName"];
            $Email = $_POST["Email"];
            $Password = $_POST["Password"];
            $ReEnterPassword = $_POST["ReEnterPassword"];

            $error = array();

            if (empty($FullName) || empty($Email) || empty($Password) || empty($ReEnterPassword)) {
                array_push($error, "All fields are required");
            }
            if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                array_push($error, "Invalid email");
            }
            if (strlen($Password) < 8) {
                array_push($error, "Password must be more than 8 characters");
            }
            if ($Password !== $ReEnterPassword) {
                array_push($error, "Password does not match");
            }
            require_once "database.php";
            $sql = "SELECT * FROM employee WHERE Email='$Email'";
            $result = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                array_push($error, "Email already exists!");
            }

            if (count($error) > 0) {
                foreach ($error as $error_msg) {
                    echo "<div class='alert alert-danger'>$error_msg</div>";
                }
            } else {
                $hashedPassword = password_hash($Password, PASSWORD_DEFAULT); // Hashing the password

                $sql = "INSERT INTO employee (FullName, Email, Password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                if ($preparestmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $FullName, $Email, $hashedPassword); // Using hashed password
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered successfully</div>";
                } else {
                    die("something went wrong");
                }
            }
        }
        ?>

        <form action="registration.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="FullName" placeholder="Fullname" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="Email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="Password" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="ReEnterPassword" placeholder="Re-Enter Password" required>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div class="login-link">
            <p>Already registered? <a href="login.php">Click here to login</a></p>
        </div>
    </div>
</body>

</html>
