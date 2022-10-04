<?php
$conn = mysqli_connect('localhost', 'root', 'asdf1234', 'member');
$uid = $_GET['userid'];
$sql = "
    SELECT * FROM users WHERE id='{$uid}';
";
$row = mysqli_fetch_array(mysqli_query($conn, $sql));

if ( !$row ) {
    echo "<span style='color:blue;'>{$uid}</span>는 사용 가능한 아이디입니다.";
    ?> <p> <input type="button" value="이 ID 사용" onclick="opener.parent.decide(); window.close();"> </p>
<?php
} else {
    echo "<span style='color:red;'>{$uid}</span>는 중복된 아이디입니다.";
?> <P> <input type="button" value="다른 ID 사용" onclick="opener.parent.change(); window.close();"> </P>
<?php
}
?>
