<?php
session_start();

$num = $_REQUEST['num'];

$conn = mysqli_connect("localhost", "root", "asdf1234", "member");
$sql = "SELECT * FROM greet WHERE num='{$num}'";

if (!$row = mysqli_fetch_array(mysqli_query($conn, $sql))) {
    echo "<script> alert('오류가 발생했습니다.'); </script>";
    echo "<script> window.location.href='../greet/greet.php'; </script>";
} else {
    $item_num = $row["num"];
    $item_id = $row["id"];
    $item_name = $row["name"];
    $item_subject = str_replace(" ", "&nbsp;", $row["subject"]);
    $item_content = $row["content"];
    $item_date = $row["regist_day"];
    $item_date = substr($item_date, 0, 10);
    $item_hit = $row["hit"];
}

$new_hit = $item_hit + 1;
$newSQL = "UPDATE greet SET hit='{$new_hit}' WHERE num='{$item_num}'";

if (!$result = mysqli_query($conn, $newSQL)) {
    echo "<script> alert('오류가 발생했습니다.'); </script>";
    echo "<script> window.location.href='../greet/greet.php'; </script>";
} else {
    $item_hit = $row['hit'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/common.css">
    <link rel="stylesheet" type="text/css" href="../CSS/greet.css">
    <script type="text/javascript" src="../JS/back_list.js"></script>
    <script>
        function del(href) {
            if (confirm('정말 삭제하시겠습니까?')) {
                document.location.href = href;
            }
        }
    </script>
</head>

<body>
    <div>
        <div>
            <?php require_once("../login/top_login.php") ?>
        </div> <!-- end of header -->

        <div>
            <?php require_once("../menu/top_menu.php") ?>
        </div> <!-- end of menu -->

    </div>

    <div id="wrap">
        <div id="content">
            <div id="col2">
                <div id="title">가입 인사</div>
                <div id="view_comment">&nbsp;</div>
                <div id="view_title">
                    <div id="view_title1"> <?= $item_subject ?> </div>
                    <div id="view_title2"> <?= $item_name ?> | 조회: <?= $item_hit ?> | <?= $item_date ?> </div>
                </div>

                <div id="view_content"> <?= $item_content ?> </div>
                <div id="view_button">
                    <input type="button" value="목록" onclick="back();">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        if ($_SESSION['user_id'] == $item_id || $_SESSION['uesr_name'] == "admin") {
                    ?>
                            <form action="modify_greet.php" method="POST">
                                <input type="hidden" name="modify_num" value="<?= $item_num ?>">
                                <input type="submit" value="수정">
                            </form>&nbsp;
                            <input type="button" value="삭제" onclick="del('process_delete.php?num=<?= $num ?>')" ;>&nbsp;
                        <?php
                        }
                        ?>
                        <input type="button" value="글 작성" onclick="backWrite();">
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>


<!--

<input type="button" value="삭제" onclick="del('delete.php?num=<?= $num ?>')" ;>&nbsp;

<input type="button" value="글 작성" onclick="backWrite();">  
-->