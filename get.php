
<?php

    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['FirstName'])) {
        // removes backslashes
        $FirstName = stripslashes($_REQUEST['FirstName']);
        //escapes special characters in a string
        $FirstName = mysqli_real_escape_string($con, $FirstName);

        $LastName = stripslashes($_REQUEST['LastName']);
        //escapes special characters in a string
        $LastName = mysqli_real_escape_string($con, $LastName);

        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);

        $ID = stripslashes($_REQUEST['ID']);
        //escapes special characters in a string
        $ID = mysqli_real_escape_string($con, $ID);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);

        $TelNo   = stripslashes($_REQUEST['TelNo']);
        $TelNo    = mysqli_real_escape_string($con, $TelNo);

        $Country = stripslashes($_REQUEST['Country']);
        $Country = mysqli_real_escape_string($con, $Country);
        
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `customers` (Firstname,Lastname,username ,password,ID,email, create_datetime,Country,TelNo)
                     VALUES ('$FirstName','$LastName','$username', '" . md5($password) . "','$ID', '$email', '$create_datetime','$Country','$TelNo')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } 
?>
     
    