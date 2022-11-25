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
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['Productname'])) {
        // removes backslashes
        $Productname = stripslashes($_REQUEST['Productname']);
        //escapes special characters in a string
        $Productname = mysqli_real_escape_string($con, $Productname);

        $Price = stripslashes($_REQUEST['Price']);
        //escapes special characters in a string
        $Price = mysqli_real_escape_string($con, $Price);

        $Quantity  = stripslashes($_REQUEST['Quantity']);
        $Quantity    = mysqli_real_escape_string($con, $Quantity);

        
        $query    = "INSERT into `products` (productname ,Price,Quantity)
                     VALUES ('$Productname','$Price', '$Quantity')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Product addedd successfully.</h3><br/>
                  <p class='link'>Click here to  View <a href='Ap.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Failed Adding Products </h3><br/>
                  <p class='link'>Click here to Try again<a href='AdN.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
     
     <body class="bdy">
        <div class="n">
        
       </div> 
       <div>
    <form class="Ln" action="" method="post">
    <h1 class="login-title">Registration</h1>
         
         <input type="text" class="txt" name="Productname" placeholder="Enter product name" required /><br>
         <input type="text" class="txt" name="Price" placeholder="Enter Price" required /> <br>
         <input type="text" class="txt" name="Quantity" placeholder="Enter Quantity" required /> <br>
         <input type="submit" name="submit" value="Add Products" class="btn">
    </form>
    </div>
    
    

<?php
    }
?>
</body>
</html>