<?php
// 載入config.php來連結資料庫
require_once "config.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$songTitle=$_POST["songTitle"];
    $singer=$_POST["singer"];
    $album=$_POST["album"];
    $type=$_POST["type"];
    $year=$_POST["year"];
    $length=$_POST["length"];

    $sql = "UPDATE song SET singer='{$singer}' AND album='{$album}' AND type='{$type}' AND year='{$year}' 
    		AND length='{$length}' WHERE songTitle='{$songTitle}'";

    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($link,$sql);
    // 如果有異動到資料庫數量(更新資料庫)
    if (mysqli_affected_rows($link)>0) {
    // 如果有一筆以上代表有更新
    // mysqli_insert_id可以抓到第一筆的id
    $new_id= mysqli_insert_id ($link);
    echo '<script type="text/javascript">';
    echo 'alert("已修改此歌曲");'; 
    echo 'window.location.href="manage_add.php";';
    echo '</script>';
    }
    elseif(mysqli_affected_rows($link)==0) {
        echo "無資料修改";
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }
     mysqli_close($link); 
}

?>