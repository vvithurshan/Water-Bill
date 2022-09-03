<?php
session_start();

$con=new mysqli("localhost","root","","project_final");

if($con->connect_error){
echo $con->connect_error;
die("sorry connection error");
}
else{
 echo "database connected";
}

if(isset($_POST["login"])){
    $username=$_POST["user_name"];
    $password=$_POST["password"];

    if($username!="" && $password!=""){
        $sql="SELECT username,password FROM admin_water WHERE username='$username' AND 
        password='$password'";
        $result=$con->query($sql);


        $sql_2="SELECT username,password FROM admin_electricity WHERE username='$username' AND 
        password='$password'";
        $result_2=$con->query($sql_2);


        

        if($result->num_rows>=1){
            $_SESSION["username_water"] =$username;
            $_SESSION["password_water"] = $password;
            // header("location:dialog_dash.php");
          echo "this is water";
        }
        elseif($result_2->num_rows>=1){
            $_SESSION["username_electricty"] =$username;
            $_SESSION["password_electricity"] = $password;
            // header("location:dialog_dash.php");
            echo "this is electricty";
        }
  
        else{
            header("location:admin-login-main.php?admin=invalid username or password");
           // echo "invalid user";
        }
    }
    else{
       // echo "plese enter all the details";
    }
}
    else{
        //echo "please enter all the details";

    }