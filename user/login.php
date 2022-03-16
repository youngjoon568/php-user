<?php
session_start();

$title = "login";
$str = "로그인 페이지";
include("../../html/top.php");
include("./config.php");
require_once("./func.php");

if(is_user_auth()) {
    redirect('./admin.php');
    die();
}
/*
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $_POST['email'];
    output($_POST);
}
*/
if (isset($_POST['login'])) {
    // output($_POST);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if ($email == false) {
        $status = '이메일 형식에 맞게 입력하세요.';
    }
    if(auth_user($email, $password)) {
        $_SESSION['email'] = $email;
        redirect('./admin.php');
        die();
        // $_SESSION['password'] = $password;
    } else {
        $status = '비밀번호가 유호하지 않습니다.';
    }
}
?>
<form action="" method="post">
    <p>
        <label for="email">Email : </label>
        <!-- <input type="email" id="email" name="email" /> -->
        <input type="text" id="email" name="email" />
    </p>
    <p>
        <label for="password">Password : </label>
        <input type="password" id="password" name="password" />
    </p>
    <p>
        <input type="submit" name="login" value="Login" />
    </p>
</form>
<div class="err_view">
    <p>
        <?php
        if(isset($status)) {
            echo $status;
        }
        ?>
    </p>
</div>
<?php
include("../../html/btm.php");
?>