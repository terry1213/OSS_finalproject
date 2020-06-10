<aside class="user-info">
    <?php
        session_start();
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
            exit;
        }
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        echo "<div class=\"profile-container container\">";
        echo "<a>안녕하세요.<br>$user_name($user_id)님</a>";
        
        echo "<table class='table'>";
        echo "<tbody>";
        echo "<tr>";
        echo "<th scope='row'>아이디</th>";
        echo "<td>$user_id</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th scope='row'><i class='fa fa-user' aria-hidden='true'></i>이름</th>";
        echo "<td>$user_name</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        
        echo "<button class='btn btn-info' onClick=\"location.href='/logout.php'\">로그아웃</button>";
        echo "</div>"
    ?>
</aside>
