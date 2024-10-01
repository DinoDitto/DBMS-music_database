<?php
session_start();  //很重要，可以用的變數存在session裡
// $username=$_SESSION["username"];
// echo "<h1>你好 ".$username."</h1>";
?>

<?php
// 載入config.php來連結資料庫
require_once "config.php";
?>
<!doctype html>
<html lang="zh-Hant-TW">
<body>
	<center>
		<h1>登入成功</h1>
		<h3>功能</h3>
		<input type="button" value="顯示資料" onclick="location.href='show.php'" style="width:120px;height:40px;font-size:15px">
		<input type="button" value="查詢資料" onclick="location.href='select_plat.html'" style="width:120px;height:40px;font-size:15px">
		<input type="button" value="新增資料" onclick="location.href='add_plat.html'" style="width:120px;height:40px;font-size:15px">
		<input type="button" value="刪除資料" onclick="location.href='delete_plat.html'" style="width:120px;height:40px;font-size:15px">
		<br></br>
		<a href='logout.php'>登出</a>
		&emsp;&emsp;
		<a href='alter_password.php'>修改密碼</a>
		<br></br>
	</center>
</body>
</html>