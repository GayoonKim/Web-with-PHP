<div>
    <?php
    if (!isset($_SESSION['userid'])) {
    ?>
        <a href="view/login_form.php">로그인</a> | <a href="view/insertForm.php">회원가입</a>
    <?php
    }
    else {

    ?>
        <?= $_SESSION['nick']?> | <a href="view/logout.php">로그아웃</a> | 
        <a href="view/updateform.php">정보수정</a>
    <?php
    }
    ?>
</div>