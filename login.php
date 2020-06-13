<!DOVTYPE html>
<html>

<?php
    include ("base/head.php");
?>

<body>
    <?php
        include ("base/header.php");
        session_start();
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
            echo "<meta http-equiv='refresh' content='0;url=/'>";
            exit;
        }
    ?>

    <article>
        <div class ="login-container container col-lg-4">
            <div class="login-jumbo jumbotron">
                <form method='post' action='loginAction.php'>
                    <h2 class="text-center">Login</h2>
                    <div class="form-group">
                        <input class="form-control" type='text' name='user_id' placeholder="ID"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type='password' name='user_pw' placeholder="Password"/>
                    </div>
                    <input type='submit' class="btn btn-dark form-control" value='로그인'/>
                    <input type='button' class="btn btn-dark form-control" value='회원가입' onClick="location.href='/signUp.php'"/>
                </form>
            </div>
        </div>
    </article>

    <?php
        include ("base/footer.php");
    ?>

</body>

</html>
