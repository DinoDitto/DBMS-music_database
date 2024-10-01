<?php 
$conn=require_once("config.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $birth=$_POST["birth"];
    $gender=$_POST["gender"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $username=$_POST["username"];
    $password=$_POST["password"];

    //檢查帳號是否重複
    $check="SELECT * FROM user WHERE userAccount='".$username."'";
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){
        $sql="INSERT INTO user (name, gender, birth, Email, phoneNum, userAccount, userPassword)
            VALUES('".$name."','".$gender."','".$birth."','".$email."','".$phone."',
                '".$username."','".$password."')";
        
        if(mysqli_query($conn, $sql)){
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo "<a href='firstpage.php'>未成功跳轉頁面請點擊此</a>";
            header("refresh:3 ;url=firstpage.php");
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
        echo "<a href='register.html'>未成功跳轉頁面請點擊此</a>";
        header('HTTP/1.0 302 Found');
        //header("refresh:3;url=register.html",true);
        exit;
    }
}
mysqli_close($conn);

function function_alert($message) {     
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='firstpage.php';
    </script>";   
    return false;
} 
?>