<?php
// Include config file
$conn=require_once "config.php";
 
// Define variables and initialize with empty values
$username=$_POST["username"];
$password=$_POST["password"];
//增加hash可以提高安全性
$password_hash=password_hash($password,PASSWORD_DEFAULT);
// Processing form data when form is submitted

if($username == "root" AND $password == "dddino0406"){
    header("location:manage_index.php");
}
elseif ($username != "root" OR $password != "dddino0406") {
    function_alert("帳號或密碼錯誤");
 }
else{
    function_alert("Something wrong"); 
 }

function function_alert($message) {     
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='manage_login.php';
    </script>"; 
    return false;
} 
?>
?>