<?php
session_start();

$conn = mysqli_connect("localhost", "root", "asdf1234", "member");

if (isset($_REQUEST['mode'])) {
    $mode = $_REQUEST['mode'];
} else {
    $mode = "";
}

if (isset($_REQUEST['search'])) {
    $search = $_REQUEST['search'];
} else {
    $search = "";
}

if (isset($_REQUEST['find'])) {
    $find = $_REQUEST['find'];
} else {
    $find = "";
}

if ($mode == "search") {
    if (!$search) {
?>
        <script>
            alert('검색할 단어를 입력해 주세요');
            history.back();
        </script>
<?php
    }
    $sql = "SELECT * FROM greet WHERE $find like '%$search%' ORDER BY num DESC";
} else {
    $sql = "SELECT * FROM greet ORDER BY num DESC";
}

$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

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
        <div>
            <?php require_once("../login/top_login.php") ?>
        </div> <!-- end of header -->

        <div>
            <?php require_once("../menu/top_menu.php") ?>
        </div> <!-- end of menu -->

    </div>

    <div id="wraper">
        <div id="content">
            <div id="col2">
                <div id="title"> 가입 인사 </div>
                <form name="board_form" method="POST" action="greet.php?mode=search">
                    <div id="list_search">
                        <div id="list_search1"> 총 <?= $count ?>개의 게시물이 있습니다. </div>
                        <div id="list_search2"> SELECT </div>
                        <div id="list_search3">
                            <select name="find">
                                <option value="subject">제목</option>
                                <option value="content">내용</option>
                                <option value="name">이름</option>
                            </select>
                        </div>
                        <div id="list_search4"> <input type="text" name="search"> </div>
                        <div id="list_search5"> <input type="submit" value="검색"> </div>
                    </div> <!-- list_searcH 끝 -->
                </form>
                <div id="list_top_title">
                    <ul>
                        <li id="list_title1">번호</li>
                        <li id="list_title2">제목</li>
                        <li id="list_title3">글쓴이</li>
                        <li id="list_title4">작성일</li>
                        <li id="list_title5">조회</li>
                    </ul>
                </div> <!-- list_top_title 끝 -->
                <div id="list_content">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $greet_num = $row['num'];
                        $greet_id = $row['id'];
                        $greet_name = $row['name'];
                        $greet_hit = $row['hit'];
                        $greet_date = $row['regist_day'];
                        $greet_date = substr($greet_date, 0, 10);
                        $greet_subject = str_replace(" ", "&nbsp;", $row['subject']);
                    ?>
                        <div id="list_item">
                            <div id="list_item1"> <?= $greet_num ?> </div>
                            <div id="list_item2"> <a href="greet_view.php?num=<?= $greet_num ?>"> <?= $greet_subject ?> </a> </div>
                            <div id="list_item3"> <?= $greet_name ?> </div>
                            <div id="list_item4"> <?= $greet_date ?> </div>
                            <div id="list_item5"> <?= $greet_hit ?> </div>
                        </div> <!-- list_item 끝 -->
                    <?php
                    }
                    ?>

                    <div id="write_button">
                        <a href="greet.php">목록</a>&nbsp;
                        <?php
                        if (isset($_SESSION['user_id'])) {
                        ?>
                            <a href="greet_form.php">작성</a>
                        <?php
                        }
                        ?>

                    </div>

                </div>
            </div> <!-- col2 끝 -->
        </div> <!-- content 끝 -->
    </div> <!-- wraper 끝 -->

</body>

</html>