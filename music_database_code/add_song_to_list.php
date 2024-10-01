<?php 
include('config.php');  //這是引入剛剛寫完，用來連線的.php
?>

<!DOCTYPE html>
<html lang="en">
<title>新增歌曲至播放清單</title>
<head>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<!--先列出所有歌曲-->
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
					foreach($query_run1 as $row)
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

<!--選擇要加入歌曲的播放清單-->
<?php 
	$query2 = "SELECT playlistTitle FROM playlist  "; 
	$query_run2 = mysqli_query($link,$query2);
?>
<form name="addSongToPlaylistForm" method="post" action="add_song.php" onsubmit="return validateForm()">
<div class="container">
	<h4>選擇要加入歌曲的播放清單</h4>
	<br/>
	<table class="table table-sm table-bordered"style="text-align:center;">
		<thead style="text-align:center;">
			<tr style="text-align:center;">
			</tr>
		</thead>
		<tbody>
			<!-- 大括號的上、下半部分 分別用 PHP 拆開 ，這樣中間就可以純用HTML語法-->
			<?php
				if(mysqli_num_rows($query_run2) > 0)
				{
					echo '<select name = "all_playlist">';
					foreach($query_run2 as $row)
					{
						echo '<option value="';
						echo $row['playlistTitle'];
						echo '">';
						echo $row['playlistTitle'];
						echo '</option>';
					}
					echo '</select>';
				}
				else{
					echo '目前無播放清單';
				}
			?>
		</tbody>
	</table>
</div>
<br/><br/>

<!--前端輸入-->
<center>
要新增的歌曲:
<input type="text" name="song"><br/><br/>
<input type="submit" value="新增" name="submit">
<input type="reset" value="重設" name="submit">
</form>
<br/><br/>
<a href="welcome.php">回首頁</a>&emsp;<a href="add_plat.html">回上一頁</a>
</center>
</body>

<!--BOOTSTRAP的東西------------------------------------------------------------------------->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>