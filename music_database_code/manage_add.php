<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>新增歌曲</title>
<body>

<!--表單輸入-->
<center>
<h2>輸入歌曲資料</h2>
<form name="addSongForm" method="post" action="manage_add.php" onsubmit="return validateForm()">
歌名:
    <input type="text" name="songTitle"><br/><br/>
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

<input type="submit" value="新增" name="submit">
<input type="reset" value="重設" name="submit">
</form>
<br/>
<a href="manage_index.php">回首頁</a>
</center>
</body>
</html>

<!--加歌-->
<?php 
$conn=require_once("config.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $songTitle=$_POST["songTitle"];
    $singer=$_POST["singer"];
    $album=$_POST["album"];
    $type=$_POST["type"];
    $year=$_POST["year"];
    $length=$_POST["length"];

    $sql = "INSERT INTO song(songTitle, singer, album, type, year, length) 
            VALUES ('{$songTitle}', '{$singer}', '{$album}', '{$type}', '{$year}', '{$length}')";

    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($link,$sql);

    // 如果有異動到資料庫數量(更新資料庫)
    if (mysqli_affected_rows($link)>0) {
    // 如果有一筆以上代表有更新
    // mysqli_insert_id可以抓到第一筆的id
    $new_id= mysqli_insert_id ($link);
    echo '<script type="text/javascript">';
    echo 'alert("已新增此歌曲");'; 
    echo 'window.location.href="manage_add.php";';
    echo '</script>';
    }
    elseif(mysqli_affected_rows($link)==0) {
        echo "無資料新增";
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }
     mysqli_close($link); 
}
?>