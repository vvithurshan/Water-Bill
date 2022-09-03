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

if(isset($_SESSION["username"])){
    $connection_id=$_SESSION["username"];
    // echo $_SESSION["username"]; 
    $result=$con->query("SELECT * FROM customer_details where connection_id='$connection_id'") or die($mysqli->error);
    $row=$result->fetch_assoc();

    $result_2=$con->query("SELECT * FROM bill_details where connection_id='$connection_id'") or die($mysqli->error);
    // $row_2=$result_2->fetch_assoc();
}
else{
    header("location:user-login-page.php?login=loginfirst");

}
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Electricty</title>
        <link rel="stylesheet" type="text/css" href="style-basic-skeleton.css">
        <link rel="stylesheet" type="text/css" href="style-left.css">
        <link rel="stylesheet" type="text/css" href="table.css">

        <!-- customer-info
        customer-pay
        edit-customer-details
     -->
        <style>
            .customer-info {
                border: solid;
                margin-top: 20px;
                display: non;
                margin-left: 20px;
                padding: 20px;
            }
            
            .customer-pay {
                border: solid;
                margin-top: 20px;
                display: none;
                padding: 20px;
            }
            
            .edit-customer-details {
                border: solid;
                display: none;
            }
            
            .pay {
                height: 45px;
                width: 230px;
                cursor: pointer;
                margin-left: 200px;
            }
            
            .pay:hover {
                background-color: blue;
            }
            
            .pay-method {
                border: solid;
                width: 500px;
                float: left;
                margin: 10px;
            }
            
            .btn-pay {
                width: 500px;
                height: 50px;
            }
            
            .btn-update {
                width: 100px;
                height: 50px;
            }
            
            form {
                /* padding-top: 65px; */
                padding-top: 5px;
                padding-left: 100px;
                max-width: 800px;
                /* height: 390px; */
                margin-top: 5px;
                margin-left: 20px;
                /* margin: 40px auto 0; */
                box-shadow: 0 0 1em #222;
                border-radius: 2px;
                font-size: 15px;
                /* text-align: center; */
                /* font-family: Arial Black; */
            }
            
            h2 {
                background-color: #d5f4e6;
            }
            
            .btn-main-customer {
                width: 220px;
                margin-top: 15px;
                cursor: pointer;
                border-radius: 5px;
                margin-left: 30px;
                /* background: #555555; */
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
                <a href="login.php?logout"> <button id="btn-left-menu-" class="btn-left-menu">LOGOUT</button></a>
            </div>
        </div>
        <div id="content-main" class="content-main">
            <button id="account-details" class="btn-main-customer" onclick="fcn_main_display('account-details')"><h3>Accout Details</h3></button>
            <button id="make-payment" class="btn-main-customer" onclick="fcn_main_display('make-payment')"><h3>Make Payment</h3></button>
            <button id="edit-profile" class="btn-main-customer" onclick="fcn_main_display('edit-profile')"><h3>Edit Profile</h3></button>

            <div id="customer-info" class="customer-info">
                <h3>Connection Id :
                    <?php echo $row['connection_id'];?>
                </h3>
                <h3>Name :
                    <?php echo strtoupper($row['name']);?>
                </h3>
                <h3>Bill Type : Electricty</h3>
                <h3>Address :
                    <?php echo $row['address'];?>
                </h3>
                <h3>Mobile Number :
                    <?php echo $row['mobile_number'];?>
                </h3>
                <h3></h3>
                <br><br>

                <table class="container">
                    <thead>
                        <tr>
                            <th>
                                <h1>No</h1>
                            </th>
                            <th>
                                <h1>Connection id</h1>
                            </th>
                            <th>
                                <h1>Month</h1>
                            </th>
                            <th>
                                <h1>Bill</h1>
                            </th>
                            <th>
                                <h1>payment</h1>
                            </th>
                            <th>
                                <h1>Status</h1>
                            </th> -->
                            <!-- <th><h1>Edit</h1></th> -->

                            <!-- <!-- <th><h1>Delete</h1></th> -->

                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0;
$payment=0;
$bill=0;
$no=0;
?>
                        <?php while($row_2=$result_2->fetch_assoc()): $count++; 
if($row_2['payment']==0){
    $row_2['status']=="not paid";
}
if($row_2['status']=="not paid"){
    $count--;
}
$no++;
$payment=$payment+$row_2['payment'];
$bill=$bill+$row_2['bill'];
?>
                        <tr>
                            <td>
                                <?php echo $no;?>
                            </td>
                            <td>
                                <?php echo $row_2['connection_id'];?>
                            </td>
                            <td>
                                <?php echo $row_2['month'];?>
                            </td>
                            <td>
                                <?php echo "$",$row_2['bill'];?>
                            </td>
                            <td>
                                <?php  echo "$",$row_2['payment'];?>
                            </td>
                            <td>
                                <?php  echo $row_2['status'];?>
                            </td>

                        </tr>

                        <?php endwhile; echo $count;
?>

                    </tbody>
                </table>
                <h3>Total Number of payment :
                    <?php echo $count;?>
                </h3>
                <h3>Total Amount to be paid :
                    <?php echo "$",$bill;?>
                </h3>
                <h3>Total Paid Amount :
                    <?php echo "$",$payment;?>
                </h3>
                <h3>Balance Amount :
                    <?php
 $balance=$bill-$payment; 
echo "$",$balance;?>
                </h3>
                <h3>Connection status :
                    <?php 
$min_payment=5000;
$tobeactive=$balance-$min_payment;
if($balance>$min_payment){
    echo "<h3 style='color:red;'>Disconnected</h3>";
echo "<h3 style='color:red;'>Please pay mininum of $$tobeactive to be active </h3>";}
    else{
      echo  "<h3 style='color:green;'>Active</h3>";
    }
?></h3>







            </div>

            <!-- next part -->
            <div id="customer-pay" class="customer-pay">
                <form>
                    <h2>Connection Id :
                        <?php echo $row['connection_id'];?>
                    </h2>
                    <h2>Connection Type :
                        <?php echo "Water" ;?>
                    </h2>
                    <h2>Amount to pay :<input id="amount" class="amount" name=amount value=""></input>
                        </h3>
                        <h2>Payment Type :</h2>
                        <h2><input type="checkbox" value="Credit Card" name=Credit Card>Credit Card</input>
                        </h2>
                        <h2><input type="checkbox" value="Card" name=Card>Card</input>
                        </h2>

                        <!-- <div class="pay-method" id="div-pay-credit"> -->
                        <!-- <button id="pay-cred   it" class="btn-pay">Credit card</button> -->
                        <h2>Card number</h3><input type="text"></input>
                        </h2>
                        <h2>Expiry date</h3><input type="date"></input>
                        </h2>
                        <h2><button id="click-to-pay" class="pay">Click to pay</button></h2>

                </form>


            </div>
            <!-- customer details  -->
            <div class="edit-customer-details" id="edit-customer-details">
                <form action="register.php" method="POST">
                    <?php if(isset($_GET["update_info"])){
                        $update_info_message=$_GET["update_info"];
                        echo"<h2 style='color:red;'>$update_info_message</h2>";
                    }
                    ?>
                    <h2>Edit Your Details</h2>
                    <h2>Connection id:
                        <?php echo $row['connection_id'];?>
                    </h2>
                    <h2>Name:</h2><input name="name" value="<?php echo $row['name'];?>
                    " required></input>
                    <h2>Address:</h2><input name="address" value="<?php echo $row['address'];?>
                    " required></input>
                    <h2>Mobile:</h2><input name="mobile_number" value="<?php echo $row['mobile_number'];?>" required></input>
                    <h2>Current password:</h2><input type="password" name="current_password" value="" required></input>
                    <h2>New password:</h2>
                    <h4 style='color:red;'>Fill this only if you want to change password</h4>
                    <input type="password" name="new_password" value=""></input>
                    <h2><button class="btn-update" name=update>Update</button></h2>

                </form>
            </div>
        </div>
        <script src="jquery-3.5.1.min.js"></script>

        <script>
            document.getElementById("btn-left-menu-login").style.color = "blue";
            $(document).ready(function() {

                $("#btn-left-menu-home").click(function() {
                    console.log('hello');
                    window.location.href = "home-page.html";
                })

            });

            fcn_main_display('account-details');
            function fcn_main_display(key) {
                let array_id_button = ["account-details", "make-payment", "edit-profile"];
                let array_id_div = ["customer-info", "customer-pay", "edit-customer-details"]

                if (key === array_id_button[0])
                    account_details();
                else if (key === array_id_button[1])
                    make_payment();
                else if (key === array_id_button[2])
                    edit_profile();


                function make_blank() {
                    for (let i = 0; i < 3; i++) {
                        document.getElementById(array_id_button[i]).style.background = "white";
                        document.getElementById(array_id_div[i]).style.display = "none";
                    }
                }

                function account_details() {
                    make_blank();
                    document.getElementById(array_id_div[0]).style.display = "block";
                    document.getElementById(array_id_button[0]).style.background = "#555555";


                }

                function make_payment() {
                    make_blank();
                    document.getElementById(array_id_div[1]).style.display = "block";
                    document.getElementById(array_id_button[1]).style.background = "#555555";

                }

                function edit_profile() {
                    make_blank();
                    document.getElementById(array_id_div[2]).style.display = "block";
                    document.getElementById(array_id_button[2]).style.background = "#555555";

                }
            }
        </script>
    </body>

    </html>

    <?php if(isset($_GET["update_info"])){
        echo"<script>fcn_main_display('edit-profile')</script>";
     }
     ?>