<?php 

include('config.php');  //這是引入剛剛寫完，用來連線的.php
?>

<!DOCTYPE html>
<html lang="en">
<title>查詢結果</title>
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php 
    $function=$_REQUEST["function"];
    $search=$_REQUEST["search"];

    $query = "SELECT songTitle, singer, album, type, year, length FROM song WHERE {$function} = '{$search}'";
    $query_run = mysqli_query($link,$query); //$link <<此變數來自引入的 config.php
?>

<div class="container">
    <h4>符合條件之歌曲</h4>
    <table class="table table-sm table-bordered"style="text-align:center;">
        <thead style="text-align:center;">
            <tr style="text-align:center;">
                <th>歌名</th>
                <th>歌手</th>
                <th>專輯</th>
                <th>曲風</th>
                <th>年份</th>
                <th>長度</th>
            </tr>
        </thead>

        <tbody>
            <!-- 大括號的上、下半部分 分別用 PHP 拆開 ，這樣中間就可以純用HTML語法-->
            <?php
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    {
            ?>
                            <tr>
                                <!-- $row['(輸入資料表的欄位名稱)'];  <<用雙引號也行 -->
                                <td><?php echo $row['songTitle']; ?></td> 
                                <td><?php echo $row['singer']; ?></td> 
                                <td><?php echo $row['album']; ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['year']; ?></td>
                                <td><?php echo $row['length']; ?></td>
                            </tr>
            <?php
                  }
                }
            ?>
        </tbody>
    </table>
</div>
<center>
<a href="welcome.php">回首頁</a>&emsp;<a href="select_plat.html">回上一頁</a>
</center>
</body>


<!--BOOTSTRAP的東西------------------------------------------------------------------------->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>