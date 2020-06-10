<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Hishop</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
<link rel="stylesheet" href="/base/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="/js/includeHTML.js"></script>

</head>

<body>
    <header include-html="/base/header.html"></header>
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
</body>

<script>
    includeHTML();
</script>

</html>
