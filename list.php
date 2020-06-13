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

    <div class="wrap">
        <article>
            <h2 class="page-title">List</h2>
            <div class="input-group mb-4 border rounded-pill p-1">
                <div class="input-group-prepend border-0">
                    <button id="button-addon4" type="button" class="btn btn-link text-info" onclick="tableLoad();" ><i class="fa fa-search"></i></button>
                </div>
                <input type="search" id="search" name="search" onkeyup="enterkey();" placeholder="찾고 계신 물품 이름이나 장소를 입력하여 검색하세요!" aria-describedby="button-addon4" class="form-control bg-none border-0">
            </div>
            <div class="table-div">
            </div>
            <button class='btn btn-info' onClick="location.href='/upload.php'">글쓰기</button>
        </article>

        <?php
            include ("base/footer.php");
        ?>
    </div>
</body>
<script>
    $(document).ready(function(){
        tableLoad();
    });

    function tableLoad(){
        $(".table-div").load('table.php?search=' + $("#search").val().replace(' ', '+') + '&page=' + '1');
    }

    function enterkey() {
        if (window.event.keyCode == 13) {
            tableLoad();
        }
    }
</script>
</html>
