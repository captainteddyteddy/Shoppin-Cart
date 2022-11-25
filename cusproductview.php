<?php 

session_start();

//var_dump($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>
<table class="table">
             <thead>
             <tr>
             <th>Product Name</th>
             <th>Price</th>
          
           </tr>
             </thead>
             
   
         <tbody>
         <?php
///........... shortenedforbrevity.............
$product_id = empty($_GET['id']) ? "" : $_GET['id']; //the product id from theURL
$action = empty($_GET['action']) ? "" : $_GET['action']; //the action from theURL
if(!isset($_SESSION['cart']))
$_SESSION['cart'] =array();
//if there is an product_id and that product_id doesn't exist display an errormessage
if($product_id && !productExists($product_id, $DBH, $products)){
die("Error. Product Doesn'tExist");
}
switch($action) { //decide what todo
case"add":
if(!isset($_SESSION['cart'][$product_id]))
$_SESSION['cart'][$product_id] =0;
$_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id$product_id
break;
case "remove": //remove one from the quantity of the product with id$product_id
$_SESSION['cart'][$product_id]--;
//if the quantity is zero, remove it completely (using the 'unset' function)-
//otherwise is will show zero, then -1, -2 etc when the user keeps removingitems.
if($_SESSION['cart'][$product_id] ==0)
unset($_SESSION['cart'][$product_id]); break;
case"empty":
unset($_SESSION['cart']); //unset the whole cart, i.e. empty thecart.
break;
}
///.......... shortenedforbrevity.............
?>
       
       <?php    
             include "db.php";
             $sql = "SELECT * FROM  products";
             $result=$con->query($sql);
              if(!$result){
               die("invalid".$con->error);
              }
     
        while($row=$result->fetch_assoc()){
        echo "
              <td>"
               .$row["Productname"]."
              </td>
              <td>"
                 .$row["Price"]."
               </td>
               <td>
               <a href=cart.php?action=add&id=",$row["id"],">AddToCart</a>
               </td>
               <td>
               <a href=cart.php?action=remove&id=",$row["id"],">Remove</a>
               </td>
              
               
        
            
          </tr>
         
         ";
        }
        /*
        class Ins{
          public $productname; public $Price;
          public $Quantity;
               function __construct ($pname,$Prc,$Qty){
              $this->productname=$pname;$this->$Price=$Prc; $this->$Quantity=$Qty;
          
          
               }/*
        $query    = "INSERT into `cart` ( Productname ,Price)
        VALUES ('$Productame','$Price')";
           $result   = mysqli_query($con, $query);
           $cathy = new person('Cathy','9 Dark and Twisty','Cardiff'); # here's the funpart
$STH = $DBH->prepare("INSERT INTO folks (name, addr, city) value (:name, :addr,:city)");
# By casting the object to an array in the execute, the properties are treated as arraykeys
$STH->execute((array)$cathy);
?>*/
     ?>

    </tbody>
</table>
          


     
   
</body>
</html>