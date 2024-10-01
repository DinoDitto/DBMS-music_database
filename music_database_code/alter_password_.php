<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>正在修改密碼</title> 
</head> 
<body> 
<?php 
session_start (); 
$username = $_REQUEST ["username"]; 
$oldpassword = $_REQUEST ["oldpassword"]; 
$newpassword = $_REQUEST ["newpassword"]; 

include('config.php');
$conn=mysqli_connect("localhost","root","dddino0406","data_all");
if (! $conn) { 
die ( '資料庫連線失敗' . $mysql_error () ); 
} 
$dbusername = null; 
$dbpassword = null; 

$query1 ="SELECT * FROM user WHERE userAccount ='{$username}'";
$result = mysqli_query($link,$query1);

while ( $row = mysqli_fetch_array ( $result ) ) { 
$dbusername = $row ["userAccount"]; 
$dbpassword = $row ["userPassword"]; 
} 
if (is_null ( $dbusername )) { 
?> 

<script type="text/javascript"> 
alert("使用者名稱不存在"); 
window.location.href="alter_password.php"; 
</script>  
<?php 
} 
if ($oldpassword != $dbpassword) { 
?> 
<script type="text/javascript"> 
alert("密碼錯誤"); 
window.location.href="alter_password.php"; 
</script> 

<?php 
} 
$query2 ="UPDATE user SET userPassword='{$newpassword}' WHERE userAccount='{$username}'";
mysqli_query ($link,$query2) or die ( "存入資料庫失敗" . mysqli_error () );
//如果上述使用者名稱密碼判定不錯，則update進資料庫中 
mysqli_close ( $conn ); 
?> 

<script type="text/javascript"> 
alert("密碼修改成功"); 
window.location.href="welcome.php"; 
</script>

</body> 
</html> 