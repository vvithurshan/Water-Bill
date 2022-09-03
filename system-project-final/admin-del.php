<?php

$con=new mysqli("localhost","root","","project_final");

if($con->connect_error){
echo $con->connect_error;
die("sorry connection error");
}
else{
//  echo "database connected";
}

if(isset($_GET["edit"])){
    $edit=$_GET["edit"];
    echo $edit;
    $result=$con->query("SELECT * FROM customer_details where id='$edit'") or die($mysqli->error); 

    $row=$result->fetch_assoc();

    $name=$row['name'];
    $address=$row['address'];
    $mobile=$row['mobile_number'];

    echo $name,$address,$mobile;
}

if(isset($_GET["delete"])){
    $del=$_GET["delete"];
    echo $del;

    $result=$con->query("DELETE FROM customer_details where id=$del") or die($mysqli->error); 

    header("location:admin-main-page.php?delete=Recored is deleted");
}
?>