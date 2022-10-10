<?php
session_start();

$uid = $_SESSION['user_id'];
$username = $_SESSION['user_name'];

$conn = mysqli_connect('localhost', 'root', 'asdf1234', 'member');
$sql = "
    INSERT INTO memo
        (id, name, content, regist_day)
        VALUES('{$uid}', '{$username}', '{$_POST['content']}', NOW())
";


if ( $result = mysqli_query($conn, $sql) ) {
    echo "<script> alert('작성이 완료되었습니다.'); </script>";

    echo "<script> window.location.href='../memo/memo.php'; </script>";
} else {
    echo mysqli_error($conn);
}

?>