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

    <div class="wrap">
        <article>
            <table class="table table-striped item-list">
                <thead>
                    <tr>
                        <th scope="col">
                            NO.
                        </th>
                        <th scope="col">
                            물품
                        </th>
                        <th scope="col">
                            장소
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
                    $sql = "SELECT writer_id, name, locate, date, state FROM Item ORDER BY item_id DESC";
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
            <button class='btn btn-info' onClick="location.href='/upload.php'">글쓰기</button>
        </article>

        <?php
            include ("base/footer.php");
        ?>
    </div>
</body>

</html>
