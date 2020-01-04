
<?php include "db.php";

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home page design</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="bp/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-1.12.4.js"></script>
	<script src="js/jquery-ui.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            //Reference http://www.jssor.com/development/slider-with-slideshow-jquery.html
            //Reference http://www.jssor.com/development/tool-slideshow-transition-viewer.html

            var _SlideshowTransitions = [
            //Fade in R
            {$Duration: 1200, x: -0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out L
            , { $Duration: 1200, x: 0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            ];

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0,                                   //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 10                                    //[Optional] Vertical space between each item in pixel, default value is 0
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                                //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $ActionMode: 0,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $DisableDrag: true                              //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_sliderb = new $JssorSlider$("sliderb_container", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_sliderb.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_sliderb.$ScaleWidth(Math.min(parentWidth, 1400));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
	<style>
table, td, tr {
  border-collapse: collapse;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
    <div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="logoimage">
                    <a href="" ><img src="img/logo.jpg"></a>

                </div>

            </div>     
            <div class="navbar-brand col-md-2" >
                <p>Womens Beauty Parlour Management System</p>

            </div>

    
            <div class="col-sm-6 col-xs-12">
                <ul class="soc-link">
                    <li><a href=index.php><i class="fa fa-home" aria-hidden="true"></i></a></li>
                   <!--  <li><a mailto="sharminsultanasonia21@gmail.com"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                    <li><a><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li> -->
                    <!-- <li><a><i class="fa fa-phone-square" aria-hidden="true"></i></a></li> -->
                    <li><a><i class="fa fa-commenting" aria-hidden="true"></i></a></li>
                    <?php 
                    if(!isset( $_SESSION['cusid']) ) {
                        ?>
                            <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>

                            <?php 
                            }
                            else { ?>
                                <li><a href="logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                                <?php
                            }
                        ?>
                    
                </ul>
                
            </div>
        </div>
    </div>
    </div>
    <div class="menu"> <style="brackground-color: black;">
        
    <div class="container">
        <div class="row">,<style="brackground-color: black">
            
            
                <ul class="navbar">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                    <li><a href="beautician.php">BEAUTICIANS</a></li>
                    <li><a href="offer.php">OFFER</a></li>
                    <!-- <li><a href="#">GALLERY</a></li> -->
                    <!-- <li><a href="blog.php">BLOG</a></li> -->
                    <li><a href="Contact.php">CONTACT US</a></li>
                     
					 <?php 
					 if ((isset($_SESSION['cusid']) or !isset($_SESSION['cusid'])) and (!isset($_SESSION['adminId']) and !isset($_SESSION['beauty_id'])) ) {?>
                      <div class="dropdown">
                            <button class="dropbtn">Reservation
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="appointment.php">Appointment</a>
                              <a href="home_appointment.php">Home Appointment</a>
                            </div>
                          </div>
						  
						 

					<?php 
					}
					if(isset($_SESSION['cusid'])) 

						
						{
							?>
                            <div class="dropdown">
                            <button class="dropbtn"><?php echo $_SESSION['cusname'] ?>  
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="profile.php">Profile</a>
                              <a href="appointment_view.php">Your Appointments</a>
                              <a href="logout.php">Logout</a>
                            </div>
                          </div> 
							
							
							<?php
						}
						
						if(isset($_SESSION['beauty_id'])) 

						
						{
							?>
                            <div class="dropdown">
                            <button class="dropbtn"><?php echo $_SESSION['beauty_name']; ?>  
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="schedule.php">Today Schedule</a>
                              <a href="schedule_tomorrow.php">Tomorrow Schedule</a>
                              <a href="logout.php">Logout</a>
                            </div>
                          </div> 
							
							
							<?php
						}
						
						if(isset($_SESSION['adminId'])) 

						
						{
							?>
                            <div class="dropdown">
                            <button class="dropbtn"><?php echo $_SESSION['adminName']; ?>  
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="admin/index.php">Admin Panel</a>
                              <a href="logout.php">Logout</a>
                            </div>
                          </div> 
							
							
							<?php
						}
					?>
					
					<?php 
					if(!isset($_SESSION['cusid']) and !isset($_SESSION['beauty_id']) and !isset($_SESSION['adminId'] ) )

						
						{
							?>
							
							<div class="dropdown">
                            <button class="dropbtn">Sign in/ up 
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="Login.php">Customer Login</a>
				<a href="beauty_Login.php">Beautician Login</a>
				<a href="admin_Login.php">Admin Login</a>
                              <a href="register.php">Registration</a>
                            </div>
                          </div> 

							
							<?php
						}
					?>
                    



                </ul>
            </div>
            </div>
        </div>
