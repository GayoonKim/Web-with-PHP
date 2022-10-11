<?php
session_start();

$num = $_POST['modify_num'];

$conn = mysqli_connect("localhost", "root", "asdf1234", "member");
$sql = "SELECT * FROM greet WHERE num='{$num}'";
$row = mysqli_fetch_array(mysqli_query($conn, $sql));

if (!$row) {
    echo mysqli_error($conn);
} else {
    $item_subject = $row['subject'];
    $item_content = $row['content'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/common.css">
    <link rel="stylesheet" type="text/css" href="../CSS/greet.css">
</head>

<body>
    <div>
        <?php require_once("../login/top_login.php") ?>
    </div> <!-- end of header -->

    <div>
        <?php require_once("../menu/top_menu.php") ?>
    </div> <!-- end of menu -->

    <div id="wrap">
        <div id="content">
            <div id="col2">
                <div id="title">가입 인사</div>
                <div id="write_form_title"> 글 쓰기 </div>
                <form name="board_form" method="POST" action="process_greet.php?mode=modify&num=<?= $num ?>">
                    <div id="write_form">
                        <div class="write_line"></div>
                        <div id="write_row1">
                            <div class="col1"> 닉네임 </div>
                            <div class="col2"> <?= $_SESSION['user_name'] ?> </div>
                        </div>

                        <div class="write_line"> </div>
                        <div id="write_row2">
                            <div class="col1"> 제목 </div>
                            <div class="col2"> <input type="text" name="subject" value="<?= $item_subject ?>" required> </div>
                        </div>

                        <div class="write_line"></div>
                        <div id="write_row3">
                            <div class="col1"> 내용 </div>
                            <div class="col2"> <textarea rows="15" cols="80" name="content_to_save"> <?= $item_content ?> </textarea></div>
                        </div>
                        <div class="write_line"></div>
                    </div>
                    <div id="write_button">
                        <input type="submit" value="작성">&nbsp;
                        <input type="button" value="목록" onclick="back();">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>