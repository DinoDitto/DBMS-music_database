<?php 
include('config.php');  //這是引入剛剛寫完，用來連線的.php
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>刪除平台</title>
</head>
<body>

<!--下拉式選單列出所有清單-->	
<center>
<?php 
	$query = "SELECT playlistTitle FROM playlist"; 
	$query_run = mysqli_query($link,$query);
?>
<form name="deletePlaylistForm" method="post" action="delete_playlist_alert.php" onsubmit="return validateForm()">
<div class="container">
	<h2>選擇要刪除的播放清單</h2>
	<br/>
	<table class="table table-sm table-bordered"style="text-align:center;">
		<thead style="text-align:center;">
			<tr style="text-align:center;">
			</tr>
		</thead>
		<tbody>
			<!-- 大括號的上、下半部分 分別用 PHP 拆開 ，這樣中間就可以純用HTML語法-->
			<?php
				if(mysqli_num_rows($query_run) > 0)
				{
					echo '<select name = "all_playlist">';
					foreach($query_run as $row)
					{
						echo '<option value="';
						echo $row['playlistTitle'];
						echo '">';
						echo $row['playlistTitle'];
						echo '</option>';
					}
					echo '</select>';
					echo "<br></br>";
					echo '<input type="submit" value="刪除" name="submit">';
				}
				else{
					echo '目前無播放清單';
				}
			?>
		</tbody>
	</table>
</div>
</form>
<br/>
<a href="welcome.php">回首頁</a>&emsp;<a href="delete_plat.html">回上一頁</a>
</center>
</body>
</html>