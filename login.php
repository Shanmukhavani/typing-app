<?php
    session_start();
    include("db.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        $password = $_POST['password'];
        if(!empty($username)  && !empty($password) && !is_numeric($username))
        {
            $query = "select * from form where username='$username' limit 1";
            $result=mysqli_query($con,$query);

            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data ['password']== $password)
                    {
                        // Retrieve the user_id
                        $user_id = $user_data['user_id'];

                        // Store the user_id in a session variable
                        $_SESSION['user_id'] = $user_id;
                                            
                       
                        header("Location: typingindex.php"); // Replace "dashboard.php" with the actual URL you want to redirect to
                        exit;  
                    
                     }
                 }
            
                 echo "<script type= 'text/javascript'> alert('Wrong Username or Password')</script>";
            }
            else{
                 echo "<script type= 'text/javascript'> alert('Wrong Username or Password')</script>";
            }
        }
    }    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
   <div class="container">
    <h1>LOGIN</h1>
    <form method="POST">
        <label for="username">Username</label><br>
        <input type="text" id="username" class="input" name="username" required><br><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" class="input" name="password" required><br><br>
        <p>Not have an account? <a href="registration.php">Register</a> </p>
        <button type="submit" class="button" >LOGIN</button>
    </form>



    
           
   </div>
</body>
</html>