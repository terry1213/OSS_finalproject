<nav class="user-info">
    <?php
        session_start();
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
            exit;
        }
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        echo "<button class='btn btn-info' onClick=\"location.href='/logout.php'\">로그아웃</button>";
        echo "<a>안녕하세요. $user_name($user_id)님</a>";
    ?>
</nav>
