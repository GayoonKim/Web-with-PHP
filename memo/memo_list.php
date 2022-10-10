<?php
session_start();

$conn = mysqli_connect('localhost', 'root', 'asdf1234', 'member');
$sql = "SELECT * FROM memo ORDER BY num DESC";
$result = mysqli_query($conn, $sql);
?>

<div>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $memo_num = $row['num'];
        $memo_name = $row['name'];
        $memo_date = $row['regist_day'];
        $memo_content = str_replace("\n", "<br>", $row["content"]);
        $memo_content = str_replace(" ", "&nbsp;", $memo_content);
    ?>
        <div>
            <div style="border-bottom: 1px dotted; width: 300px; height: 40px; margin: 30px 0px 0px 0px;">
                <?= $memo_num ?>
                <?= $memo_name ?>
                <?= $memo_date ?>
                <?php
                if (isset($_SESSION['user_id'])) {
                    if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == $memo_name) {
                        
                        echo "<a href='../memo/process_delete_memo.php?num=$memo_num'>[삭제]</a>";
                    }
                }
                ?>
            </div>
            <div>
                <?= $memo_content ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>