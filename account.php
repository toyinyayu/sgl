<?php 

 require_once 'connections/biggames.php';
		 
		 session_start();
if (!isset($_SESSION['userSession'])) {
 header("Location: login.php");
}
$inactive = 300; // Set timeout period in seconds

if (isset($_SESSION['timeout'])) {
    $session_life = time() - $_SESSION['timeout'];
    if ($session_life > $inactive) {
        session_destroy();
        header("Location: login.php");
    }
}
$_SESSION['timeout'] = time();

$conn    = Connect();



$user_check=$_SESSION['userSession'];


$sql = mysqli_query($conn,"SELECT * FROM bigreg WHERE reg_email='$user_check' ");
 
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC) or die(mysqli_error());
 
$login_user=$row['reg_user'];
$login_user=$row['credit'];
$login_user=$row['reg_id'];
$login_user=$row['reg_email'];
$login_user=$row['reg_phone'];

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
		                            
		                           <?php if(isset($_SESSION['userSession'])): ?>
                        <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong><?php echo $login_user=$row['reg_id'];?></strong>
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
                                        <p class="text-left"><strong></strong></p>
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
		                        </ul>
		                    </div>

		                    <div class="col-md-12 nav-below">
			                	<ul class="nav navbar-nav navbar-adjust">
			                	    <li><a href="index.php">Home</a></li>
			                	    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Lotteries <span class="caret"></span></a>
			                	    	<ul class="dropdown-menu">
			                	    	    <li><a href="#">5/90</a></li>
			                	    	    <li><a href="#">6/49</a></li>
			                	    	    <li><a href="#">6/45</a></li>
			                	    	</ul>
			                	    </li>
			                	    <li><a href="#">Promotions</a></li>
			                	    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Result <span class="caret"></span></a>
			                	    	<ul class="dropdown-menu">
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
	        <section class="account-banner">
	        	<div class="container">
	        		<div class="row">
	        			<div class="col-md-12">
	        				<div class="col-md-6 my-account">
	        					<h2>My Account</h2>
	        				</div>
	        				<div class="col-md-6 my-account">
	        					<p>Account Balance: <span>#<?php echo $login_user=$row['credit']; ?></span></p>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </section>

	        <section class="tabbed-section">
	        	<div class="container">
	        		<div class="row">
	        			<div class="col-md-12">
		        			<ul class="nav nav-pills">
							    <li class="active"><a data-toggle="pill" href="#home">
							    <img src="static/img/white-email.png" alt="">
							    Home</a></li>
							    <li><a data-toggle="pill" href="#menu1">
							    	<img src="static/img/white-avatar.png" alt="">
							    	Profile
							    </a></li>
							    <li><a data-toggle="pill" href="#menu2">
						    	<img src="static/img/white-safe-transaction.png" alt="">
							    My Transactions
								</a></li>
							    <li><a data-toggle="pill" href="#menu3">
						    	<img src="static/img/white-transfer.png" alt="">
							    Withdrawals
								</a></li>
							    <li><a data-toggle="pill" href="#menu4">
						    	<img src="static/img/white-ticket.png" alt="">
							    Lottery Tickets
								</a></li>
							    <li><a data-toggle="pill" href="#menu5">
						    	<img src="static/img/white-deposit.png" alt="">
							    Deposit
								</a></li>
						  	</ul>

						  	<div class="tab-content">
							    <div id="home" class="tab-pane fade in active single-tab-card">
							    	<h2>Inbox</h2>
							    	<div class="inbox-content">
								    	<table class="table table-bordered">
										    <thead>
										      <tr>
										        <th>Email</th>
										        <th>ID</th>
										        <th>Luckynumbers</th>
										         <th>Possible Wiinings</th>
										      </tr>
										    </thead>
										    <tbody>
										    	 <?php 


$conn    = Connect();


$user_check=$_SESSION['userSession'];
 
$query = "SELECT * FROM fiveofninety WHERE reg_email='".$user_check."'  ORDER BY ID DESC LIMIT 10";
if ($result = $conn->query($query)) {
    while ($rows = $result->fetch_assoc()) {
        $values[] = $rows;
    }
	
	
    foreach($values as $row) {
      $reg_email = $row['reg_email'];
        $reg_user   = $row['reg_user'];
		$numbers = $row['luckynumbers'];
		$newbalance = $row['newbalance'];
		$poss_winning = $row['poss_winnings'];
		$amount = $row['debit'];
		$game_types = $row['game_types'];
		
		

		
		

										    echo "<tr>\n"; // st
										        echo "<td>" . $reg_email . "</td>\n";
										        echo "<td>" . $reg_user . " </td>\n";
										        echo "<td>" . $numbers . "</td>\n";
										         echo "<td>" . $poss_winning . "</td>\n";
										         echo "<td>" . $newbalance . "</td>\n";

										          }
   											 $result->close();
													}
												echo "</body>";
											echo "</table>";
?>
										      </tr>
										    </tbody>
										</table>
							    	</div>
							    </div>
							    	<?php require_once 'connections/biggames.php';

 $user_check=$_SESSION['userSession'];
 
if(isset($_POST['update']))
{

$conn = Connect();

$firstname =     $conn->real_escape_string($_POST['firstname']);
$reg_email    = $conn->real_escape_string($_POST['reg_email']);
$lastname   = $conn->real_escape_string($_POST['lastname']);
$reg_phone   = $conn->real_escape_string($_POST['reg_phone']);
$dob    = $conn->real_escape_string($_POST['dob']);
$country = $conn->real_escape_string($_POST['country']);
$address = $conn->real_escape_string($_POST['address']);
$currency = $conn->real_escape_string($_POST['currency']);
      

 // mysql query to Update data
   $query = "UPDATE bigreg SET reg_email='".$reg_email."', firstname='".$firstname."', lastname = '".$lastname."', address='".$address."', dob = $dob, reg_phone='".$reg_phone."', country = '".$country."', currency='".$currency."' WHERE reg_email = $user_check";
   
   $result = mysqli_query($conn, $query);
   
   if($result)
   {
 
echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
 $conn->close();
}


 
?>
							    <div id="menu1" class="tab-pane fade single-tab-card">
							    	<h2>My Details</h2>
							    	<form action="" method="post">
							    	<div class="detail-form">
			        					<div class="form-inline detail-single-line">
			        						<div class="form-group detail-single-group">
			        							<p>First Name</p>
			        							<input type="text" class="form-control" name="firstname" placeholder="">
			        						</div>
			        						<div class="form-group detail-single-group">
			        							<p>Email</p>
			        							<input type="text" class="form-control" name="reg_email" placeholder="<?php echo $login_user=$row['reg_email']; ?>">
			        						</div>
			        					</div>
			        					<div class="form-inline detail-single-line">
			        						<div class="form-group detail-single-group">
			        							<p>LAST NAME</p>
			        							<input type="text" class="form-control" name="lastname" placeholder="">
			        						</div>
			        						<div class="form-group detail-single-group">
			        							<p>PHONE NUMBER</p>
			        							<input type="text" class="form-control" name="reg_phone" placeholder="">
			        						</div>
			        					</div>
			        					<div class="form-inline detail-single-line">
			        						<div class="form-group detail-single-group">
			        							<p>COUNTRY</p>
			        							<select name="country">
			        								<option value="Nigeria">Nigeria</option>
			        								<option value="Ghana">Ghana</option>
			        							</select>
			        						</div>
			        						<div class="form-group detail-single-group">
			        							<p>BIRTHDAY</p>
			        							<input type="date" class="form-control" name="dob" placeholder="">
			        						</div>
			        					</div>
			        					<div class="form-inline detail-single-line">
			        						<div class="form-group detail-single-group">
			        							<p>STREET ADDRESS</p>
			        							<input type="text" class="form-control" name="address" placeholder="">
			        						</div>
			        						<div class="form-group detail-single-group">
			        							<p>DISPLAY CURRENCY</p>
			        							<select name="currency">
			        								<option value="Naira">Naira</option>
			        								<option value="Dollar">Dollar</option>
			        								<option value="Pounds">Pounds</option>
			        							</select>
			        						</div>
			        					</div>
			        					<div class="detail-btns btns">
				        					<div class="detail-cancel-btn btn-left btns-btn">
				        						<p>CANCEL</p>
				        					</div>
				        					<div class="detail-save-btn btn-right btns-btn">
				        						<input type="submit" name="update" value="Save Changes">
				        					</div>
				        				</form>
				        				</div>
							    	</div>
							    </div>
							    <div id="menu2" class="tab-pane fade single-tab-card">
							      <h2>My Transactions</h2>
							    	<div class="inbox-content">
								    	<table class="table table-bordered">
										    <thead>
										      <tr>
										        <th>Date</th>
										        <th>Amount</th>
										        <th>Transaction ID</th>
										       
										      </tr>
										    </thead>
										    <tbody>
										      </tr>
										    </tbody>
										</table>
										<p>No transcations to display</p>
							    	</div>
							    </div>
							    <div id="menu3" class="tab-pane fade single-tab-card">
							      <h2>My Transcations</h2>
								    <div class="withdraw-transaction">
								    	<div class="inbox-content withdraw-detail">
									    	<table class="table table-bordered">
											    <thead>
											      <tr>
											        <th>Date</th>
											        <th>Method</th>
											        <th>Amount</th>
											        <th>Status</th>
											      </tr>
											    </thead>
											    <tbody>
											      <tr>
											         <td></td>
											      </tr>
											    </tbody>
											</table>
											<p>No transactions to display</p>
								    	</div>
								    	<div class="new-withdraw">
								    		<h2>New Withdrawal</h2>
								    		<p>Amount</p>
								    		<div style="position: relative;">
									    		<input type="text" name="">
									    		<img src="static/img/naira.png" alt="">
								    		</div>
								    		<small><a href="#">Withdraw All Funds</a></small>
								    		<div class="new-withdraw-btn gen-btn">
								    			<a href="#">
								    				<p>MAKE WITHDRAWAL</p>
								    			</a>
								    		</div>
								    	</div>
								    </div>
							    </div>
							    <div id="menu4" class="tab-pane fade single-tab-card">
							     <h2>Tickets</h2>
							    	<div class="inbox-content">
								    	<table class="table table-bordered">
										    <thead>
										      <tr>
										        <th>Draw</th>
										        <th>Result</th>
										        <th>Draw Date</th>
										        <th>Winnings</th>
										        <th>Subscribed</th>
										      </tr>
										    </thead>
										    <tbody>
										      <tr>
										        <!-- <td></td> -->
										      </tr>
										    </tbody>
										</table>
										<p>No transactions to display</p>
							    	</div>
							    </div>
							    <div id="menu5" class="tab-pane fade single-tab-card">
							      
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
    </body>
</html>