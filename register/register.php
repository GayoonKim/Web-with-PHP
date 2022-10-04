<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <div>
        <div>
            <form action="process_register.php" method="POST">
                <p> <input type="text" name="userid" id="userid" placeholder="ID"> </p>
                <p> <input type="password" name="userpw" id="userpw" placeholder="Password" maxlength="12"> </p>
                <p> <input type="password" name="userpw_ck" id="userpw_ck" placeholder="Password Check" maxlength="12"> </p>
                <p> <input type="text" name="username" id="username" placeholder="Name"> </p>
                <p> <input type="text" name="userphone" id="userphone" placeholder="Phone Number 000-0000-0000"> </p>
                <p> <input type="text" name="useremail" id="useremail" placeholder="E-mail"> </p>
                <p> <input type="submit" value="Sign up"> </p>
                <p> 이미 회원이십니까? <a href="login/login.php">Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>