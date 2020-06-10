<!DOVTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hishop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="/js/includeHTML.js"></script>
</head>

<body>
    <?php
        session_start();
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
            exit;
        }
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        echo "<p>안녕하세요. $user_name($user_id)님</p>";
        echo "<p><a href='logout.php'>로그아웃</a></p>";
    ?>
    <header include-html="/base/header.php"></header>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    NO.
                </th>
                <th scope="col">
                    물품
                </th>
                <th scope="col">
                    위치
                </th>
                <th scope="col">
                    날짜
                </th>
                <th scope="col">
                    상태
                </th>
            </tr>
	</thead>
	<tbody>
        <?php
            $conn = mysqli_connect(
              'localhost',
              'root',
              '1213',
              'histhing');
            $sql = "SELECT writer_id, name, locate, date, state FROM Item";
            $result = mysqli_query($conn, $sql);
            $count = 0;
            while($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td scope="row">'.++$count.'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['locate'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['state'].'</td>';
                echo '</tr>';
            }
        ?>
	</tbody>
    </table>
</body>

<script>
    includeHTML();
</script>

</html>
