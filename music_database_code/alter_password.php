<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>修改平台</title> 
<style type="text/css"> 
</style> 
</head> 
<body>
<?php  
session_start(); 
?> 
<h3>修改使用者密碼</h3>
<form action="alter_password_.php" method="post" onsubmit="return alter()"> 
使用者名稱:
<input type="text" name="username" id ="username" /><br/> 
舊密碼:
<input type="password" name="oldpassword" id ="oldpassword"/><br/> 
新密碼:
<input type="password" name="newpassword" id="newpassword"/><br/> 
確認新密碼:
<input type="password" name="assertpassword" id="assertpassword"/><br/> 

<input type="submit" value="修改密碼" onclick="return alter()"> 
<input type="reset" value="重填" name="submit">
<br/><br/>
<a href="welcome.php">回首頁</a>
</form> 
<script type="text/javascript"> 
document.getElementById("username").value="<? php echo "${_SESSION["username"]}";?>" 
</script> 
<script type="text/javascript"> 
function alter() { 
var username=document.getElementById("username").value; 
var oldpassword=document.getElementById("oldpassword").value; 
var newpassword=document.getElementById("newpassword").value; 
var assertpassword=document.getElementById("assertpassword").value; 
var regex=/^[/s] $/; 
if(regex.test(username)||username.length==0){ 
	alert("使用者名稱格式不對"); 
	return false; 
} 
if(regex.test(oldpassword)||oldpassword.length==0){ 
	alert("密碼格式不對"); 
	return false; 
} 
if(regex.test(newpassword)||newpassword.length==0) { 
	alert("新密碼格式不對"); 
	return false; 
} 
if (assertpassword != newpassword||assertpassword==0) { 
	alert("兩次密碼輸入不一致"); 
	return false; 
} 

return true; 
} 
</script>  
</body> 
</html> 