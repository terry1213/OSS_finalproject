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
    
    <article>
        <form name="form" id="form" role="form" method="post" action="${pageContext.request.contextPath}/board/saveBoard">
            <div class="mb-3">
                <label for="title">물품</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="제목을 입력해 주세요">
            </div>
            <div class="mb-3">
                <label for="reg_id">전화번호</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="이름을 입력해 주세요">
            </div>
            <div class="mb-3">
                <label for="content">물품 발견 장소</label>
                <input type="text" class="form-control" name="locate" id="locate" placeholder="태그를 입력해 주세요">
            </div>
            <div class="mb-3">
                <label for="tag">상세 설명</label>
                <textarea class="form-control" rows="5" name="detail" id="detail" placeholder="내용을 입력해 주세요" ></textarea>
            </div>
        </form>
    </article>
    
    <?php
        include ("base/footer.php");
    ?>
</body>

</html>
