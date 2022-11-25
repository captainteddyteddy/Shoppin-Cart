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

<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);

        $ID = stripslashes($_REQUEST['ID']);
        //escapes special characters in a string
        $ID = mysqli_real_escape_string($con, $ID);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);

        $Role = stripslashes($_REQUEST['Role']);
        $Role = mysqli_real_escape_string($con, $Role);
        
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $query    = "INSERT into `users` (username ,password,ID,email,Role)
                     VALUES ('$username', '" . md5($password) . "','$ID', '$email','$Role')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='lig.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
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
         
         <input type="text" class="txt" name="username" placeholder="choose username" required /><br>
         <input type="text" class="txt" name="ID" placeholder="Enter ID NO" required /> <br>
         <input type="text" class="txt" name="TelNo" placeholder="Enter Phone NO" required /> <br>
         
        <input type="text" class="txt" name="email" placeholder="Email Adress"required><br/>
     <label >Role</label><br/>
 
                <select name="Role" class="txt"required>
                <tion>---Select Role--</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
               
                </select><br/>

        <input type="password" class="txt" name="password" placeholder="Password"><br/>
        <input type="password" class="txt" name="password" placeholder="Password"><br/>
        <input type="submit" name="submit" value="Register" class="btn">
        <p class="link"><a href="lig.php">Click to Login</a></p>
    </form>
    </div>
    
    

<?php
    }
?>
</body>
</html>