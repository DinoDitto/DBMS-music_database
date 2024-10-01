<?php 

include('config.php');  //這是引入剛剛寫完，用來連線的.php
?>

<!DOCTYPE html>
<html lang="en">
<title>顯示平台</title>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php

$playlist=$_REQUEST["all_playlist"];

//從下拉式選單找到等於title name的選項返回那個 playlist 的 id
$query1 = "SELECT id FROM playlist WHERE playlistTitle = '{$playlist}'";
$query_run1 = mysqli_query($link,$query1);
$row1 = mysqli_fetch_assoc($query_run1); //函數返回一個關聯數組，其中包含結果對象的當前行。如果沒有更多行，此函數返回 NULL



$query2 = "SELECT song_id FROM song_in_playlist WHERE playlist_id = '{$row1['id']}'";
$query_run2 = mysqli_query($link,$query2);
?>

<div class="container">
<?php
	print "【";
	print $playlist;
	print "】";
	print " 的所有歌曲";

?>
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
<?php
foreach($query_run2 as $row2)
	{
	$query3 = "SELECT songTitle, singer, album, type, year, length FROM song WHERE id = '{$row2['song_id']}'";
	$query_run3 = mysqli_query($link,$query3);


		if(mysqli_num_rows($query_run3) > 0)
		{
			foreach($query_run3 as $row3)
			{
				echo '<tr>';
				echo '	<td>';
				echo $row3['songTitle'];
				echo '</td> ';
				echo '	<td>';
				echo $row3['singer'];
				echo '</td> ';
				echo '	<td>';
				echo $row3['album'];
				echo '</td> ';
				echo '	<td>';
				echo $row3['type'];
				echo '</td> ';
				echo '	<td>';
				echo $row3['year'];
				echo '</td> ';
				echo '	<td>';
				echo $row3['length'];
				echo '</td> ';
				echo '</tr>';
		    }
		}
		else
		{
			echo '目前清單中無任何歌曲';
			echo '<br></br>';
			echo '<a href="add_song_to_list.php">新增歌曲至播放清單</a>';
		}
	}
?>
			</tbody>
		</table>
	</div>

<center>
<a href="add_song_to_list.php">新增歌曲至播放清單</a>
<br/>
<a href="welcome.php">回首頁</a>&emsp;<a href="show.php">回上一頁</a>
</center>

</body>

<!--BOOTSTRAP的東西------------------------------------------------------------------------->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>