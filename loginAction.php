<?php
    if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit;
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];
    $conn = mysqli_connect(
        'localhost',
        'root',
        '1213',
        'histhing');
    $sql = "SELECT * FROM User WHERE user_id='".$user_id."' AND password='".$user_pw."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) < 1) {
        echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
        exit;
    }
    
    $row = mysqli_fetch_array($result);
    session_start();
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_name'] = $row['name'];
?>
<meta http-equiv='refresh' content='0;url=/'>
