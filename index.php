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
    </head>
    <style>

    .navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}

</style>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

       <!-- Start -->
       	<section class="root">
       		<nav class="navbar navbar-default home-nav">
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
	                <?php require_once('connections/biggames.php'); 

	             $conn    = Connect();

$user_check=$_SESSION['userSession'];


$sql = mysqli_query($conn,"SELECT * FROM bigreg WHERE reg_email='$user_check' ");
 
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC) or die(mysqli_error());
 
$login_user=$row['reg_user'];
$login_user=$row['credit'];
$login_user=$row['reg_id'];
$login_user=$row['debit'];
$login_user=$row['reg_email'];




$conn->close();
?>
	                <div id="navbar" class="navbar-collapse collapse">
	                    <div class="col-md-2 small-logo">
	                        <a href="index.html"><img src="static/img/bigg.png" class="mlogo" /></a>
	                    </div>
	                    <div class="col-md-4">
	                        
	                    </div>
	                    <div class="pull-right scart">
	                        <ul class="nav navbar-nav navbar-adjust right-link">
	                            <!-- <li class="active"><a href="#/">Home<span class="sr-only">(current)</span></a></li> -->
	                            <li><a href="#">Home</a></li>
	                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Lotteries <span class="caret"></span></a>
	                            	<ul class="dropdown-menu">
	                            	    <li>5/90</li>
	                            	    <li>6/49<li>
	                            	    <li>6/45</li>
                
	                            	    <li></li>
	                            	</ul>
	                            </li>
	                            <li><a href="#">Promotions</a></li>
                                <li><a href="https://www.infogridbank3d.com/WebPayment/Products/SimpleCustomization_GLOBAL.WebPayment/Entry.aspx?pCode=BGL&cCode=BGL">Deposit</a></li>
	                             
                        <?php if(isset($_SESSION['userSession'])): ?>
                        <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong><?php echo $login_user=$row['reg_user'];?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span> 
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?php echo $full_name;?></strong></p>
                                        <p class="text-left small"><?php echo $_SESSION['userSession'];?></p>
                                        <p class="text-left">
                                            <a href="account.php" class="btn btn-primary btn-block btn-sm">My Account</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
                        </li>
                      
                        <?php else: ?>
                         <li class="top-reg-btn"><a href="#">Log In</a></li>
                         <?php endif; ?>
	                            <li><a href="#" class="top-login-btn">Register</a></li>
                               
	                            <li><a href="#"><img src="static/img/red-shopping-cart.png" alt=""></a></li>
	                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="static/img/nigeria.png" alt=""> <span class="caret"></span></a>
	                            	<ul class="dropdown-menu">
	                            	    <li></li>
	                            	    <li></li>
	                            	    <li></li>
	                            	    <li></li>
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


	        <section class="logo-burger">
	        	<div>
	        		<a href="index.html"><img src="static/img/bigg.png" class="mlogo" /></a>
	        	</div>
	        	<div>
	        		<p>&#9776;</p>
	        	</div>
	        </section>

	        <section class="sidemenu">
	        	<div class="close-menu">
	        		<p>X</p>
	        	</div>
	        	 <div class="menu-inside">
                    <ul class="nav navbar-nav navbar-adjust right-link">
                        <!-- <li class="active"><a href="#/">Home<span class="sr-only">(current)</span></a></li> -->
                        <li><a href="#">Home</a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Lotteries <span class="caret"></span></a>
                        	<ul class="dropdown-menu">
                        	    <li></li>
                        	    <li></li>
                        	    <li></li>
                        	    <li></li>
                        	</ul>
                        </li>
                        <li><a href="#">Promotions</a></li>
                         <li><a href="https://www.infogridbank3d.com/WebPayment/Products/SimpleCustomization_GLOBAL.WebPayment/Entry.aspx?pCode=BGL&cCode=BGL">Pay Now</a></li>
	                             
                        <?php if(isset($_SESSION['userSession'])): ?>
                        <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong><?php echo $login_user=$row['reg_user'];?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?php echo $full_name;?></strong></p>
                                        <p class="text-left small"><?php echo $_SESSION['userSession'];?></p>
                                        <p class="text-left">
                                            <a href="account.php" class="btn btn-primary btn-block btn-sm">My Account</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
                        </li>
                      
                        <?php else: ?>
                         <li class="top-reg-btn"><a href="#">Log In</a></li>
                         <?php endif; ?>
	                            <li><a href="#" class="top-login-btn">Register</a></li>
                               
                        <li><a href="#"><img src="static/img/red-shopping-cart.png" alt=""></a></li>
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="static/img/nigeria.png" alt=""> <span class="caret"></span></a>
                        	<ul class="dropdown-menu">
                        	    <li></li>
                        	    <li></li>
                        	    <li></li>
                        	    <li></li>
                        	</ul>
                        </li>
                    </ul>
                </div>
	        </section>

	        <section class="banner">
	        	<div class="container">
	        		<div class="row">
	        			<div class="col-md-12">
	        				<div class="inner-banner">
		        				<div class="banner-caption">
			        			<!----	<p>You could just be the lucky winner in the next Draw</p>-->
			        				<div class="banner-img">
				        				<!--<img src="static/img/5.png" alt="">
				        				<img src="static/img/balls.png" alt=""> -->
			        				</div>
			        				<!-- <h2>&#8358;500,000</h2> -->
		        				</div>
		        				<div class="cta-area">
		        					<div class="gen-btn cta-btn">
		        						<a href="#">
		        							<p>Play Now</p>
		        						</a>
		        					</div>
		        					<div class="count-timer">
		        						<p>Next Draw in</p>
		        						<h2><i class="fa fa-clock-o" aria-hidden="true"></i> 00:45:36</h2>
		        					</div>
		        				</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </section>

	        <section class="tickets section-area">
	        	<div class="container">
	        		<div class="row">
	        			<div class="col-md-4">
	        				<div class="tickets-card">
	        					<div class="card-header first-card-header">
	        						<p>5/90 Virtual Games</p>
	        						<img src="static/img/white-lottery-machine.png" alt="">
	        					</div>

	        					<div class="card-body">
	        						<div class="date-result">
	        							<p>Latest Lotto Results</p>
	        							<p>6th February</p>
	        						</div>
	        						<div class="result-machine">
	        							<div class="draw-result">
	        								<p>Draw Result</p>
	        								<div class="circle-number">
	        									 <?php require_once 'connections/biggames.php';
			 $conn = Connect ();
			 
			 
			 $today = date("YmdH");
			$query = mysqli_query($conn,"SELECT result, date, status, gamesid FROM winnings WHERE gamesid= '$today'");
$rows=mysqli_fetch_array($query,MYSQLI_ASSOC) or die(mysqli_error());
 
$result=$rows['result'];
     
        $myArray = explode(',',  $result);
        //heres your issue, declare select to start with

        foreach($myArray as $my_Array){
             //the out put from your explode loop array needs to go here
             echo '<span>'.$my_Array.'</span>';
        }
       
//close the while loop
			 
			 ?>
	        								
	        								</div>
	        							</div>
	        							<div class="machine-number">
	        								<p>Machine Number</p>
	        								<div class="circle-number">

	        								 <?php require_once 'connections/biggames.php';
             $conn = Connect ();
             
             
             $today = date("YmdH");
            $query = mysqli_query($conn,"SELECT machine_no, date, status, gamesid FROM winnings WHERE gamesid= '$today'");
$rows=mysqli_fetch_array($query,MYSQLI_ASSOC) or die(mysqli_error());
 
$machine_no=$rows['machine_no'];
     
        $myArray = explode(',',  $machine_no);
        //heres your issue, declare select to start with

        foreach($myArray as $my_Array){
             //the out put from your explode loop array needs to go here
             echo '<span>'.$my_Array.'</span>';
        }
       
//close the while loop
             
             ?>
	        								</div>
	        							</div>
	        						</div>
	        					</div>
	        					<div class="card-foot">
	        						<div class="check-number check-number-first gen-btn">
	        							<a href="five.php">
	        								<p>CHECK MY NUMBERS</p>
	        							</a>
	        						</div>
	        						<div class="next-play">
	        							<div class="play-now-timer">
	        								<p>NEXT DRAW</p>
	        								<p><i class="fa fa-clock-o" aria-hidden="true"></i> 00:56:03</p>
	        							</div>
	        							<div class="play-btn play-btn-first gen-btn">
	        								<a href="five.php">
	        									<p>PLAY NOW</p>
	        								</a>
	        							</div>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        			<div class="col-md-4">
	        				<div class="tickets-card">
	        					<div class="card-header second-card-header">
	        						<p>6/45 Virtual Games</p>
	        						<img src="static/img/white-lottery-machine.png" alt="">
	        					</div>
	        					<div class="card-body">
	        						<div class="date-result">
	        							<p>Latest Lotto Results</p>
	        							<p>30th Dec</p>
	        						</div>
	        						<div class="result-machine">
	        							<div class="draw-result">
	        								<p>Draw Result</p>
	        								<div class="circle-number">
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        								</div>
	        							</div>
	        							<div class="machine-number">
	        								<p>Mchine Number</p>
	        								<div class="circle-number">
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        								</div>
	        							</div>
	        						</div>
	        					</div>
	        					<div class="card-foot">
	        						<div class="check-number check-number-second gen-btn">
	        							<a href="sixfortyfive.php">
	        								<p>CHECK MY NUMBERS</p>
	        							</a>
	        						</div>
	        						<div class="next-play">
	        							<div class="play-now-timer">
	        								<p>NEXT DRAW</p>
	        								<p><i class="fa fa-clock-o" aria-hidden="true"></i> 00:56:03</p>
	        							</div>
	        							<div class="play-btn play-btn-second gen-btn">
	        								<a href="sixfortyfive.php">
	        									<p>PLAY NOW</p>
	        								</a>
	        							</div>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        			<div class="col-md-4">
	        				<div class="tickets-card">
	        					<div class="card-header third-card-hader">
	        						<p>6/49 Virtual Games</p>
	        						<img src="static/img/white-lottery-machine.png" alt="">
	        					</div>
	        					<div class="card-body">
	        						<div class="date-result">
	        							<p>Latest Lotto Results</p>
	        							<p>30th Dec</p>
	        						</div>
	        						<div class="result-machine">
	        							<div class="draw-result">
	        								<p>Draw Result</p>
	        								<div class="circle-number">
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        								</div>
	        							</div>
	        							<div class="machine-number">
	        								<p>Mchine Number</p>
	        								<div class="circle-number">
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        									<span>1</span>
	        								</div>
	        							</div>
	        						</div>
	        					</div>
	        					<div class="card-foot">
	        						<div class="check-number check-number-third gen-btn">
	        							<a href="five.php">
	        								<p>CHECK MY NUMBERS</p>
	        							</a>
	        						</div>
	        						<div class="next-play">
	        							<div class="play-now-timer">
	        								<p>NEXT DRAW</p>
	        								<p><i class="fa fa-clock-o" aria-hidden="true"></i> 00:56:03</p>
	        							</div>
	        							<div class="play-btn play-btn-third gen-btn">
	        								<a href="sixfortynine.php">
	        									<p>PLAY NOW</p>
	        								</a>
	        							</div>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </section>

	        <section class="reason-play section-area">
	        	<div class="container">
	        		<div class="row">
	        			<div class="col-md-6 left-side">
	        				<div class="reason-play-header">
	        					<img src="static/img/lagb.png" alt="">
	        					<h2>Why Play BigGames?</h2>
	        				</div>
	        				<div class="reason-play-body">
	        					<p>BigGames is the official lottery of <span>Lagos State Lottery Company.</span> The name connotes 'Living Big' and 'Changing Lives'.</p>
	        					<p>We aim at making gaming easy, fun and entertaining while still giving people the opportunity to improve their status or change their lives by winning any of our games.</p>
	        				</div>
	        				<div class="reason-play-points">
	        					<div class="single-reason-point">
	        						<img src="static/img/yellow-lottery-machine.png" alt="">
	        						<h2>You Choose</h2>
	        						<p>The game you want to play and numbers from any device you are using</p>
	        					</div>
	        					<div class="single-reason-point">
	        						<img src="static/img/yellow-transfer.png" alt="">
	        						<h2>We Provide</h2>
	        						<p>You with various bonus offers whether you win or loose</p>
	        					</div>
	        					<div class="single-reason-point">
	        						<img src="static/img/yellow-student.png" alt="">
	        						<h2>We Notify</h2>
	        						<p>You about your stake status winnings will be etransferred immmeditately</p>
	        					</div>
	        				</div>
	        			</div>
	        			<div class="col-md-6 np-padding">
	        				<div class="col-md-6 have-won">
	        					<h2>HAVE </br> YOU </br> WON?</h2>
	        					<p>Don't forget to check your raffle numbers</p>

	        					<div class="see-result-btn gen-btn">
	        						<a href="#">
	        							<p>SEE LATEST RESULTS</p>
	        						</a>
	        					</div>
	        				</div>
	        				<div class="col-md-6">
	        					<div class="lotto-number">
		        					<P>Enter your Lotto numbers:</P>
		        					<select>
		        						<option>5/90</option>
		        					</select>
	        					</div>
	        					<div class="enter-number">
	        						<div class="form-group enter-number-inner">
	        							<input type="text" name="">
	        							<input type="text" name="">
	        							<input type="text" name="">
	        							<input type="text" name="">
	        							<input type="text" name="">
	        							<input type="text" name="">
	        						</div>
	        					</div>
	        					<div class="peroid">
	        						<p>Checking Last:</p>
	        						<select>
	        							<option>7 days</option>
	        						</select>
	        					</div>
	        					<div class="peroid">
	        						<p>Which Draws?</p>
	        						<select>
	        							<option>Monday</option>
	        						</select>
	        					</div>
	        					<div class="check-btn gen-btn">
	        						<a href="#">
	        							<p>CHECK</p>
	        						</a>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </section>

	        <section class="invite section-area">
	        	<div class="container">
	        		<div class="row">
	        			<div class="col-md-4">
	        				<div class="owl-carousel owl-theme">
		        				<div class="bonus item">
		        					<p>GET UP TO</p>
		        					<h2>95%</h2>
		        					<p>BONUS ON YOUR FIRST RECHARGE</p>

		        					<div class="claim-bonus-btn gen-btn">
		        						<a href="#">
		        							<p>CLAIM YOUR BONUS</p>
		        						</a>
		        					</div>
		        				</div>
		        				<div class="bonus item">
		        					<p>GET UP TO</p>
		        					<h2>95%</h2>
		        					<p>BONUS ON YOUR FIRST RECHARGE</p>

		        					<div class="claim-bonus-btn gen-btn">
		        						<a href="#">
		        							<p>CLAIM YOUR BONUS</p>
		        						</a>
		        					</div>
		        				</div>
		        				<div class="bonus item">
		        					<p>GET UP TO</p>
		        					<h2>95%</h2>
		        					<p>BONUS ON YOUR FIRST RECHARGE</p>

		        					<div class="claim-bonus-btn gen-btn">
		        						<a href="#">
		        							<p>CLAIM YOUR BONUS</p>
		        						</a>
		        					</div>
		        				</div>

	        				</div>
	        			</div>
	        			<div class="col-md-8">
	        				<div class="invite-someone">
	        					<h2>INVITE SOMEBODY AND GET HUGE BONUSES</h2>
	        					<div class="invite-number">
	        						<div class="invite-one">
	        							<p>Invite <span class="person">1 person</span></p>
	        							<p>Get <span>&#8358;50</span></p>
	        						</div>
	        						<div class="invite-one">
	        							<p>Invite <span class="person">2 person</span></p>
	        							<p>Get <span>&#8358;100</span></p>
	        						</div>
	        						<div class="invite-one">
	        							<p>Invite <span class="person">3 person</span></p>
	        							<p>Get <span>&#8358;300</span></p>
	        						</div>
	        					</div>
	        					<div class="claim-other-btn claim-bonus-btn gen-btn">
	        						<a href="#">
	        							<p>CLAIM YOUR BONUS</p>
	        						</a>
	        					</div>

	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </section>

	        <section class="winners section-area">
	        	<div class="container">
	        		<div class="row">
	        			<div class="col-md-4">
	        				<div class="lotto-winners">
	        					<div class="lotto-winners-header">
	        						<h2>Latest Lotto Winners</h2>
	        						<p><a href="#">All results <i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
	        					</div>
	        					<div class="lotto-winner-row">
	        						<p>Abdulquadri Sotomiwa, Nigeria, 5/90</p>
	        						<p>&#8358;500,000</p>
	        					</div>
	        					<div class="lotto-winner-row">
	        						<p>Abdulquadri Sotomiwa, Nigeria, 5/90</p>
	        						<p>&#8358;500,000</p>
	        					</div>
	        					<div class="lotto-winner-row">
	        						<p>Abdulquadri Sotomiwa, Nigeria, 5/90</p>
	        						<p>&#8358;500,000</p>
	        					</div>
	        					<div class="lotto-winner-row">
	        						<p>Abdulquadri Sotomiwa, Nigeria, 5/90</p>
	        						<p>&#8358;500,000</p>
	        					</div>
	        				</div>
	        			</div>
	        			<div class="col-md-8">
	        				<div class="all-person-icon">
		        				<div class="person-icon">
		        					<div class="single-box"></div>
		        					<div class="single-box"></div>
		        					<div class="single-box"></div>
		        					<div class="single-box"></div>
		        				</div>
		        				<div class="person-icon">
		        					<div class="single-box"></div>
		        					<div class="single-box"></div>
		        					<div class="single-box"></div>
		        					<div class="single-box"></div>
		        				</div>
	        				</div>
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

	        <section class="user-login user-modal" style="display: none;">
	        	<div class="container">
	        		<div class="row">
	        			<form action="" method="post" id="fileForm" role="form">

	        			<div class="login-card" style="position: relative;">
	        				<div class="card-logo">
		        				<img src="static/img/bigg.png" alt="">
		        			</div>
	        				<div class="close-x" style="    color: #ffffff;position: absolute;right: -25px;top: -15px;background: #d04c4c;">
		        				<h2>X</h2>
		        			</div>
	        				<div class="login-logo">
	        					<img src="" alt="">
	        				</div>
                            <?php echo $msg;?>
	        				<div class="form-group input-form" >
	        					<i class="fa fa-user input-icon"></i>
	        					<input required type="text" class="form-control" placeholder="Your Email Address" name="reg_email" id = "reg_email"  onchange="email_validate(this.value);">
                                <div class="status" id="status"></div>
	        				</div>
	        				<div class="form-group input-form">
	        					<i class="fa fa-lock input-icon"></i>
	        					<input required type="password" class="form-control" placeholder="Password" name="reg_pass1" minlength="6" maxlength="16"  id="reg_pass1">
	        				</div>
	        				<div class="form-group">
	        					<input type="checkbox" name="">
	        					<label>Keep Me Signed In</label>
	        				</div>
	        				<div class="btns">
	        					<div class="">
	        						<input type ="submit" class="btn-left btns-btn" name='login' value="Login">
	        						
	        					</div>
	        					<div class="btn-right btns-btn">
	        						<p><i class="fa fa-facebook-square fa-lg"></i> Facebook Login</p>
	        					</div>
	        				</div>
	        				<div class="login-signup">
	        					<p>New to Our Platform? <span><a href="#">Sign Up Here</a></span></p>
	        				</div>
	        			</form>
	        			</div>
	        		</div>
	        	</div>
	        </section>

	

	        <section class="user-signup user-modal" style="display: none;">

	        	<div class="container">
	        		<div class="row">
	        			
	        			<div class="signup-card" style="position: relative;">
	        				<div class="card-logo">
		        				<img src="static/img/bigg.png" alt="">
		        			</div>
	        				<div class="close-x" style="    color: #ffffff;position: absolute;right: -25px;top: -15px;background: #d04c4c;">
		        				<h2>X</h2>
		        			</div>
		        			
	        				<div class="signup-header">
	        					<img src="#" alt="">
	        					<p>Get Started With Nigeria's Largest Lotto Community</p>
	        				</div>
	        			 <form action="saved.php" method="post" id="fileForm" role="form">
	        				<div class="form-area">

	        					<div class="form-inline single-line">
	        						<div class="form-group single-group">
	        							<p>Full Name*</p>
	        							<input required type="text" class="form-control" name="full_name" id = "txt" onkeyup = "Validate(this)" required>
                                         <div id="errFirst"></div> 
	        						</div>
	        						<div class="form-group single-group">
	        							<p>Preferred Username*</p>
	        							<input type="text" class="form-control" name="reg_id" id = "txt" onkeyup = "Validate(this)" required">
                                         <div id="errFirst"></div> 
	        						</div>
	        					</div>
	        					<div class="form-inline single-line">
	        						<div class="form-group single-group">
	        							<p>Email Address*</p>
	        							<input required type="text" class="form-control" name="reg_email" id = "reg_email"  onchange="email_validate(this.value);">
                                         <div class="status" id="status"></div>
	        						</div>
	        						<div class="form-group single-group">
	        							<p>Phone Number*</p>
	        							<input required type="text" class="form-control" name="reg_phone" id="reg_phone" maxlength="28" onkeyup="validatephone(this);" placeholder="Only number is allow">
	        						</div>
	        					</div>
	        					<div class="form-inline single-line">
	        						<div class="form-group single-group">
	        							<p>Password*</p>
	        							<input required type="password" class="form-control" name="reg_pass1" minlength="6" maxlength="16"  id="reg_pass1">
	        						</div>
	        						<div class="form-group single-group">
	        							<p>Confirm Password*</p>
	        							<input required type="password" class="form-control" name="reg_pass2" minlength="6" maxlength="16" placeholder="Enter again to validate"  id="reg_pass2" onkeyup="checkPass(); return false;">
	        						</div>
	        					</div>
	        					<div class="signup-agree">
	        						<input required type="checkbox" name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">
	        						<p>I agree to <span><a href="#">SGLs Terms and Conditions</a></span> and consent to <span><a href="#">SGL's Privacy Policy</a></span></p>
	        					</div>
	        					<div class="btns">
		        					<div class="btn-left btns-btn">
		        						<input type="submit" name="submit" class="btn btn-primary value="Join Now">
		        						
		        					</div>
		        					<div class="btn-right btns-btn">
		        						<p><i class="fa fa-facebook-square fa-lg"></i> Join Via Facebook</p>
		        					</div>
		        				</div>
                                    <script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
</script>
		        			
		        				<div class="login-signup">
		        					<p>Already Have An Account? <span><a href="#" style="color: #ff0000;">Log In Here</a></span></p>
		        				</div>
	        					
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </section>
</form>
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
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"></script>')</script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
          <script>
function checkPass()
{
    //Store the password field objects into variables ...
    var reg_pass1 = document.getElementById('reg_pass1');
    var reg_pass2 = document.getElementById('reg_pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(reg_pass1.value == reg_pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        reg_pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        reg_pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
} 
function validatephone(reg_phone) 
{
    var maintainplus = '';
    var numval = reg_phone.value
    if ( numval.charAt(0)=='+' )
    {
        var maintainplus = '';
    }
    curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
    reg_phone.value = maintainplus + curphonevar;
    var maintainplus = '';
    reg_phone.focus;
}
// validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
}
// validate email
function email_validate(reg_email)
{
var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

    if(regMail.test(reg_email) == false)
    {
    document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("status").innerHTML = "<span class='valid'>Thanks, you have entered a valid Email address!</span>"; 
    }
}
// validate date of birth
function dob_validate(dob)
{
var regDOB = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;

    if(regDOB.test(dob) == false)
    {
    document.getElementById("statusDOB").innerHTML  = "<span class='warning'>DOB is only used to verify your age.</span>";
    }
    else
    {
    document.getElementById("statusDOB").innerHTML  = "<span class='valid'>Thanks, you have entered a valid DOB!</span>";   
    }
}
// validate address
function add_validate(address)
{
var regAdd = /^(?=.*\d)[a-zA-Z\s\d\/]+$/;
  
    if(regAdd.test(address) == false)
    {
    document.getElementById("statusAdd").innerHTML  = "<span class='warning'>Address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("statusAdd").innerHTML  = "<span class='valid'>Thanks, Address looks valid!</span>";    
    }
}

        </script>

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
	                    items:1
	                },
	                1000:{
	                    items:1
	                }
	            }
	        })

	        $(".owl-prev").addClass("claim-prev");
	        $(".owl-next").addClass("claim-next");

	        $( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
		 	$( ".owl-next").html('<i class="fa fa-chevron-right"></i>');


		 	// Open user reg modal
        	$('.top-reg-btn').click(function(){
        		$('.user-login').css('display','block');
        	})


        	// open user login modal
        	$('.top-login-btn').click(function(){
        		$('.user-signup').css('display', 'block');
        	})

        	// close login and reg modal
        	$('.close-x').click(function(){
        		$('.user-login').css('display','none');
        		$('.user-signup').css('display', 'none');
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