<?php

session_start();

$delete_num = $_REQUEST['num'];

$conn = mysqli_connect('localhost', 'root', 'asdf1234', 'member');
$sql = "
    DELETE FROM memo WHERE num='{$delete_num}'
";

if ($result = mysqli_query($conn, $sql)) {
    echo "<script> alert('삭제가 완료되었습니다.');";
    echo "window.location.href='../memo/memo.php'; </script>";
} else {
    echo "<script> alert('삭제에 문제가 생겼습니다. 관리자에게 문의해주세요.');";
    echo "window.location.href='../memo/memo.php'; </script>";
}

?>