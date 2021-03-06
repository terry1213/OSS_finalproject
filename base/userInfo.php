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
        echo "<a><strong>안녕하세요.<br>$user_name($user_id)님</strong></a>";
        
        echo "<table class='table'>";
        echo "<tbody>";
        echo "<tr>";
        echo "<th scope='row'><i class='fa fa-id-card' aria-hidden='true'></i>아이디</th>";
        echo "<td>$user_id</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th scope='row'><i class='fa fa-user' aria-hidden='true'></i>이름</th>";
        echo "<td>$user_name</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        echo "<button class='btn btn-info btn-sm' onClick=\"location.href='/logout.php'\">로그아웃</button>";
        echo "<button class='btn btn-info btn-sm' onClick=\"location.href='/myAccount.php'\">나의 정보</button>";
        echo "</div>"
    ?>
</aside>
