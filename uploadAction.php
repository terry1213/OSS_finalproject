<?php
    session_start();
    if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
        echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        exit;
    }
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check == false) {
            echo "<script>alert('이미지 파일이 아닙니다.');history.back();</script>";
        }
    }

    $FileType = substr(strrchr(basename($_FILES["image"]["name"]), "."), 1);
    $FileName = substr(basename($_FILES["image"]["name"]), 0, strlen(basename($_FILES["image"]["name"])) - strlen($FileType) - 1);

    $tmp = "$FileName.$FileType";
    $count = 0;
    while(file_exists($target_dir.$tmp)){
        $count++;
        $tmp = $FileName."_".$count.".".$FileType;
    }
    $target_file = $target_dir . $tmp;
    

    while (file_exists($target_file)) {
        $_FILES["image"]["name"] += "1";
    }

    if ($_FILES["image"]["size"] > 3000000) {
        echo "<script>alert('이미지의 용량이 3MB보다 큽니다.');history.back();</script>";
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "<script>alert('JPG, JPEG, PNG, GIF 파일만 업로드할 수 있습니다.');history.back();</script>";
    }
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) != 1) {
        echo "<script>alert('이미지 업로드가 실패했습니다.');history.back();</script>";
    }




    $conn = mysqli_connect(
      'localhost',
      'root',
      '1213',
      'histhing');
    $sql = "INSERT INTO Item( writer_id, phone, locate, date, state, quiz, answer, name, detail, image_path) VALUES ('".$user_id."', '".$_POST['phone']."', '".$_POST['locate']."', now(), 'lost', '".$_POST['quiz']."', '".$_POST['answer']."', '".$_POST['name']."', '".$_POST['detail']."', '".$target_file."')";

    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo mysqli_error($conn);
    }
    else{
        echo "<meta http-equiv='refresh' content='0;url=list.php'>";
    }
?>
