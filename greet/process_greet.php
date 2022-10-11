<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "asdf1234", "member");

if (isset($_REQUEST['mode'])) {
    $mode = $_REQUEST['mode'];
} else {
    $mode ="";
}

if (isset($_REQUEST['num'])) {
    $num = $_REQUEST['num'];
} else {
    $num ="";
}

$subject = $_POST['subject'];
$content = $_POST['content_to_save'];

if ($mode == "modify") {
    $sql = "UPDATE greet SET subject='{$subject}', content='{$content}' WHERE num='{$num}' ";
    
    if ($result = mysqli_query($conn, $sql)) {
        echo "<script> alert('수정을 성공했습니다.'); </script>";
        echo "<script> window.location.href='../greet/greet.php'; </script>";
    } else
    {
        echo "<script> alert('저장에 실패했습니다.'); </script>";
        echo "<script> window.location.href='../greet/greet.php'; </script>";
    }
} else {
    $sql = "
        INSERT INTO greet
        (id, name, subject, content, regist_day, hit)
        VALUES('{$_SESSION['user_id']}', '{$_SESSION['user_name']}', '{$_POST['subject']}', '{$_POST['subject']}', NOW(), 0) 
    ";

    if ($result = mysqli_query($conn, $sql)) {
        echo "<script> alert('작성을 성공했습니다.'); </script>";
        echo "<script> window.location.href='../greet/greet.php'; </script>";
    } else
    {
        echo "<script> alert('저장에 실패했습니다.'); </script>";
        echo "<script> window.location.href='../greet/greet.php'; </script>";
    }
}

?>

