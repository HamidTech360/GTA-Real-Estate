<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/sona/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 20:12:01 GMT -->
<head>
<meta charset="UTF-8">
<meta name="description" content="Sona Template">
<meta name="keywords" content="Sona, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Sona | Template</title>

<link href="https://fonts.googleapis.com/css?family=Lora:400,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&amp;display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="css/flaticon.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="css/nice-select.css" type="text/css">
<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="css/order.css" type="text/css">
<style>
    @media screen and (max-width:700px){
        .imgplaceholder{
            margin-left:70px;
            width:200px;
            height:150px;
        }
    }
</style>
</head>
<body>

<div id="preloder">
<div class="loader"></div>
</div>


<!-- MOBILE PHONE SIDE NAV -->
<div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="icon_close"></i>
    </div>


    <nav class="mainmenu mobile-menu">
    <ul>
        <li class="active"><a href="index-2.html">Home</a></li>
        <li><a href="index.html">Home</a></li>
        <li><a href="login.php">login</a></li>
        <li><a href="signup.php">sign Up</a></li>
        <li><a href="database.php">Data base</a></li>
        <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
</div>
<!-- MOBILE PHONE SIDE NAV TERMINAL -->

<header class="header-section header-normal">
<div class="top-nav">
<div class="container">
<div class="row">
<div class="col-lg-6">
 <ul class="tn-left">
<li> <h3>GTA</h3></li>
</ul>
</div>
<div class="col-lg-6">
<div class="tn-right">


<a href="#" class="bk-btn">Booking Now</a>

</div>
</div>
</div>
</div>
</div>
<div class="menu-item">
<div class="container">
<div class="row">
<div class="col-lg-2">

</div>
<div class="col-lg-10">
<div class="nav-menu">
<nav class="mainmenu mobile-menu">
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="login.php">login</a></li>
        <li><a href="signup.php">sign Up</a></li>
        <li><a href="database.php">Data base</a></li>
        <li><a href="#">Contact</a></li>
     </ul>
</nav>

</div>
</div>
</div>
</div>
</div>
</header>


<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <!-- IMAGE PLACEHOLDER -->
            <div class="col-lg-4">
                <div class="contact-text">
                    <img src="images/imgplaceholder.jpg" alt="" class="imgplaceholder" >
                    
                    <h6>click to select image</h6>
                </div>
            </div>
            <!-- IMAGE PLACEHOLDER TERMINAL-->

            <!-- FORM -->
            <div class="col-lg-7 offset-lg-1">
                <form method="post" class="contact-form" enctype="multipart/form-data">>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- hidden file input -->
                        <input type="file"  class="imgfileinput"  name="imgfileinput" style="display:none" required> <br>
                            <input type="text" placeholder="Permit code" id="permitcode" name="permitcode">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" placeholder="Post title" id="posttitle" name="posttitle">
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Write Something" id="posttext" name="posttext"></textarea>
                            <button type="submit" name="submit">Upload post</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- FORM TERMINAL -->
        </div>
    </div>
</section>
<?php
error_reporting(E_ERROR);
require 'connection.php';
//error_reporting(E_ALL & ~ E_NOTICE);

if(isset($_POST['submit'])){
    $img = $_FILES['imgfileinput']['name'];
    $permitcode = $_POST['permitcode'];
    $posttitle = $_POST['posttitle'];
    $posttext = $_POST['posttext'];

    echo $permitcode;
    echo $img;
   if($permitcode=='gta123'){
        $file_dir = 'imgUploads/'.$img;
        $imageFileType = pathinfo($file_dir, PATHINFO_EXTENSION);
        $validExtensions = array('jpg', 'jpeg', 'png');
        $uploadOk = 0;
         $date = date("d-m-y");


        if(!in_array(strtolower($imageFileType), $validExtensions)){
            $uploadOk=0;
            // echo $uploadOk;
        }else{
            $uploadOk=1;
            if(move_uploaded_file($_FILES['imgfileinput']['tmp_name'], $file_dir)){
                // echo 1;
                // echo 'image upload successful';
                $insert = "INSERT INTO post (title, posttext,image, date)VALUES('$posttitle', '$posttext', '$img', '$date')";
                $query = mysqli_query($connect, $insert);
                if($query){
                    echo "<script>
                    alert('Data posted Successfully')
                    </script>";
                }else{
                    echo 'fail to submit';
                    echo mysqli_error($connect);   
                }
            }else{
                echo "<script>
            alert('There is a problem with this image. Please choose another or try again')
            </script>";
                echo mysqli_error($connect);
            }
        }
        
  }else{
    echo "<script>
    alert('Enter the permit code')
    </script>";
  }
   
}

?>

<footer class="footer-section">
<div class="container">
<div class="footer-text">
<div class="row">
<div class="col-lg-4">
<div class="ft-about">
<div class="logo">
<a href="#">
<img src="img/footer-logo.png" alt="">
</a>
</div>
<p>We inspire and reach millions of travelers<br /> across 90 local websites</p>
<div class="fa-social">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-tripadvisor"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-youtube-play"></i></a>
</div>
</div>
</div>
<div class="col-lg-3 offset-lg-1">
<div class="ft-contact">
<h6>Contact Us</h6>
<ul>



</ul>
</div>
</div>
<div class="col-lg-3 offset-lg-1">
<div class="ft-newslatter">
<h6>New latest</h6>
<p>Get the latest updates and offers.</p>
<form action="#" class="fn-form">
<input type="text" placeholder="Email">
<button type="submit"><i class="fa fa-send"></i></button>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="copyright-option">
<div class="container">
<div class="row">
<div class="col-lg-7">
<ul>
<li><a href="#">Contact</a></li>
<li><a href="#">Terms of use</a></li>
<li><a href="#">Privacy</a></li>
<li><a href="#">Environmental Policy</a></li>
</ul>
</div>
<div class="col-lg-5">
<div class="co-text"><p>
Copyright &copy;<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
</p></div>
</div>
</div>
</div>
</div>
</footer>


<div class="search-model">
<div class="h-100 d-flex align-items-center justify-content-center">
<div class="search-close-switch"><i class="icon_close"></i></div>
<form class="search-model-form">
<input type="text" id="search-input" placeholder="Search here.....">
</form>
</div>
</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/order.js"></script>
<script>
$(document).ready(function(){
    $('.imgplaceholder').click(function(){
        document.querySelector('.imgfileinput').click()
    })

    document.querySelector('.imgfileinput').addEventListener('change',function(){
        var e = document.querySelector('.imgfileinput')
        if(e.files[0]){
            var reader = new FileReader()
            reader.onload = function(e){
                document.querySelector('.imgplaceholder').setAttribute('src', e.target.result)
            }
            reader.readAsDataURL(e.files[0])
        }
    })
    
})
</script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/sona/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 20:12:01 GMT -->
</html>