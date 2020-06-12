<!DOVTYPE html>
<html>

<?php
    include ("base/head.php");
?>

<body>
    <?php
        include ("base/header.php");
    ?>

    <article>
        <div class ="signup-container container col-lg-4">
            <div class="signup-jumbo jumbotron">
                <form method='post' action='/signUpAction.php'>
                    <h2 class="text-center">Sign Up</h2>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label" for="user_id"><i class='fa fa-id-card' aria-hidden='true'></i></label>
                        <div class="col-sm-10">
                            <input class="form-control" type='text' name='user_id' id='user_id' placeholder="ID" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label" for="name"><i class='fa fa-user' aria-hidden='true'></i></label>
                        <div class="col-sm-10">
                            <input class="form-control" type='text' name='name' id='name' placeholder="Name" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label" for="user_pw"><i class="fa fa-key" aria-hidden="true"></i></label>
                        <div class="col-sm-10">
                            <input class="form-control" type='password' name='user_pw' id='user_pw' placeholder="Password" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label" for="user_pw_check"><i class="fa fa-times" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></label>
                        <div class="col-sm-10">
                            <input class="form-control" type='password' name='user_pw_check' id='user_pw_check' placeholder="Confirm Password" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <input type='submit' class="signup-button confirm-button btn btn-dark form-control" value='계정 생성' disabled/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>

    <?php
        include ("base/footer.php");
    ?>

</body>
<script>
    $('.fa-check').css("display", "none");
    var confirmPassword = function(str1, str2){
        if(str1 == str2 && str1 != ""){
            $('.confirm-button').attr('disabled', false);
            $('.fa-times').css("display", "none");
            $('.fa-check').css("display", "block");
        }
        else{
            $('.signup-button').attr('disabled', true);
            $('.fa-times').css("display", "block");
            $('.fa-check').css("display", "none");
        }
    }

    var pw1 = $('#user_pw');
    var pw2 = $('#user_pw_check');

    pw1.keyup(function(){
        confirmPassword(pw1.val(), pw2.val());
    });
    pw2.keyup(function(){
        confirmPassword(pw1.val(), pw2.val());
    });
    
</script>

</html>
