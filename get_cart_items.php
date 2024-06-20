<?php
session_start();
if(isset($_SESSION['cart'])&& !empty($_SESSION['cart'])){
    $cart_html='';
    foreach($_SESSION['cart'] as $item){
        $cart_html .='<div class="sp3">';
        $cart_html .='<div class="sp31"><img src="'.htmlspecialchars($item['image']).'"></div>';
        $cart_html .='<div class="sp32">';
        $cart_html .='<h2>Description:'.htmlspecialchars($item['description']).'</h2>';
        $cart_html .='<h2>Colour:'.htmlspecialchars($item['colour']).'</h2>';
        $cart_html .='<h2>Size:'.htmlspecialchars($item['size']).'</h2>';
        $cart_html .='<h3>Price:'.htmlspecialchars($item['price']).'</h3>';
        $cart_html .='<h3>Stock:'.htmlspecialchars($item['stock']).'</h3>';
        $cart_html .='</div>';
        $cart_html .='</div>';
    }
    echo $cart_html;
}
else{
    echo "<p>No items in cart</p>";
}
?>