<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    input{
        font-size:14px;
    }
    @media screen and (max-width:700px)
    { input{
        font-size:10px;
    }}
    </style>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="firstname" id="name" placeholder="First Name"/>
                            </div>
                            <div class="form-group">
                                <label for="lastname"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="lastname" id="lastname" placeholder="Last Name"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Set Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="email" name="email" id="re_pass" placeholder="Email Address"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="state" id="state" placeholder="State"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="Pnumber" id="Pnumber" placeholder="Phone Number"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term" style="font-size:12px">I agree to all statements in  <a href="#" class="term-service" style="font-size:12px">Terms of service</a></label>
                                <a href="login.php" class="signup-image-link" style="font-size:11px; text-decoration:underline">I am already member</a>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                               
                            </div>
                        </form>
                       
                    </div>
                    <div class="signup-image hide">
                        <figure><img src="images/img_1.jpg" alt="sing up image"></figure>
                        
                    </div>
                </div>
               
            </div>
        </section>

        

    </div>

    <?php
     require "connection.php";

     if(isset($_POST['signup'])){
         $firstname =$_POST['firstname'];
         $lastname =$_POST['lastname'];
         $password =$_POST['password'];
         $email =$_POST['email'];
         $date = date("d-m-y");
         $state = $_POST['state'];
         $number = $_POST['Pnumber'];


         

         
         if($firstname!=="" && $lastname!== "" && $password!=="" && $email!=="" &&$state!=="" && $number!==""){
            $select = "SELECT * FROM members WHERE email = '$email'";
            $query = mysqli_query($connect, $select);
            if(mysqli_num_rows($query) == 0){
                

                $insert = "INSERT INTO members(firstname, lastname, email, password, date, states, number)VALUES('$firstname', '$lastname', '$email', '$password', '$date', '$state', '$number')";
                $query = mysqli_query($connect, $insert);
                if($query){
                    echo "<script>alert('You have been successfully registered')</script>";
                    $_SESSION['email'] = $email;
                     header('location:dashboard.php');
                }else{
                    echo mysqli_error($connect);
                }
            }else{
                
              echo "<script>alert('Email has been chosen')</script>";
            }
           
         }else{
            echo "<script>alert('Input fields should not be empty')</script>";
         }
        
         
     }
    
    
    
    
    
    
    
    ?>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>