<?php
// 載入config.php來連結資料庫
require_once "config.php";
$playlist=$_REQUEST["all_playlist"];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $song=$_POST['song'];

    $query1 = "SELECT id FROM song WHERE songTitle = '{$song}'";
    $query_run1 = mysqli_query($link,$query1);
    $row1 = mysqli_fetch_assoc($query_run1);

    $query2 = "SELECT id FROM playlist WHERE playlistTitle = '{$playlist}'";
    $query_run2 = mysqli_query($link,$query2);
    $row2 = mysqli_fetch_assoc($query_run2);

    // sql語法存在變數中
    $sql = "INSERT INTO song_in_playlist(song_id, playlist_id) VALUES ('{$row1['id']}','{$row2['id']}')";


    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($link,$sql);

    // 如果有異動到資料庫數量(更新資料庫)
    if (mysqli_affected_rows($link)>0) {
    // 如果有一筆以上代表有更新
    // mysqli_insert_id可以抓到第一筆的id
    $new_id= mysqli_insert_id ($link);
    echo '<script type="text/javascript">';
    echo 'alert("已新增此歌曲至播放清單");'; 
    echo 'window.location.href="add_song_to_list.php";';
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