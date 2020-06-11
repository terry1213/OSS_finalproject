<?php
    session_start();
    if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
        echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        exit;
    }
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    $conn = mysqli_connect(
      'localhost',
      'root',
      '1213',
      'histhing');
    $sql = "INSERT INTO Item( writer_id, phone, locate, date, state, quiz, answer, name, detail) VALUES ('".$user_id."', '".$_POST['phone']."', '".$_POST['locate']."', now(), 'lost', '".$_POST['quiz']."', '".$_POST['answer']."', '".$_POST['name']."', '".$_POST['detail']."')";
    
    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo mysqli_error($conn);
    }
    else{
        echo "<meta http-equiv='refresh' content='0;url=list.php'>";
    }
?>
