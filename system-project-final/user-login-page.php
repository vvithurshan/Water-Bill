<?php 
  session_start();
  if(isset($_SESSION["username"])){
    header("location:payment-page.php");
  }
  
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
    <link rel="stylesheet" type="text/css" href="style-basic-skeleton.css">
    <link rel="stylesheet" type="text/css" href="style-left.css">
    <style>
        .login-or-register {
            border: solid;
            margin: 10px;
            height: 40px;
            border-radius: 10px;
            width: 150px;
        }
        
        .login-or-register-main {
            /* border: solid; */
            /* height: 500px; */
            /* display: none; */
        }
        
        .login,
        .register {
            border: solid;
            height: 50px;
            width: 400px;
            margin: 0 auto;
            float: left;
            margin-left: 25px;
            margin-top: 20px;
            border-radius: 5px;
        }
        
        .register {
            float: right;
        }
        
        .login-login {
            border: solid blue;
            margin-top: 90px;
            height: 430px;
            display: none;
        }
          
        
        .register-register {
            border: solid red;
            margin-top: 90px;
            height: 430px;
            display: none;
        }
        
        .btn-login-style,
        .btn-register-style {
            height: 53px;
            width: 400px;
            cursor: pointer;
        }
        
        .btn-login-style:hover,
        .btn-register-style:hover {
            height: 50px;
            width: 410px;
        }

        form {
      padding-top: 5px;
      padding: 15px;
      max-width: 800px;
      height: 390px;
      margin-left:120px;
      /* margin: 40px auto 0; */
      box-shadow: 0 0 1em #222;
      border-radius: 2px;
      font-size: 15px;
      text-align: center;
      font-family: Arial Black;
  }
  .submit{
    height: 45px;
    width: 230px;
    cursor: pointer;
  }
  .submit:hover{
    background-color: blue;
  }
    </style>
</head>

<body>
    <div id="page-logo" class="page-logo"></div>
    <div id="heading" class="heading"></div>
    <div id="left-menu" class="left-menu">
        <div id="button-home" class="button">
            <a href="home-page.php"><button id="btn-left-menu-home" class="btn-left-menu">HOME</button></a>
        </div>
        <div id="button-customer-login" class="button">
            <a href="user-login-page.php"> <button id="btn-left-menu-login" class="btn-left-menu">USER LOGIN</button></a>
        </div>
        <div id="button-admin-login" class="button">
            <button id="btn-left-menu-" class="btn-left-menu">ADMIN LOGIN</button>
        </div>
        <div id="button-about-us" class="button">
            <button id="btn-left-menu-" class="btn-left-menu">ABOUT US</button>
        </div>
        <div id="button-feedlback" class="button">
            <button id="btn-left-menu-" class="btn-left-menu">FEEDBACK</button>
        </div>
        <div id="button-logout" class="button">
            <a href="login.php?logout"> <button id="btn-left-menu-" class="btn-left-menu">LOGOUT</button></a>
        </div>
    </div>
    <div id="content-main" class="content-main">
        <div id="login-or-register-main" class="login-or-register-main">
            <div class="login"> <button id="btn-login" class="btn-login-style" onclick="fcn_login_();">LOGIN</button></div>
            <div class="register"> <button id="btn-register" class="btn-register-style"  onclick="fcn_register();">REGISTER</button></div></div>
        <div class="login-login" id="login-login">
        <form action="login.php" method="POST">
        <?php
if(isset($_GET["login"])){
  
    $msg=$_GET["login"];
    if($msg=="loginfirst"){
        echo"<h2 style='color:red;'>Please Login First</h2>";
    }
    if($msg=="loginfailed"){
        echo"<h2 style='color:red;'>Please enter valid username and password</h2>";
        echo "<script>fcn_login('failed');</script>";
    }
    if($msg=="success"){
        echo "<script>fcn_login('success');</script>";
    }


    }

    if(isset($_GET["register"])){
  
      //  $msg=$_GET["successful"];
       $reg_=$_GET["register"];
       if($reg_=="successful"){
        echo"<h2 style='color:red;'>Successful Registration please login now</h2>";
    }}

    if(isset($_GET["logout"])){
        $login_message=$_GET["logout"];
        echo"<h2 style='color:red;'>$login_message</h2>";

    }
?>
                    <!-- <h2>Please login</h2> -->
                    <h2>User Name</h2>
                    <input type=txt name=user_name id="input_user " class="input_user" size="40px">
                    <br><br>
                    <h2>Password</h2>
                    <input type=password name=password id="input_password" class="input_password" size="40px">
                    <br><br>

                    <h1><button class="submit" name=submit>LOGIN</button></h1>
                </form> </div>
        <div class="register-register" id="register-register">
        <form action="register.php" method="POST">
        <?php
        echo "<script>fcn_register</script>";
        if(isset($_GET["register"])){
            $reg=$_GET["register"];
        if($reg=="please type a valid connection id"){
           
    echo "<h2 style='color:red;'>Please enter valid connection id</h2>";}}?>
            <h3>Connection id</h3> <input type="text" name=connection_id></input>
            <h3>password</h3> <input type="password" name=password></input>
            <h3>Name</h3> <input type="text" name=name></input>
            <h3>Address</h3> <input type="text" name=address></input>
            <h3>mobile Number</h3> <input type="text" name=mobile_number></input>
            <h1><button class="submit" name=register>Register</button></h1>
         </form>
        </div>
    </div>

    <script>  
         fcn_login_();
         function fcn_login_(mes) {
            console.log('hello');
            if(mes==='del'){
            document.getElementById("login-login").style.display = "none";}
            else{
                document.getElementById("login-login").style.display = "block";
                fcn_register('del');
            }

           
        }
        function fcn_login(msg){
            console.log(msg);
            if (msg === 'success') {
                console.log(msg);
                document.getElementById("btn-left-menu-login").style.color = "green";
             } else {
                console.log(msg);
                document.getElementById("btn-left-menu-login").style.color = "red";
             }
        }
        function fcn_register(mes) {
            console.log('hello');
            if(mes==='del'){
                document.getElementById("register-register").style.display = "none";
            }
            else{
                document.getElementById("register-register").style.display = "block";
                fcn_login_('del');
             }
        }
    
        document.getElementById("btn-left-menu-login").style.color = "blue";

     
       </script>
</body>

</html>

<?php

if(isset($_GET["username"])){
  echo $_GET["username"];
}
if(isset($_SESSION["username"])){
    echo $_SESSION["username"];  
}

if(isset($_GET["register"])){
    $reg_=$_GET["register"];
if($reg_=="please type a valid connection id"){
    echo "<script>fcn_register()</script>";}}


// if(isset($_GET["register"])){
    
// echo "<script>fcn_register()</script>";
// echo $_GET["register"];
// }

//it is also there 
//you have to always call javascript functions at the end the line 

if(isset($_GET["login"])){
  
    $msg=$_GET["login"];
    if($msg=="loginfailed"){
        // echo"<h2 style='color:red;'>Please enter valid username and password</h2>";
        echo "<script>fcn_login('failed');</script>";
    }
    if($msg=="success"){
        echo "<script>fcn_login('success');</script>";
    }


    }
?>
