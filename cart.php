<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <?php
     include 'user1.php';
    ?>
<header>
      
        <nav>
            <a href="home.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="#">Categories</a>
            <a href="#">Deals</a>
            <a href="new_arrivals.html">New Arrivals</a>
            <a href="#">Contact</a>
            <a href="#">About Us</a>
            <a href="cart.php">Cart</a>
            <a href="#">Account</a>
            <input type="search" class="search-bar"  placeholder="Search" /> 
             
            <div class="dropdown">
                <button><img src="image/user.png" height="30px" width="30px"></button>
                <div class="dropdown-content">
                   <?php
                    include 'user2.php';
                   ?>
                    <a href="#">Learn More</a>
                   
                </div>
            </div>
           

         <?php
         include 'user3.php';
         ?>
        </nav>
</header>
<div class="totalcart">
    <?php
    $priceuh=0.0;
     function calculateTotalPrice(){
        $total=0.0;
       foreach($_SESSION['cart'] as $item){
        $price=str_replace(',','',$item['price']);
        $total+=(float)$price;
       }
       return number_format($total,2);
     }
     if(isset($_SESSION['cart'])&&!empty($_SESSION['cart'])){
           $priceuh=calculateTotalPrice();
           echo'<h2>Total price to be paid:'.$priceuh.'</h2>';
     }
    ?>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="sp1" id="cartuh">

     <div class="sp2" id="cart-items">

     </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(function(){
            $.ajax({
                url:'get_cart_items.php',
                method:'POST',
                success:function(response){
                    $('#cart-items').html(response);
                }
            });
         });
    </script>
</body>
</html>
