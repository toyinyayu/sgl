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
			                	    	    <li><a href="#">5/90</a></li>
			                	    	    <li><a href="#">6/49</a></li>
			                	    	    <li><a href="#">6/45</a></li>
			                	    	</ul>
			                	    </li>
			                	    <li><a href="#">Promotions</a></li>
			                	    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Result <span class="caret"></span></a>
			                	    	<ul class="dropdown-menu dropdown-below">
			                	    	    <li><a href="#">5/90</a></li>
			                	    	    <li><a href="#">6/49</a></li>
			                	    	    <li><a href="#">6/45</a></li>
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

	        <section class="user-signup user-modal single-signup">
	        	<div class="container">
	        		<div class="row">
	        			<div class="signup-card single-signup-card" style="position: relative;">
	        				<div class="card-logo">
		        				<img src="static/img/bigg.png" alt="">
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
	        							<input required type="text" class="form-control"  name="full_name" id = "txt" onkeyup = "Validate(this)" required">
	        							 <div id="errFirst"></div> 
	        						</div>
	        						<div class="form-group single-group">
	        							<p>Preferred Username*</p>
	        							<input required type="text" class="form-control" name="reg_id" id = "txt" onkeyup = "Validate(this)" required >
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
	        							<input required type="text" class="form-control" name="reg_phone" id="reg_phone" maxlength="28" onkeyup="validatephone(this);" placeholder="not used for marketing">
	        						</div>
	        					</div>
	        					<div class="form-inline single-line">
	        						<div class="form-group single-group">
	        							<p>Password*</p>
	        							<input required type="password" class="form-control" name="reg_pass1"  minlength="6" maxlength="16"  id="reg_pass1">
	        						</div>
	        						<div class="form-group single-group">
	        							<p>Confirm Password*</p>
	        							<input required type="password" class="form-control" name="reg_pass2" minlength="6" maxlength="16" placeholder="Enter again to validate"  id="reg_pass2" onkeyup="checkPass(); return false;">
	        						</div>
	        					</div>
	        					<div class="signup-agree">
	        						<input type="checkbox" name="terms


	        						" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">  
	        						<p>I agree to <span><a href="#">SGLs Terms and Conditions</a></span> and consent to <span><a href="#">SGL's Privacy Policy</a></span></p>
	        					</div>
	        					<div class="btns">
		        					<div class="btn-left btns-btn">
		        						<input type="submit" name="submit" value="Join Now" class="btn btn-primary">
		        					</div>
		        					<div class="btn-right btns-btn">
		        						<p><i class="fa fa-facebook-square fa-lg"></i> Join Via Facebook</p>
		        					</div>
		        				</div>
		        			</div>
		        		</form>
		        				<div class="login-signup">
		        					<p>Already Have An Account? <span><a href="login.php" style="color: #ff0000;">Log In Here</a></span></p>
		        				</div>
	        					<script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
</script>
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
    document.getElementById("status").innerHTML	= "<span class='valid'>Thanks, you have entered a valid Email address!</span>";	
    }
}
// validate date of birth
function dob_validate(dob)
{
var regDOB = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;

    if(regDOB.test(dob) == false)
    {
    document.getElementById("statusDOB").innerHTML	= "<span class='warning'>DOB is only used to verify your age.</span>";
    }
    else
    {
    document.getElementById("statusDOB").innerHTML	= "<span class='valid'>Thanks, you have entered a valid DOB!</span>";	
    }
}
// validate address
function add_validate(address)
{
var regAdd = /^(?=.*\d)[a-zA-Z\s\d\/]+$/;
  
    if(regAdd.test(address) == false)
    {
    document.getElementById("statusAdd").innerHTML	= "<span class='warning'>Address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("statusAdd").innerHTML	= "<span class='valid'>Thanks, Address looks valid!</span>";	
    }
}

        </script>
    </body>
</html>