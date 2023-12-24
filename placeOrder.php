<?php

if(isset($_POST)){
    $connection = mysqli_connect('localhost','root','','myshop');
    $reqData = file_get_contents("php://input");
    $orderData = json_decode($reqData);

    $orderId=date("YmdHis");

    foreach($orderData as $temp){
        $id=$temp->id;
        $name=$temp->name;
        $price=$temp->price;
        $qty=$temp->quantity;
        $sql = "INSERT INTO `orderdetails` VALUES ('{$orderId}','{$id}','{$name}','{$qty}','{$price}')";
        $stn = mysqli_query($connection,$sql);
    }
    echo "Order Added";
}