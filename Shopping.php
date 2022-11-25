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
///.......... shortenedf