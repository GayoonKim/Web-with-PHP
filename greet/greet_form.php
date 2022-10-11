<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/common.css">
    <link rel="stylesheet" type="text/css" href="../CSS/greet.css">
    <script type="text/javascript" src="../JS/back_list.js"></script>
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
                <div id="write_form_title"> 글 쓰기 </div>
                <form name="board_form" method="POST" action="process_greet.php">
                    <div id="write_form">
                        <div class="write_line"></div>
                        <div id="write_row1">
                            <div class="col1"> 닉네임 </div>
                            <div class="col2"> <?= $_SESSION['user_name'] ?> </div>
                        </div>

                        <div class="write_line"> </div>
                        <div id="write_row2">
                            <div class="col1"> 제목 </div>
                            <div class="col2"> <input type="text" name="subject" required> </div>
                        </div>

                        <div class="write_line"></div>
                        <div id="write_row3">
                            <div class="col1"> 내용 </div>
                            <div class="col2"> <textarea rows="15" cols="80" name="content_to_save"> </textarea></div>
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