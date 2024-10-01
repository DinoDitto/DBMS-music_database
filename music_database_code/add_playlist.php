<?php
// session_start();  //很重要，可以用的變數存在session裡
// $username=$_SESSION["username"];

// 載入config.php來連結資料庫
require_once "config.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $playlistTitle=$_POST['playlistName'];
    $username=$_POST['userAccount'];

    $query = "SELECT id FROM user WHERE userAccount = '{$username}'";
    $query_run = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($query_run); //函數返回一個關聯數組，其中包含結果對象的當前行。如果沒有更多行，此函數返回 NULL

    // sql語法存在變數中
    //加一個播放清單
    $sql = "INSERT INTO playlist(playlistTitle, user_id) VALUES ('{$playlistTitle}', '{$row['id']}')";

    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($link,$sql);

    // 如果有異動到資料庫數量(更新資料庫)
    if (mysqli_affected_rows($link)>0) {
    // 如果有一筆以上代表有更新
    // mysqli_insert_id可以抓到第一筆的id
    $new_id= mysqli_insert_id ($link);
    echo '<script type="text/javascript">';
    echo 'alert("已新增此播放清單");'; 
    echo 'window.location.href="add_playlist.html";';
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



