<div>
    <?php
    if (!isset($_SESSION['user_id'])) {
    ?>
        <a href="login/login.php">로그인</a> | <a href="register/register.php">회원가입</a>
    <?php
    }
    else {

    ?>
        <?= $_SESSION['user_name']?> | <a href="login/logout.php">로그아웃</a> | 
        <a href="../update/updateform.php">정보수정</a>
    <?php
    }
    ?>
</div>