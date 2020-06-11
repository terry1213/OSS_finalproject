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
            <form class="upload-form" name="upload-form" id="upload-form" role="form" method="post" action="\uploadAction.php">
                <div class="form-group">
                    <label for="name">물품</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="물품명을 입력해 주세요." required>
                </div>
                <div class="form-group">
                    <label for="locate">물품 발견 장소</label>
                    <input type="text" class="form-control" name="locate" id="locate" placeholder="물품을 발견한 장소를 입력해 주세요." required>
                </div>
                <div class="form-group">
                    <label for="phone">전화번호</label>
                    <input type="tel" class="form-control" name="phone" id="phone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}|[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="연락 받을 번호를 입력해 주세요." required>
                </div>
                <div class="form-group">
                    <label for="detail">상세 설명</label>
                    <textarea class="form-control" rows="5" name="detail" id="detail" placeholder="상세한 설명을 입력해 주세요."></textarea>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="quizCheck" id="quizCheck" onclick="checkEvent();">
<label class="form-check-label" for="quizCheck">질문 생성(질문 생성 시 해당 질문을 맞춰야만 작성자의 전화번호가 보입니다.)</label>
                </div>
                <div class="form-group hidden-form-group">
                    <label for="quiz">질문</label>
                    <input type="text" class="form-control" name="quiz" id="quiz" placeholder="주인 확인을 위한 질문을 입력해 주세요.">
                </div>
                <div class="form-group hidden-form-group">
                    <label for="answer">정답</label>
                    <input type="text" class="form-control" name="answer" id="answer" placeholder="질문에 대한 정답을 입력해 주세요.">
                </div>
                <button class="btn btn-info" type="submit" >게시하기</button>
            </form>
        </article>
        
        <?php
            include ("base/footer.php");
        ?>
    </div>
</body>
<script>
    var autoHypenPhone = function(str){
        str = str.replace(/[^0-9]/g, '');
        var tmp = '';
        if( str.length < 4){
            return str;
        }else if(str.length < 7){
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3);
            return tmp;
        }else if(str.length < 11){
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 3);
            tmp += '-';
            tmp += str.substr(6);
            return tmp;
        }else if(str.length < 12){
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 4);
            tmp += '-';
            tmp += str.substr(7);
            return tmp;
        }
        else{
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 4);
            tmp += '-';
            tmp += str.substr(7, 4);
            return tmp;
        }

        return str;
    }
    var phone = document.getElementById('phone');

    phone.onkeyup = function(){
        this.value = autoHypenPhone(this.value);
    }

    function checkEvent() {
        var checkBox = $("#quizCheck");
        var quizInput = $("#quiz").parent();
        var answerInput = $("#answer").parent();
        if (checkBox.is(":checked") == true){
            quizInput.css("display", "block");
            answerInput.css("display", "block");
        } else {
            quizInput.css("display", "none");
            $("#quiz").val("");
            answerInput.css("display", "none");
            $("#answer").val("");
        }
    }

</script>
</html>
