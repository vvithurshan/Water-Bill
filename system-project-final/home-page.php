<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style-basic-skeleton.css">
    <link rel="stylesheet" type="text/css" href="style-left.css">
</head>

<body>
    <div id="page-logo" class="page-logo"></div>
    <div id="heading" class="heading"></div>
    <div id="left-menu" class="left-menu">
        <div id="button-home" class="button">
        <a href="home-page.php" ><button id="btn-left-menu-home" class="btn-left-menu">HOME</button></a>
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

    </div>
    <script src="jquery-3.5.1.min.js"></script>

    <script>
        document.getElementById("btn-left-menu-home").style.color = "blue";
        $(document).ready(function() {

            $("#btn-left-menu-home").click(function() {
                console.log('hello');
                window.location.href = "home-page.html";
            })

        });
    </script>
</body>

</html>