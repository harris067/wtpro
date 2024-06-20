<?php
session_start();
$conn=new mysqli('localhost','root','','login');
if($conn->connect_error){
    die('Connection error'.$conn->connect_error);
}
else{
if(isset($_POST['id'])){
    $itemid=$_POST['id'];
    $stmt= $conn->prepare("SELECT description,colour,size,price,stock,image FROM phones WHERE phoneid=?");
    $stmt->bind_param("i",$itemid);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        $stmt->bind_result($description,$colour,$size,$price,$stock,$image);
        $stmt->fetch();
        $_SESSION['cart'][]=array(
         'description'=>$description,
         'colour'=>$colour,
         'size'=>$size,
         'price'=>$price,
         'stock'=>$stock,
         'image'=>$image     
        );
        echo "Item added to cart successfully";
        $stmt->close();
    }
    else{
        echo "Unable to add item to cart";
    }
    $conn->close();
}
}
?>

