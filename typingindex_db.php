<?php
      session_start();
      include('db.php');
      /*if($_SERVER['REQUEST_METHOD']=="POST")
      {
        $timer = $_POST['timer'];
        $mistakes = $_POST['mistakes'];
      }
      if(!empty($mistakes)  && !empty($time) && !is_numeric($mistakes))
      {
        echo "IF EXECUTD";*/
        $timer = $_POST['timer'];
        $mistakes = $_POST['mistakes'];
        echo $timer+""+$mistakes;
        $query = "INSERT INTO typingspeed (mistakes,timer) VALUES('$mistakes' , '$timer')";
              
        mysqli_query($con,$query);
              
      //}
     // echo "Not exectued";
  
?>