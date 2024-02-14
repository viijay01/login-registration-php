<?php
session_start();
if(isset($_SESSION["user"])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <?php
        if(isset($_POST["login"])){
            $Email=$_POST["Email"];
            $Password=$_POST["Password"];
            require_once("database.php");
            $sql="SELECT * FROM employee WHERE Email='$Email'";
            $result=mysqli_query($conn,$sql);
            $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
            if($user){
                if(password_verify($Password,$user["Password"])){
                    session_start();
                    $_SESSION["name"] = "yes";
                    header("Location: index.php");
                    die();
                }
                else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }
            else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <div class="contanier"><h1>Employee Login</h1></div>
                <input type="email" placeholder="Enter email" name="Email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password" name="Password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div><p>Not registered yet <a href="registration.php">Register here</a></p></div>
    </div>
</body>
</html>
