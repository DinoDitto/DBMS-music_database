<!--delete playlist-->
<?php
require_once "config.php";
$playlist=$_REQUEST["all_playlist"];

$query = "DELETE FROM playlist WHERE playlistTitle ='{$playlist}'";
$result = mysqli_query($link,$query);

echo '<script type="text/javascript"> ';
echo 'alert("已刪除此播放清單"); ';
echo 'window.location.href="welcome.php"; ';
echo '</script>';
?> 
