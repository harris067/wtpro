<?php
//For retrieving and displaying from database
$conn=new mysqli('localhost','root','','login');
if($conn->connect_error){
    die('Connection Failed'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("SELECT phoneid,description,deal,delivery,installation,image FROM phones");
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        $phones=array();
        $stmt->bind_result($phoneid,$description,$deal,$delivery,$installation,$image);
        while($stmt->fetch()){
            $phones[]=array('phoneid'=>$phoneid,
                            'description'=>$description,
                             'deal'=>$deal,
                              'delivery'=>$delivery,
                               'installation'=>$installation,
                               'image'=>$image); 
        }
         $shophtml='';
        foreach($phones as $phone){
            $shophtml .='<div class="shop3">';
            $shophtml .='<div class="shop31"><img src="'.$phone['image'].'"></div>';
            $shophtml .='<div class="shop32">';
            $shophtml .='<h2>'.$phone['description'].'</h2>';
            $shophtml .='<h2>'.$phone['deal'].'</h2>';
            $shophtml .='<h3>'.$phone['delivery'].'</h3>';
            $shophtml .='<h3>'.$phone['installation'].'</h3>';
            $shophtml .='<div class="shopb">';
            $shophtml .='<button class="add-to-cart" data-id="'.$phone['phoneid'].'">Add to Cart</button>';
            $shophtml .='<button class="ibutton">Tech Specs</button>';
            $shophtml .='</div>';
            $shophtml .='</div>';
            $shophtml .='</div>';
        }
        echo $shophtml;
    }

}
?>