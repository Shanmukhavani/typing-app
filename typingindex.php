<?php
      //echo "executed
      
      session_start();
      include('db.php');
      //include('login.php');
      if (isset($_SESSION['user_id'])) {
        // Retrieve the user_id from the session
        $user_id = $_SESSION['user_id'];
        //$username = $_SESSION['username'];


          if($_SERVER['REQUEST_METHOD']=="POST")
          {
            $timer = $_POST['timer'];
            $mistakes = $_POST['mistakes'];
            //$user_id = $_POST['user-id'];
          // $user_id = $_SESSION['user_id'];
            $query = "INSERT INTO typingspeed (mistakes,timer,user_id) VALUES('$mistakes' , '$timer' , '$user_id')";
                  
            //mysqli_query($con,$query);
            $result = mysqli_query($con, $query);
            if ($result) {
              // Data inserted successfully
              
              echo "Data inserted successfully.";
          } else {
              // Handle any database errors
              echo "Error: " . mysqli_error($con);
          }

          }
        }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles.css">
  <script src="script.js" defer></script>
  <title>Speed Typing</title>
</head>
<body>
  
    <div class="timer" id="timer"  name="timer">00:00
      

    </div>
    
    <div class="container">
      
      <div class="quote-display" id="quoteDisplay"></div>
      <div class="mistakes" id="mistakes" name="mistakes" value="0">Mistakes: 0</div>
      <textarea id="quoteInput" class="quote-input" disabled></textarea>
      <button type="button" class="button" id="button" onclick="enableTextarea();startTimer()">Start</button>
      <button type="submit" class="submit" onclick="handleFormSubmission()" >submit</button>
    </div>
    
</body>
</html>
