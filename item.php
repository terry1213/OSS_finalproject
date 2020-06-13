<!DOVTYPE html>
<html>

<?php
    include ("base/head.php");
?>

<body>
    
    <?php
        include ("base/header.php");
    ?>
    <?php
        include ("base/userInfo.php");
    ?>
    
    <?php
        if(!$_GET['item_id']){
            echo "<script>alert('잘못된 접근입니다.');history.back();</script>";
            exit;
        }
        $user_id = $_SESSION['user_id'];
        $conn = mysqli_connect(
          'localhost',
          'root',
          '1213',
          'histhing');
        $sql = "SELECT * FROM Item WHERE item_id='".$_GET['item_id']."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if($row == NULL){
            echo "<script>alert('없는 게시글입니다.');history.back();</script>";
            exit;
        }
        
        if($row['quiz'] != NULL && $row['writer_id'] != $_SESSION['user_id']){
            echo "<script>";
            echo "var userInput = prompt('".$row['quiz']."');";
            echo "if(userInput == null){";
            echo "history.back();";
            echo "}";
            echo "else if(userInput != '".$row['answer']."'){";
            echo "alert('틀렸습니다.');history.back();";
            echo "}";
            echo "</script>";
        }
    ?>

    <div class="wrap">
        <article>
            <form class="item-form" name="item-form" id="item-form">
                <div class="half">
                    <div class="form-group">
                        <label for="name">물품</label>
                        <?php
                            echo "<input type='text' class='form-control' name='name' id='name' value='".$row['name']."' readonly>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="locate">물품 발견 장소</label>
                        <?php
                            echo "<input type='text' class='form-control' name='locate' id='locate' value='".$row['locate']."' readonly>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="name">작성자</label>
                        <?php
                            echo "<input type='text' class='form-control' name='writer_id' id='writer_id' value='".$row['writer_id']."' readonly>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="phone">전화번호</label>
                        <?php
                            echo "<input type='tel' class='form-control' name='phone' id='phone' placeholder='연락 받을 번호를 입력해 주세요.' value='".$row['phone']."' readonly>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="detail">상세 설명</label>
                        <?php
                            echo "<textarea class='form-control' rows='5' name='detail' id='detail' readonly>".$row['detail']."</textarea>";
                        ?>

                    </div>
                    <input type="button" class="btn btn-info" onclick="history.back();" value="돌아가기">
                    <?php
                        if($row['writer_id'] == $_SESSION['user_id'] && $row['state'] == "lost"){
                            echo '<input type="button" class="btn btn-info" onclick="location.href=\'/foundOwner.php?item_id='.$row['item_id'].'\'" value="주인 찾음">';
                        }
                    ?>
                </div>
                    <?php
                        if($row['image_path'] != NULL){
                            echo "<div class='half'>";
                            echo "<p><strong>물품 사진</strong></p>";
                            echo "<a href='".$row['image_path']."' target='_blank'><img src='".$row['image_path']."' alt='item_image'></a>";
                            echo "</div>";
                        }
                    ?>
            </form>
        </article>
        
        <?php
            include ("base/footer.php");
        ?>
    </div>
</body>
<script>
</script>
</html>
