<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style-basic-skeleton.css">
    <link rel="stylesheet" type="text/css" href="style-left.css">

    <style>
        form {
            /* padding-top: 65px; */
            padding: 15px;
            max-width: 800px;
            height: 390px;
            margin-top: 45px;
            margin-left: 120px;
            /* margin: 40px auto 0; */
            box-shadow: 0 0 1em #222;
            border-radius: 2px;
            font-size: 15px;
            text-align: center;
            font-family: Arial Black;
        }
        
        .submit {
            height: 45px;
            width: 230px;
            cursor: pointer;
        }
        
        .submit:hover {
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
            <button id="btn-left-menu-admin" class="btn-left-menu">ADMIN LOGIN</button>
        </div>
        <div id="button-about-us" class="button">
            <button id="btn-left-menu-about-us" class="btn-left-menu">ABOUT US</button>
        </div>
        <div id="button-feedlback" class="button">
            <button id="btn-left-menu-feed-back" class="btn-left-menu">FEEDBACK</button>
        </div>
        <div id="button-logout" class="button">
            <button id="btn-left-menu-" class="btn-left-menu">LOGOUT</button>
        </div>
    </div>
    <div id="content-main" class="content-main">

        <div class="login-login" id="login-login">
            <form action="admin-login.php" method="POST">
                 <?php
if(isset($_GET["admin"])){
        echo"<h2 style='color:red;'>Invalid username or password</h2>";
    }
?> 
                <!-- <h2>Please login</h2> -->
                <h2>User Name</h2>
                <input type=txt name=user_name id="input_user " class="input_user" size="40px">
                <br><br>
                <h2>Password</h2>
                <input type=password name=password id="input_password" class="input_password" size="40px">
                <br><br>

                <h1><button class="submit" name=login>LOGIN</button></h1>
            </form>
        </div>
        <script src="jquery-3.5.1.min.js">
        </script>
            <script>
        document.getElementById("btn-left-menu-admin").style.color = "blue";
 
    </script>


</body>

</html>