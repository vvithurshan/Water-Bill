<?php

session_start();

$con=new mysqli("localhost","root","","project_final");

if($con->connect_error){
echo $con->connect_error;
die("sorry connection error");
}
else{
//  echo "database connected";
}


if(isset($_POST["submit"])){
    // echo "ok";
    $username=$_POST["user_name"];
    $password=$_POST["password"];
    $typeof=(int)substr($username,0,3);
    
    echo $username,$password,$typeof;

    if($username!="" && $password!=""){
        $sql_water="SELECT connection_id,password FROM customer_details WHERE connection_id='$username' AND 
        password='$password'";
        $sql_ele="SELECT connection_id,password FROM customer_details_electricty WHERE connection_id='$username' AND 
         password='$password'";

    if($typeof==150){
        $typeof_bill="WATER";
    $sql=$sql_water;
    }
    elseif($typeof==200){
        $typeof_bill="ELECTRICTY"; 
        $sql=$sql_ele;
    }
    else{
        header("location:user-login-page.php?login=loginfailed");
    }
        $result=$con->query($sql);
        

        if($result->num_rows>=1){
            $_SESSION["username"] = "$username";
            $_SESSION["password"] = "$password";
            $_SESSION["typeof_bill"] = "$typeof_bill";

            header("location:payment-page.php");
          
        }
        else{
            header("location:user-login-page.php?login=loginfailed");


        }

    }
    else{
        header("location:user-login-page.php?login=loginfailed");

    }
}

// if(isset($_SESSION["username"])){
//     header("location:user-login-page.php?login=success");
// }
// else{
//     // header("location:user-login-page.php?login=loginfailed");
// }

//logout

if(isset($_GET["logout"])){//WORKS
$logout_message=$_GET["logout"];
    session_unset();

    // // destroy the session
    session_destroy();
    if($logout_message=="please login again"){
        header("location:user-login-page.php?logout=$logout_message");

    }
    else{
        header("location:user-login-page.php?logout=successful logout");

    }
}





?>