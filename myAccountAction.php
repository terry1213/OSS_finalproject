<?php
    session_start();
    if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
        echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        exit;
    }
    $conn = mysqli_connect(
      'localhost',
      'root',
      '1213',
      'histhing');
    $sql = "UPDATE User SET name = '".$_POST['name']."', phone = '".$_POST['phone']."', email = '".$_POST['email']."', password = '".$_POST['password']."' WHERE user_id = '".$_POST['user_id']."'";

    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo mysqli_error($conn);
    }
    else{
        $_SESSION['user_name'] = $_POST['name'];
        echo "<meta http-equiv='refresh' content='0;url=myAccount.php'>";
    }
?>
