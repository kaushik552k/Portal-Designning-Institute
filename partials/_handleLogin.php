<?php

$showerror="false";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username=$_POST['loginUsername'];
    $pass=$_POST['loginPassword'];

    $sql="select * from `users` where user_username='$username'";
    $result=mysqli_query($conn,$sql);
    $numrows=mysqli_num_rows($result);
    if($numrows==1){
        $row=mysqli_fetch_assoc($result);
            if(password_verify($pass,$row['user_pass'])){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sno']=$row['sno'];
                $_SESSION['username']=$username;
                header("Location:/Portal-Designning-Institute/college/college.php?loginsuccess=true");
                exit();
            }
          
                header("Location: /Portal-Designning-Institute/college/college.php?loginsuccess=false");
            }
            header("Location: /Portal-Designning-Institute/college/college.php?loginsuccess=false");
        }
    
?>