<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="sttyle.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $Role = stripslashes($_REQUEST['Role']);
      
        // Check user is exist in the database
        
        $query    = "SELECT * FROM `users` WHERE username='$username' AND Role='$Role'
                     AND password='" . md5($password) . "'" ;
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
         if ($rows == 1) {
            switch ($Role) {
                case 'Admin':
                    header("Location:Admin.php");
                    break;
                    
                case 'User':
                    header("Location:cusproductview.php");
                        break;
                
               
            }}
    else {
                echo "<div class='form'>
                      <h3>Incorrect Username/password.</h3><br/>
                      <p class='link'>Click here to <a href='lig.php'>Login</a> again.</p>
                      </div>";
            }
         } else {
?>
    <form class="form" method="post" name="login">
        
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <label >Role</label>
 
            <select name="Role" class="txt">
            <option>---Select Role--</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
            </select>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
       
        <p class="link"><a href="reg.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>