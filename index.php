<!DOVTYPE html>
<html>

<head include-html="/base/head.html">
</head>

<body>
    <header include-html="/base/header.html"></header>
    <?php
        session_start();
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
            exit;
        }
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        echo "<!DOCTYPE html>";
        echo "<meta charset='utf-8' />";
        echo "<p>안녕하세요. $user_name($user_id)님</p>";
        echo "<p><a href='logout.php'>로그아웃</a></p>";
    ?>
</body>

<script>
    includeHTML();
</script>

</html>
