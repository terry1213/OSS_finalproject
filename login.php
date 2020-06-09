<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Hishop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="/js/includeHTML.js"></script>
</head>

<body>
    <header include-html="/base/header.html"></header>
    <form method='post' action='login_ok.php'>
    <table>
    <tr>
        <td>아이디</td>
        <td><input type='text' name='user_id' tabindex='1'/></td>
        <td rowspan='2'><input type='submit' tabindex='3' value='로그인' style='height:50px'/></td>
    </tr>
    <tr>
        <td>비밀번호</td>
        <td><input type='password' name='user_pw' tabindex='2'/></td>
    </tr>
    </table>
    </form>
</body>
