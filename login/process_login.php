<?php
$uid = $_POST['login_id'];
$upw = $_POST['login_pw'];

$conn = mysqli_connect('localhost', 'root', 'asdf1234', 'member');
$sql = "
    SELECT * FROM users WHERE id='{$uid}' and pwd='{$upw}'
";

$row = mysqli_fetch_array(mysqli_query($conn, $sql));

if($row) {
  session_start();
  $_SESSION['user_id'] = $row['id'];
  $_SESSION['user_name'] = $row['name'];  
  
  echo "<script> window.location.replace('../index.php'); </script>";

} else {
    echo "<script> alert('잘못된 아이디 혹은 비밀번호.');";
    echo "window.location.replace('../login/login.php'); </script>";
}

?>
