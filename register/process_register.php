<?php
$conn = mysqli_connect('localhost', 'root', 'asdf1234', 'member');

$sql = "
    INSERT INTO users
    (id, pwd, pwdcheck, name, phone, email)
    VALUES('{$_POST['userid']}', '{$_POST['userpw']}', '{$_POST['userpw_ck']}', '{$_POST['username']}', '{$_POST['userphone']}', '{$_POST['useremail']}')
";

if ( !$result = mysqli_query($conn, $sql) )
{
    echo "<script> alert('저장에 문제가 생겼습니다. 관리자에게 문의해주세요.'); </script>";
    echo mysqli_error($conn);
}
else
{
    echo '회원가입이 완료되었습니다.';
    echo "<br>";
    echo '<a href="../index.php">홈으로</a>';

}

mysqli_close($conn);

?>