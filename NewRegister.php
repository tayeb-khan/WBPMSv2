<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP LOGIN SYSTEM</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">PHP LOGIN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Cntact us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<?php 
     include "config.php";
     
     if(isset($_POST["reg"])){
       
       $username = $_POST["name"];
       $email = $_POST["email"];
       $address = $_POST["address"];
       $password = $_POST["pass"];
       
       
       $tmsql = "select * from users where username = '$username' AND password = '$password' ";
                      $tre1 = mysqli_query($con,$tmsql);
                      $number1 = mysqli_num_rows($tre1);
                  
                  if( $number1 > 0)
                  {
                    echo "
                              <center> <div class='alert alert-success'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <b style='color:red;'>Registration with username ".$username." and password".$password." already exist.</b>
                              </div></center>
                            ";
                            ?>
                            
                            <script type="text/javascript">
                              <!--
                              function Redirect() {
                              window.location="registration.php";
                              }
                              
                              setTimeout('Redirect()', 2000);
                              //-->
                              </script>
                            
                            
                            <?php
                  }
                  else{
                    
                    $sql = "INSERT INTO `users`
                          (`username`, `email`, `address`, `password`) 
                          VALUES ('$username','$email','$address','$password')";
                          if (mysqli_query($con,$sql)) {
                            echo "
                              <center> <div class='alert alert-success'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <b style='color:green;'>Registration is successfull!</b>
                              </div></center>
                            ";
                          }
                    
                  }
       
        
                            
                            
       
       
     }
     
     
     ?>

  
<link rel="stylesheet" type="text/css" href="login.css">

        <div class="container">
           
            <header>
                <h1>Login and Registration Form</h1>
        
            </header>
            <section>       
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
                  <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
                  <label for="loginkeeping">Keep me logged in</label>
                </p>
                                <p class="login button"> 
                                   <a href="http://cookingfoodsworld.blogspot.in/" target="_blank" ></a>
                </p>
                                <p class="change_link">
                  Not a member yet ?
                  <a href="#toregister" class="to_register">Join us</a>
                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" >Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail"  > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" >Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" >Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
                  <input type="submit" value="Sign up"/> 
                </p>
                                <p class="change_link">  
                  Already a member ?
                  <a href="#tologin" class="to_register"> Go and log in </a>
                </p>
                            </form>
                        </div>
            
                    </div>
                </div>  
            </section>
        </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>