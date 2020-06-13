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
        $search = $_GET['search'];
        $page = 10 * ($_GET['page'] - 1);
        if(!isset($_GET['writer_id'])){
            $writer_id = "";
        }
        else{
            $writer_id = $_GET['writer_id'];
        }
        
        $conn = mysqli_connect(
          'localhost',
          'root',
          '1213',
          'histhing');
        $sql = "SELECT item_id, writer_id, name, locate, date, state FROM Item WHERE (name LIKE '%".$search."%' OR locate LIKE '%".$search."%') AND writer_id LIKE '%".$writer_id."%'";
        $result = mysqli_query($conn, $sql);
        $maxPage = ceil(mysqli_num_rows($result) / 10);
        $sql = "SELECT item_id, writer_id, name, locate, date, state FROM Item WHERE (name LIKE '%".$search."%' OR locate LIKE '%".$search."%') AND writer_id LIKE '%".$writer_id."%' ORDER BY item_id DESC LIMIT ".$page.", 10";
        $result = mysqli_query($conn, $sql);
        $count = 0;
        while($row = mysqli_fetch_array($result)) {
            echo '<tr class="item-tr" onClick="location.href=\'/item.php?item_id='.$row['item_id'].'\'">';
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
<div class='pagination-container container'>
    <nav class="pagination-nav">
        <ul class="pagination">
            <li id="prev" class="page-item"><a class="page-link" onclick="previousPage();">Previous</a></li>
            <?php
                echo '<li class="page-item"><a class="page-link">'.$_GET['page'].'</a></li>';
            ?>
            <li id="next" class="page-item"><a class="page-link" onclick="nextPage();">Next</a></li>
        </ul>
    </nav>
</div>

<script>
    var cur_page = <?php echo $_GET['page']?>;
    var search = <?php echo "'".$search."'" ?>;
    var maxPage = <?php echo $maxPage ?>;
    var writer_id = <?php echo "'".$writer_id."'" ?>;

    function nextPage(){
        if(cur_page < maxPage){
            $(".table-div").load('table.php?search=' + search.replace(' ', '+') + '&page=' + (cur_page+1) + '&writer_id=' + writer_id);
        }
        else{
            alert("마지막 페이지입니다.");
        }
    }

    function previousPage(){
        if(cur_page > 1){
            $(".table-div").load('table.php?search=' + search.replace(' ', '+') + '&page=' + (cur_page-1) + '&writer_id=' + writer_id);
        }
        else{
            alert("첫번째 페이지입니다.");
        }
    }
</script>
