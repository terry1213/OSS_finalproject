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
    
    <?php
        $conn = mysqli_connect(
          'localhost',
          'root',
          '1213',
          'histhing');
        
        $sql = "SELECT COUNT(*) AS total FROM Item";
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($result);
        $total = $data['total'];
        
        $sql = "SELECT COUNT(*) AS lost FROM Item WHERE state = 'lost'";
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($result);
        $lost = $data['lost'];
        
        $found = $total - $lost;
        
        $sql = "SELECT item_id, name, locate FROM Item ORDER BY item_id DESC limit 2";
        $result = mysqli_query($conn, $sql);
    ?>
    
    <article>
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0">Total</h4>
                </div>
                <div class="card-body">
                    <?php
                        echo "<h1 class='card-title'>".$total." <small class='text-muted'>개</small></h1>";
                    ?>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>주운 물건 주인,</li>
                        <li>바로 여기서 찾으세요!</li>
                        <i class="fa fa-arrow-down fa-2x" aria-hidden="true"></i>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-dark" onclick="location.href='/upload.php'">물품 올리기</button>
                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0">Lost</h4>
                </div>
                <div class="card-body">
                    <?php
                        echo "<h1 class='card-title'>".$lost." <small class='text-muted'>개</small></h1>";
                    ?>
                    <h5 class="my-0">NEW</h5>
                    <table class="table mt-3 mb-4">
                        <tbody>
                            <tr>
                                <th scope='row'><i class='fa fa-bars' aria-hidden='true'></i>물품</th>
                                <?php
                                    $row = mysqli_fetch_array($result);
                                    echo "<td>".$row['name']."</td>";
                                ?>
                            </tr>
                            <tr>
                                <th scope='row'><i class='fa fa-map-marker' aria-hidden='true'></i>장소</th>
                                <?php
                                    echo "<td>".$row['locate']."</td>";
                                ?>
                            </tr>
                            <tr>
                                <th scope='row'><i class='fa fa-bars' aria-hidden='true'></i>물품</th>
                                <?php
                                    $row = mysqli_fetch_array($result);
                                    echo "<td>".$row['name']."</td>";
                                ?>
                            </tr>
                            <tr>
                                <th scope='row'><i class='fa fa-map-marker' aria-hidden='true'></i>장소</th>
                                <?php
                                    echo "<td>".$row['locate']."</td>";
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0">Found</h4>
                </div>
                <div class="card-body">
                    <?php
                        echo "<h1 class='card-title'>".$found." <small class='text-muted'>개</small></h1>";
                    ?>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>잃어버린 물건,</li>
                        <li>바로 여기서 찾으세요!</li>
                        <i class="fa fa-arrow-down fa-2x" aria-hidden="true"></i>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-dark" onclick="location.href='/list.php'">물품 찾기</button>
                </div>
            </div>
        </div>
    </article>
    <?php
        include ("base/footer.php");
    ?>
</body>

</html>
