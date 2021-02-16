<?php
 include "includes/db.php";
if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
  
    if(strlen($password)< 8){
      echo "<script>alert('Password length should not be less than 8');</script>";
    }
    else{

      $query = "SELECT * from `user`  WHERE email ='$email' and password = '$password'";
      $result= mysqli_query($conn,$query);
     
      if ($result) 
        { 
            
            $row = mysqli_num_rows($result); 
              
              if ($row > 0) 
                  { 
                    
                    // echo "<script> alert('Login Success'); </script>";
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['username'] = $email;
                    echo "<script>
                    alert('Login Success');
                    window.location.href='./dashboard.php';
                    </script>";
                    // var_dump($_SESSION['login_user']);

                  }        // close the result. 
                  else{
                    echo "<script> alert('Invalid Username or Password, Please try again.'); </script>";
                  }
            mysqli_free_result($result); 
        } 
    }
  }
// else {
//     // echo "<script> alert('You have already logged in as'".$_SESSION['login_user'].");</script>"; 
//     // header('Location: ./dashboard.php');
    
//     // echo "<script> alert('You have already logged in as').{$_SESSION['login_user']}</script>"; 
// }
    // Connection close  
    mysqli_close($conn); 
?> 



<!DOCTYPE html>
 <html>
 <head>
  <title>Index</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 </head>
 <body>

  <div class="col-md-4" style="position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background:#dedede;
    border-radius:15px;padding:15px" >

     <form action="index.php" method="POST"  name="loginForm">
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" id="email" name="email" required="required">
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" required="required" >
        </div>

        <button type="submit" class="btn btn-primary" value="login" name="login" >Login</button>

      </form> 
    </div>
 
 </body>
 </html>
 
