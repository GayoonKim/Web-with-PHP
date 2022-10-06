<?php
session_start();

require_once("../login/top_login.php");
require_once("../menu/top_menu.php");

$conn = mysqli_connect('localhost', 'root', 'asdf1234', 'member');
$login_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$login_id'";
$row = mysqli_fetch_array(mysqli_query($conn, $sql));

?>

<div style="margin-top: 10px">
    <form action="process_update.php" method="POST">
        <table>
            <tr>
                <th> ID </th>
                <td> <?= $row['id']; ?> </td>
            </tr>
            <tr>
                <th> 비밀번호 </th>
                <td> <input type="password" name="ch_password" id="ch_password" maxlength="50" value="<?= $row['pwd'];  ?> " required></td>
            </tr>
            <tr>
                <th> 이름 </th>
                <td> <input type="text" name="ch_name" id="ch_name" value="<?= $row['name']; ?> " required></td>
            </tr>
            <tr>
                <th> 연락처 </th>
                <td> <input type="text" name="ch_phone" id="ch_phone" value="<?= $row['phone']; ?> "></td>
            </tr>
            <tr>
                <th> 이메일 </th>
                <td> <input type="text" name="ch_email" id="ch_email" value="<?= $row['email']; ?> "></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="변경">
                </td>
            </tr>
        </table>
    </form>
</div>