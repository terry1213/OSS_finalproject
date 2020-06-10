<!DOCTYPE html>
<html>

<?php
    include ("base/head.php");
?>

<body>

    <?php
        include ("base/header.php");
    ?>

    <article>
        <div class ="container">
           <div class="col-lg-4" style="margin:auto">
              <div class="jumbotron" style="padding-top:20px;">
                 <form method='post' action='login_ok.php'>
                    <h2 style="text-align:center;">Login</h2>
                    <div class="form-group">
                       <input class="form-control" type='text' name='user_id'/>
                    </div>
                    <div class="form-group">
                       <input class="form-control" type='password' name='user_pw'/>
                    </div>
                    <input type='submit' class="btn btn-dark form-control" value='로그인'/>
                 </form>
              </div>
           </div>
        </div>
    </article>

    <?php
        include ("base/footer.php");
    ?>

</body>

</html>
