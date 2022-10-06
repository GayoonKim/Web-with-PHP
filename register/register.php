<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <script type="text/javascript" src="../JS/check.js"></script>
    <script type="text/javascript" src="../JS/decide.js"></script>
    <script type="text/javascript" src="../JS/change.js"></script>
</head>

<body>
    <div>
        <div>
            <form action="process_register.php" method="POST">
                <p> <input type="text" name="userid" id="userid" placeholder="ID" required> <input type="button" id="check_button" value="중복 검사" onclick="checkid()"> </p>
                <p> <input type="hidden" name="decide_id" id="decide_id"> </p>
                <p> <span id="decide" style="color: red;">ID 중복 여부를 확인해주세요.</span> </p>
                <p> <input type="password" name="userpw" id="userpw" placeholder="Password" maxlength="50" required> </p>
                <p> <input type="password" name="userpw_ck" id="userpw_ck" placeholder="Password Check" maxlength="12" required> </p>
                <p> <input type="text" name="username" id="username" placeholder="Name" required> </p>
                <p> <input type="text" name="userphone" id="userphone" placeholder="Phone Number 000-0000-0000" required> </p>
                <p> <input type="text" name="useremail" id="useremail" placeholder="E-mail" required> </p>
                <p> <input type="submit" value="Sign up" id="join_button" disabled=true> </p>
                <p> 이미 회원이십니까? <a href="../login/login.php">Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>