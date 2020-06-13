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
    $sql = "UPDATE Item SET state = 'found' WHERE item_id = '".$_GET['item_id']."' AND writer_id = '".$_SESSION['user_id']."'";

    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo mysqli_error($conn);
    }
    else{
        echo "<meta http-equiv='refresh' content='0;url=/myPage.php'>";
    }
?>
