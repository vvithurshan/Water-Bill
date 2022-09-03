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


if(isset($_POST["register"])){
    $name=$_POST['name'];
    $connection_id=$_POST['connection_id'];
    $address=$_POST['address'];
    $mobile_number=$_POST['mobile_number'];
    $password=$_POST['password'];
    $typeof=(int)substr($connection_id,0,3);

    echo $name,$connection_id,$password,$address,$mobile_number;
    // $_SESSION["username"] = $username;
    
    $sql_water="SELECT connection_id from connection_id_water where connection_id='$connection_id'";
    $sql_electricity="SELECT connection_id from connection_id_electricty where connection_id='$connection_id'";
     
    if($typeof==150){
        $sql_2=$sql_water;
    }
    elseif($typeof==200){
        $sql_2=$sql_electricity;
    }
    else{
        header("location:user-login-page.php?register=please type a valid connection id");
    }
    $result=$con->query($sql_2);
    if($result->num_rows>=1){
 
    if($typeof==150){
        $sql="INSERT INTO customer_details (connection_id,password,name,address,mobile_number) VALUES
        ('$connection_id','$password','$name','$address','$mobile_number')";
    }
    elseif($typeof==200){
        $sql="INSERT INTO customer_details_electricty (connection_id,password,name,address,mobile_number) VALUES
        ('$connection_id','$password','$name','$address','$mobile_number')";
    
    }
        if($con->query($sql)){
            header("location:user-login-page.php?register=successful");
            echo "Data Stored Successfully";

        }
         else{
            header("location:user-login-page.php?register=register failure");
            echo "insert data failed";
        }
    }
    else{
        header("location:user-login-page.php?register=please type a valid connection id");
        }
    
}


//for update

if(isset($_POST["update"])){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $mobile_number=$_POST['mobile_number'];
    $current_password=$_POST['current_password'];
    $new_password=$_POST['new_password'];
    $def_password=$_SESSION["password"];
    $def_connection_id=$_SESSION["username"];
    $typeof_Bill=$_SESSION["typeof_bill"];


    if($new_password==""){
        $new_password=$def_password;
    }



    // echo $name,$address,$mobile_number,$current_password,$new_password,$def_connection_id;
    if($current_password==$def_password){
    
    if($typeof_Bill=="WATER"){
    $sql_2="SELECT connection_id from customer_details where connection_id='$def_connection_id'";}

        elseif($typeof_Bill=="ELECTRICTY") {
        $sql_2="SELECT connection_id from customer_details_electricty where connection_id='$def_connection_id'";

        }
    $result=$con->query($sql_2);
    if($result->num_rows>=1){

        if($typeof_Bill=="WATER"){
            $sql="UPDATE `customer_details` SET `password`='$new_password',`name`='$name',`address`='$address',`mobile_number`='$mobile_number' WHERE connection_id='$def_connection_id'";
        }
        
        elseif($typeof_Bill=="ELECTRICTY") {
            $sql="UPDATE `customer_details_electricty` SET `password`='$new_password',`name`='$name',`address`='$address',`mobile_number`='$mobile_number' WHERE connection_id='$def_connection_id'";
        }
    
        if($con->query($sql)){
            if($new_password!=$def_password){
                header("location:login.php?logout=please login again");

            }
            else{
                header("location:payment-page.php?update_info=Successful Update please check");
                echo "Data Stored Successfully";
            }
    

        }
         else{
            header("location:payment-page.php?update_info=Update failure");
            echo "insert data failed";
        }
    }
    else{
        // not possible
        //no such connection id 
        }
    }
    else{
        //current password doesn't match
         header("location:payment-page.php?update_info=Current password is wrong");

        echo "wrong current password";
    }
    
}



?>