<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <div>
        <div>
            <?php require_once("../login/top_login.php") ?>
        </div> <!-- end of header -->

        <div>
            <?php require_once("../menu/top_menu.php") ?>
        </div> <!-- end of menu -->

        <h1> 낙서장 </h1>
    </div>

    <div>
        <?php if (isset($_SESSION['user_id'])) {
        ?>
            <div id="memo_row">
                <form name="memo_form" action="process_memo.php" method="POST">
                    <div id="memo_writer"> <span> <?= $_SESSION['user_name'] ?> </span> </div>
                    <div id="memo1"> <textarea name="content" cols="70" rows="5" required></textarea> </div>
                    <div> <input type="submit" value="작성"> </div>
                </form>
            </div>
        <?php
        }
        ?>
    </div>

    <div>
        <?php require_once('../memo/memo_list.php') ?>
    </div>

</body>

</html>