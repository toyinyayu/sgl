<?php require_once('connections/biggames.php'); ?>
<?php 
session_start();

$inactive = 600; // Set timeout period in seconds

if (isset($_SESSION['timeout'])) {
    $session_life = time() - $_SESSION['timeout'];
    if ($session_life > $inactive) {
        session_destroy();
        header("Location: index.php");
    }
}
$_SESSION['timeout'] = time();

$conn    = Connect();
if (isset($_POST['reg_email'])) {
 
 $reg_email = strip_tags($_POST['reg_email']);
 $reg_pass1 = strip_tags($_POST['reg_pass1']);
 
 //declare two session variables and assign them
        
  

 
 $query = $conn->query("SELECT id, reg_email, reg_pass FROM bigreg WHERE reg_email='$reg_email' AND reg_pass = '".md5($reg_pass1)."' AND com_code ='active'");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; // if email/password are correct returns must be 1 row
 
 if ($count==1) {
  $_SESSION['userSession'] = $row['reg_email'];
  header("Location: index.php");
 } else {
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    </div>";
 }
 $conn->close();
}
?>


<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Big Games</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="static/css/style.css">

        <!-- Font-Awesome -->
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
        <link rel="font" type="text/css" href="font-awesome/fonts/fontawesome-webfont.woff">

        <!-- Owl Carousel -->
        <link rel="stylesheet" type="text/css" href="static/css/owl.carousel.min.css">
	    <link rel="stylesheet" type="text/css" href="static/css/owl.theme.default.min.css">

	    <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

       <!-- Start -->
       	<section class="root">
       		<nav class="navbar navbar-default other-nav">
	            <div class="container-fluid">
		            <div class="row">
		            	
		                <div class="navbar-header">
		                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						    </button>
		                </div>
		                <div id="navbar" class="navbar-collapse collapse no-padding">
		                    <div class="col-md-2 small-logo">
		                        <a href="index.html"><img src="static/img/bigg.png" class="mlogo" /></a>
		                    </div>
		                    <div class="col-md-4"></div>
		                    <div class="pull-right scart">
		                        <ul class="nav navbar-nav navbar-adjust top-nav">
		                            <!-- <li class="active"><a href="#/">Home<span class="sr-only">(current)</span></a></li> -->
		                            <li class="stake-cart"><a href="#">
		                            	<img src="static/img/red-shopping-cart.png" alt="">
		                            	STAKE
		                        	</a></li>
		                            <li class="reg-top-btn"><a href="#">Register</a></li>
		                            <li class="login-top-btn"><a href="#">Log In</a></li>
		                        </ul>
		                    </div>

		                    <div class="col-md-12 nav-below">
			                	<ul class="nav navbar-nav navbar-adjust">
			                	    <li><a href="index.php">Home</a></li>
			                	    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Lotteries <span class="caret"></span></a>
			                	    	<ul class="dropdown-menu dropdown-below">
			                	    	    <li><a href="#">lotteries</a></li>
			                	    	    <li><a href="#">All</a></li>
			                	    	    <li><a href="#">Wind</a></li>
			                	    	</ul>
			                	    </li>
			                	    <li><a href="#">Promotions</a></li>
			                	    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Result <span class="caret"></span></a>
			                	    	<ul class="dropdown-menu dropdown-below">
			                	    	    <li><a href="#">Promotions</a></li>
			                	    	    <li><a href="#">Promotions</a></li>
			                	    	    <li><a href="#">Promotions</a></li>
			                	    	</ul>
			                	    </li>
			                	</ul>
			                </div>
		                </div>
		                <!--/.nav-collapse -->
		            </div>
	            </div>
	            <!--/.container-fluid -->
	        </nav>

	        <section class="user-login user-modal single-login">
	        	<div class="container">
	        		<div class="row">

	        			<div class="login-card single-login-card" style="position: relative;">
	        				<div class="card-logo">
		        				<img src="static/img/bigg.png" alt="">
		        			</div>
	        				<div class="login-logo">
	        					<img src="" alt="">
	        				</div>
	        				<form action="" name="" method="post">
	        				<?php echo $msg;?>
	        				<div class="form-group input-form">
	        					<i class="fa fa-user input-icon"></i>
	        					<input type="text" class="form-control" placeholder="Your Email Address" name="reg_email">
	        				</div>
	        				<div class="form-group input-form">
	        					<i class="fa fa-lock input-icon"></i>
	        					<input type="text" class="form-control" placeholder="Password" name="reg_pass1">
	        				</div>
	        				<div class="form-group">
	        					<input type="checkbox" name="">
	        					<label>Keep Me Signed In</label>
	        				</div>
	        				<div class="btns">
	        					<div class="btn-left btns-btn">
	        						<input type="submit" name="submit" class="btn btn-primary" value="Login">
	        					</div>
	        					<div class="btn-right btns-btn">
	        						<p><i class="fa fa-facebook-square fa-lg"></i> Facebook Login</p>
	        					</div>
	        				</div>
	        				<div class="login-signup">
	        					<p>New to Our Platform? <span><a href="signup.php">Sign Up Here</a></span></p>
	        				</div>
	        			</form>
	        			</div>
	        		</div>
	        	</div>
	        </section>

	        <section class="bottom-below section-area">
	        	<div class="container">
	        		<div class="row">
	        			<div class="col-md-4">
	        				<h2>Lotteries</h2>
	        				<ul>
	        				    <li><a href="#">5/90 Virtual Games</a></li>
	        				    <li><a href="#">6/49 MegaMillions Jackpot</a></li>
	        				    <li><a href="#">6/45 Megaillions Jackpot</a></li>
	        				</ul>
	        			</div>
	        			<div class="col-md-4">
	        				<h2>Promotions</h2>
	        				<ul>
	        				    <li><a href="#">5/90 Virtual Games</a></li>
	        				    <li><a href="#">6/49 MegaMillions Jackpot</a></li>
	        				    <li><a href="#">6/45 Megaillions Jackpot</a></li>
	        				</ul>
	        			</div>
	        			<div class="col-md-4">
	        				<h2>About Us</h2>
	        				<ul>
	        				    <li><a href="#">Help/FAQ</a></li>
	        				    <li><a href="#">Terms and Conditions</a></li>
	        				    <li><a href="#">Privacy Policy</a></li>
	        				    <li><a href="#">Contact Us</a></li>
	        				</ul>
	        			</div>
	        		</div>
	        	</div>
	        </section>

	        <footer class="section-area">
	        	<div class="telco-reach">
		        	<div class="pay-telco">
		        		<img src="static/img/mastercard.png" alt="">
		        		<img src="static/img/visa.png" alt="">
		        		<img src="static/img/logo.png" alt="">
		        		<img src="static/img/glo-logo.png" alt="">
		        	</div>
		        	<div class="reach-us">
		        		<p>You Can Reach Us Via:</p>
						<span>
			        		<a href=""><i class="fa fa-phone"></i></a>
			        		<a href=""><i class="fa fa-envelope"></i></a>
			        		<a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
			        		<a href="" class="link-circle"><i class="fa fa-twitter circle-social" aria-hidden="true"></i></a>
			        		<a href="" class="link-circle"><i class="fa fa-instagram circle-social" aria-hidden="true"></i></a>
						</span>
		        	</div>
	        	</div>
	        	<div class="name-link">
	        		<p>BIG GAMES</p>
	        		<ul>
	        		    <li>About Us</li>
	        		    <li>Terms of Use</li>
	        		    <li>Privacy Policy</li>
	        		    <li>Site Maps</li>
	        		    <li>Tell A Friend</li>
	        		    <li>RSS</li>
	        		</ul>
	        	</div>
	        	<div class="copy-disclaimer">
	        		<p>&copy; SuperiorGames 2017</p>
	        		<p><i class="footer-age">18</i> You must be 18years old and above to play or claim a prize</p>
	        	</div>
	        </footer>
       	</section>
        <script src="jquery/dist/jquery.min.js"></script>
        <script src="bootstrap/dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>

        <script>
	        $('.owl-carousel').owlCarousel({
	            loop:true,
	            margin:10,
	            nav:true,
	            responsive:{
	                0:{
	                    items:1
	                },
	                600:{
	                    items:3
	                },
	                1000:{
	                    items:6
	                }
	            }
	        })

	         $( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
			 $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');


			 $('.single-circle').click(function(){
			 	$('.stake-modal').css('display', 'flex');
			 })

			 $('.close-x').click(function(){
			 	$('.stake-modal').css('display', 'none');
			 	$('.recorded-modal').css('display', 'none');
			 })

			 $('.s2d').click(function(){
			 	$('.stake-modal').css('display', 'none');
			 	$('.recorded-modal').css('display', 'flex');
			 })

			 // Open side menu on mobile
        	$('.logo-burger').click(function(){
        		$('.sidemenu').css('width', '100%');
        		$('.menu-inside').css('transform', 'translatex(0px)')
        		$('.close-menu').css('display', 'flex')
        	})

        	// close side menu
        	$('.close-menu').click(function(){
        		$('.menu-inside').css('transform', 'translatex(200px)')
        		$('.sidemenu').css('width', '0%');
        		$('.close-menu').css('display', 'none')
        	})
	    </script>
    </body>
</html>