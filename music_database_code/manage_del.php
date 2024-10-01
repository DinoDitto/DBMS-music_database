<?php 
include('config.php');  //這是引入剛剛寫完，用來連線的.php
?>

<!DOCTYPE html>
<html lang="en">
<title>刪除歌曲</title>
<head>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<!--show all song-->
<?php 
	$query1 = "SELECT songTitle, singer, album, type, year, length FROM song"; 
	$query_run1 = mysqli_query($link,$query1); //$link <<此變數來自引入的 config.php
?>
<div class="container">
	<h4>所有歌曲</h4>
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
				if(mysqli_num_rows($query_run1) > 0)
				{
					foreach($query_run1 as $row1)
					{
			?>
						<tr>
							<!-- $row['(輸入資料表的欄位名稱)'];  <<用雙引號也行 -->
							<td><?php echo $row1['songTitle']; ?></td> 
							<td><?php echo $row1['singer']; ?></td> 
							<td><?php echo $row1['album']; ?></td>
							<td><?php echo $row1['type']; ?></td>
							<td><?php echo $row1['year']; ?></td>
							<td><?php echo $row1['length']; ?></td>
						</tr>
			<?php
				  }
				}
			?>
		</tbody>
	</table>
</div>

<!--前端輸入-->
<center>
<form name="deleteSongFromPlaylistForm" method="post" action="manage_del.php" onsubmit="return validateForm()">
	要刪除的歌曲:
	<input type="text" name="song"><br/><br/>
	<input type="submit" value="刪除" name="submit">
	<input type="reset" value="重設" name="submit">
</form>
<br/>
<a href="manage_index.php">回首頁</a>
</center>
</center>
</body>
</html>

<!--刪除歌曲-->
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $song=$_POST['song'];

	$sql = "DELETE FROM song WHERE songTitle = '{$song}'";

	// 用mysqli_query方法執行(sql語法)將結果存在變數中
	$result = mysqli_query($link,$sql);

	// 如果有異動到資料庫數量(更新資料庫)
    if (mysqli_affected_rows($link)>0) {
    // 如果有一筆以上代表有更新
    // mysqli_insert_id可以抓到第一筆的id
    $new_id= mysqli_insert_id ($link);
    echo '<script type="text/javascript">';
    echo 'alert("已刪除此歌曲");'; 
    echo 'window.location.href="manage_del.php";';
    echo '</script>';
    }
    elseif(mysqli_affected_rows($link)==0) {
        echo "無資料刪除";
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }
     mysqli_close($link); 
}
?>
