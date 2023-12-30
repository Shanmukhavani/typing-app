<?php
    session_start();
    include("db.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
          // Check if either the email or username already exists in the database
        $check_query = "SELECT * FROM form WHERE email = '$email' OR username = '$username'";
        $result = mysqli_query($con, $check_query);
         if (mysqli_num_rows($result) > 0) {
        // Either email or username already exists, display an error message
            echo "<script type='text/javascript'>alert('Account already exists with this email or username');</script>";
         }       
        elseif(!empty($username)  && !empty($password) && !is_numeric($username))
        {
            $query = "insert into form (fullname , email , username , password) values ('$fullname' , '$email','$username' , '$password')";
            mysqli_query($con,$query);
            echo "<script type= 'text/javascript'> alert('Successfully Registered')</script>";
           // $user_id="SELECT user_id FROM form WHERE email = '$email' OR username = '$username' ";
        }
        else
        {
            echo "<script type= 'text/javascript'> alert('Please Enter Valid Information')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title><link rel="stylesheet" href="reg.css">
</head>
<body>
    <div class="container">
            <h1 style="text-align: center;">SIGN UP</h1>
            <form method="POST">
                <label for="fullname">Fullname</label><br>
                <input type="text" id="fullname" class="input" name="fullname" required><br><br>
                <label for="email" >Email</label><br>
                <input type="email" id="email" class="input" name="email" required><br><br>
                <label for="username">Username</label><br>
                <input type="text" id="username" class="input" name="username" required><br><br>
                <label for="password">Password</label><br>
                <input type="password" id="password" class="input" name="password" required><br><br>
                <input type="checkbox" class="checkbox" required> I agree <a href=#>Terms&Conditions</a>
                <br>
                <p>Already have an account? <a href="login.php">Login</a> </p>
                <button type="submit" class="button" value="Submit">REGISTER</button>
        
            </form>
            
            
             
            
    </div>
    
</body>
</html>