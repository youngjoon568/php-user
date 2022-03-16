<?php
function output($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function auth_user($email, $password) {
    if($email == USER_NAME && $password == PASSWORD) {
        return true;
    }
}

function redirect($url) {
    header("Location:{$url}");
}

function is_user_auth() {
    return isset($_SESSION['email']);
}

function ensure_user_is_auth() {
    if(!(is_user_auth())) {
        redirect('./login.php');
        die();
    }
}
/*
header('Location:주소');
exit(); 종료, 에러메세지 출력 안 함
die(); 종료, 에러메세지 출력

session_start(); 세션 시작
$_SESSION['name'] = 홍길동 세션 등록
$_SESSION['name'] 
unset($_SESSION['name']); 세선 지우기
$_SESSION['name'] = '';

session_unset(); 세선 배열의 모든 값 지우기
session_destroy(); 세선 배열 자체 지우기
*/
?>