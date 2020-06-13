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
        $user_id = $_SESSION['user_id'];
        $conn = mysqli_connect(
          'localhost',
          'root',
          '1213',
          'histhing');
        $sql = "SELECT * FROM User WHERE user_id='".$user_id."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    ?>
    
    <div class="wrap">
        <article>
            <h2 class="page-title">My Account</h2>
            <form class="account-form" action="/myAccountAction.php" method="post" id="registrationForm">
                <div class="form-group">
                    <div>
                        <label for="user_id"><h4>ID</h4></label>
                        <?php
                            echo "<input type='text' class='form-control' name='user_id' id='user_id' value='".$row['user_id']."'readonly>"
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="name"><h4>Name</h4></label>
                        <?php
                            echo "<input type='text' class='form-control' name='name' id='name' placeholder='name' value='".$row['name']."' required>"
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="phone"><h4>Phone</h4></label>
                        <?php
                            echo "<input type='tel' class='form-control' name='phone' id='phone' pattern='[0-9]{3}-[0-9]{4}-[0-9]{4}|[0-9]{3}-[0-9]{3}-[0-9]{4}' placeholder='Phone Number' value='".$row['phone']."'>"
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="email"><h4>Email</h4></label>
                        <?php
                            echo "<input type='email' class='form-control' name='email' id='email' placeholder='Your@email.com' value='".$row['email']."'>"
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="password"><h4>Password</h4></label>
                        <?php
                            echo "<input type='password' class='form-control' name='password' id='password' placeholder='Password' value='".$row['password']."' required>"
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="password_check"><h4>Confirm Password</h4></label>
                        <i class="fa fa-times" aria-hidden="true"></i>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <?php
                            echo "<input type='password' class='form-control' name='password_check' id='password_check' placeholder='Confirm Password' value='".$row['password']."' required>"
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <input type='submit' class="signup-button confirm-button btn btn-info" value='저장'/>
                    </div>
                </div>
            </form>
        </article>
        <?php
            include ("base/footer.php");
        ?>
    </div>
</body>
<script>
    $('.fa-times').css("display", "none");
    var confirmPassword = function(str1, str2){
        if(str1 == str2 && str1 != ""){
            $('.confirm-button').attr('disabled', false);
            $('.fa-times').css("display", "none");
            $('.fa-check').css("display", "inline");
        }
        else{
            $('.signup-button').attr('disabled', true);
            $('.fa-times').css("display", "inline");
            $('.fa-check').css("display", "none");
        }
    }

    var pw1 = $('#password');
    var pw2 = $('#password_check');

    pw1.keyup(function(){
        confirmPassword(pw1.val(), pw2.val());
    });
    pw2.keyup(function(){
        confirmPassword(pw1.val(), pw2.val());
    });
    
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
</script>
</html>
