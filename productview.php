<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Shopping Cart
    </title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="sttyle.css"/>
    <script defer src="script.js"></script>
    
</head>
<nav>
    <a href="AdN.php">Add New Project</a>
    <a href="productview.php">View All Products</a>
    <a href="productview.php">Log Out</a>
</nav>
<table class="table">
             <thead>
             <tr>
             <th>Product Name</th>
             <th>Price</th>
             <th>Quantity-Remaining</th>
             
           </tr>
             </thead>
             
   
         <tbody>
          
       
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
               <td>"
             . $row["Quantity"]."
               </td>
          </tr>
          
     
         ";
        }
     
     ?>

    </tbody>
</table>
          


     
   
</body>
</html>