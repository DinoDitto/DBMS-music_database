<?php 

include('config.php');  //這是引入剛剛寫完，用來連線的.php
?>

<!DOCTYPE html>
<html lang="en">
<title>修改歌曲</title>
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
<center>
<form name="deleteSongFromPlaylistForm" method="post" action="manage_modify.php" onsubmit="return validateForm()">
	修改的歌曲:
	<input type="text" name="song"><br/><br/>
	<input type="submit" value="確定" name="submit">
	<input type="reset" value="重設" name="submit">
</form>

<br/>
<a href="manage_index.php">回首頁</a>
</center>
</center>
</body>
</html>

<?php


if(array_key_exists('submit', $_POST)) {
	$songTitle=$_POST["song"];
	//從下拉式選單找到等於title name的選項返回那個 playlist 的 id
	$query1 = "SELECT id FROM song WHERE songTitle = '{$songTitle}'";
	$query_run1 = mysqli_query($link,$query1);
	$row1 = mysqli_fetch_assoc($query_run1); //函數返回一個關聯數組，其中包含結果對象的當前行。如果沒有更多行，此函數返回 NULL
	?>
	<h2>輸入歌曲資料</h2>
	<form name="addSongForm" method="post" action="manage_modify_song.php" onsubmit="return validateForm()">
	歌手:
	    <input type="text" name="singer"><br/><br/>
	專輯:
	    <input type="text" name="album"><br/><br/>
	曲風：
	    <input type="text" name="type"><br/><br/>
	年份：    
	    <input type="text" name="year"><br/><br/>
	歌曲長度：
	    <input type="text" name="length"><br/><br/>

	<input type="hidden" name="songTitle" value="<?php echo $songTitle; ?>">
	<input type="submit" value="修改" name="submit">
	<input type="reset" value="重設" name="submit">
	</form>
<?php
}
?>

