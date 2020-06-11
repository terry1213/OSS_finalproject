<?php
    $conn = mysqli_connect(
      'localhost',
      'root',
      '1213',
      'histhing');
    
    $sql = "SELECT EXISTS(SELECT * FROM User WHERE user_id='".$_POST['user_id']."')";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        echo "<script>alert('이미 존재하는 아이디입니다.');history.back();</script>";
        exit;
    }
    
    $sql = "INSERT INTO User (user_id, name, password) VALUES ('".$_POST['user_id']."', '".$_POST['name']."', '".$_POST['user_pw']."')";
    
    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo mysqli_error($conn);
    }
    else{
        echo "<meta http-equiv='refresh' content='0;url=/'>";
    }
?>
