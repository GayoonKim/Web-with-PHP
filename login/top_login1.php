<div>
    <?php
    if (!isset($_SESSION['userid'])) {
    ?>
        <a href="login/login.php">로그인</a> | <a href="register/register.php">회원가입</a>
    <?php
    }
    else {

    ?>
        <?= $_SESSION['nick']?> | <a href="login/logout.php">로그아웃</a> | 
        <a href="update/updateform.php">정보수정</a>
    <?php
    }
    ?>
</div>