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
    <header include-html="/base/header.html"></header>
    
    <table>
    <?php
        $conn = mysqli_connect(
          'localhost',
          'root',
          '1213',
          'histhing');
        $sql = "SELECT * FROM Item";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)) {
            echo '<h2>'.$row['writer_id'].'</h2>';
            echo '<h2>'.$row['phone'].'</h2>';
            echo '<h2>'.$row['locate'].'</h2>';
            echo '<h2>'.$row['date'].'</h2>';
            echo '<h2>'.$row['state'].'</h2>';
            echo '<h2>'.$row['quiz'].'</h2>';
            echo '<h2>'.$row['answer'].'</h2>';
        }
    ?>
    </table>
</body>

<script>
    includeHTML();
</script>

</html>
