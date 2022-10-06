<?php
session_start();
$conn = mysqli_connect('localhost', 'root', 'asdf1234', 'member');
$login_id = $_SESSION['user_id'];

$changePassword = $_POST['ch_password'];
$changeName = $_POST['ch_name'];
$changePhone = $_POST['ch_phone'];
$changeEmail = $_POST['ch_email'];

$old_sql = "
    SELECT * FROM users WHERE id='{$login_id}'
";
$old_res = mysqli_fetch_array(mysqli_query($conn, $old_sql));

if ($_POST['ch_password'] !== $old_res['pwd']) {

    $_SESSION['user_name'] = $changeName;
    $oldPassword = $old_res['pwd'];
    $oldName = $old_res['name'];
    $oldPhone = $old_res['phone'];
    $oldEmail = $old_res['email'];

    $sql = "
UPDATE users SET pwd='{$changePassword}', pwdcheck='{$changePassword}', name='{$changeName}', phone='{$changePhone}', email='{$changeEmai}'
";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script> alert('변경이 완료되었습니다.');";
        echo "window.location.href='../index.php'; </script>";
    }
} else {
    echo "<script>alert('이전 비밀번호와 동일합니다.');";
    echo "window.location.href='updateform.php';</script>";
    exit;
}

?>