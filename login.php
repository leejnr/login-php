<?php

require 'config.php';

if(!empty($_SESSION["id"])){
    header("Location:index.php");
}
if(isset($_POST['submit'])){
    $usernameemail = $_POST['usernameemail'];
    $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$usernameemail' OR email = '$usernameemail'");
        $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) > 0){
                if($password == $row["password"]){
                    $_SESSION["login"];
                    $_SESSION["id"] = $row["id"];
                    header("Location:index.php");
                }
                else{
                    echo
                "<script> alert('Wrong password'); </script>";
                }
            }
            else{
                echo
                "<script> alert('User not registered'); </script>";
            }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
        <form action="" method="post" autocomplete="off">
            <label for="usernameemail">Username or Email : </label>
            <input type="text" name="usernameemail" id="usernameemail" required value="">
            <br>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" required value="">
            <br>
            <button type="submit" name="submit">Login</button>
        </form>
      <br>
    <a href="register.php">Register</a>
</body>
</html>