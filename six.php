<?php require_once 'connections/biggames.php';
		 
		 session_start();
if (!isset($_SESSION['userSession'])) {
 header("Location: login.php");
}
$inactive = 600; // Set timeout period in seconds

if (isset($_SESSION['timeout'])) {
    $session_life = time() - $_SESSION['timeout'];
    if ($session_life > $inactive) {
        session_destroy();
        header("Location: login.php");
    }
}
$_SESSION['timeout'] = time();


$conn    = Connect();

$game_types = $_GET['id'];
$game_types    = $conn->real_escape_string($game_types);

$user_check=$_SESSION['userSession'];


$sql = mysqli_query($conn,"SELECT * FROM bigreg WHERE reg_email='$user_check' ");
 
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC) or die(mysqli_error());
 
$login_user=$row['reg_user'];
$login_user=$row['credit'];
$login_user=$row['reg_id'];
$login_user=$row['reg_email'];

?>

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


        <!-- Added by super -->
        <style>
          #feedback { font-size: 1.4em; } #selectable .ui-selecting { background: #f60839; }
          #selectable .ui-selected { background: #f60839; color: white; }
          #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
          #selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }

          #feedback { font-size: 1.4em; } #selecttype .ui-selecting { background: #f60839; }
          #selecttype .ui-selected { background: #f60839; color: white; }
        </style>
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
			                	    <li><a href="#">Home</a></li>
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
                        <li class="top-reg-btn"><a href="#">Register</a></li>
                        <li class="top-login-btn"><a href="#">Log In</a></li>
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

	        <section class="account-banner">
	        	<div class="container">
	        		<div class="row">
	        		</div>
	        	</div>
	        </section>

	        <section class="five-ninety-card">
	        	<div class="container-fluid">
	        		<div class="row">
	        			<div class="col-md-12 no-padding">
	        				<div class="play-card">
	        					<div class="top-area">
	        						<div class="the-logo">
	        							<img src="static/img/fivelogo.png" alt="">
	        						</div>
	        						<div class="next-draw">
	        							<p>Next Draw In</p>
	        							<p><i class="fa fa-clock-o"></i> 00:56:03</p>
	        						</div>
	        						<div class="to-win">
	        							<p>To Win</p>
	        							<h2>&#8358;500,000</h2>
	        						</div>
	        					</div>
	        					<div class="select-stake">
	        						<div class="select-number-heading">
		        						<p>1. Choose Stake Type:</p>
	        						</div>
	        						<div id="selecttype" class="owl-carousel owl-theme large-circle-parent">
	        							<div class="single-circle item"><p>2 Direct</p></div>
	        							<div class="single-circle item"><p>3 Direct</p></div>
	        							<div class="single-circle item"><p>4 Direct</p></div>
	        							<div class="single-circle item"><p>Perm 2</p></div>
	        							<div class="single-circle item"><p>Perm 3</p></div>
	        							<div class="single-circle item"><p>Perm 4</p></div>
	        							<div class="single-circle item"><p>Perm 5</p></div>
	        						</div>

	        						<div class="stake-modal">
							        	<div class="stake-info">
							        		<div class="close-x">
							        			<h2>X</h2>
							        		</div>
							        		<div class="all-stake-info">
								        		<h2>2 Direct:</h2>
								        		<p class="stake-para">You stake against all odds that the two numbers you would choose to play will match two out of the five winning numbers to be selected when the draw takes place </p>
								        		<div class="red-gen-btn stake-modal-btn">
								        			<a href="#">
								        				<p class="s2d">Select 2 Direct</p>
								        			</a>
								        		</div>
							        		</div>
							        	</div>
							        </div>
	        					</div>


	        					<div class="select-numbers">
	        						<div class="select-number-heading">
	        							<p>2. Select Numbers</p>
	        						</div>
	        						<div class="all-parts">
		        						<div id="selectable" class="one-part">
		        							<div class="one-part-header">
                                                <h4>Select A Number</h4>
		        							</div>
		        							<form action="get.php" name="" method="post">

		        							<div class="single-select-number">
		        								<a href="#"><p>1</p></a>
		        								<a href="#"><p>2</p></a>
		        								<a href="#"><p>3</p></a>
		        								<a href="#"><p>4</p></a>
		        								<a href="#"><p>5</p></a>
		        								<a href="#"><p>6</p></a>
		        								<a href="#"><p>7</p></a>
		        								<a href="#"><p>8</p></a>
		        								<a href="#"><p>9</p></a>
		        							</div>
		        							<div class="single-select-number">
		        								<a href="#"><p>10</p></a>
		        								<a href="#"><p>11</p></a>
		        								<a href="#"><p>12</p></a>
		        								<a href="#"><p>13</p></a>
		        								<a href="#"><p>14</p></a>
		        								<a href="#"><p>15</p></a>
		        								<a href="#"><p>16</p></a>
		        								<a href="#"><p>17</p></a>
		        								<a href="#"><p>18</p></a>

		        							
		        							</div>
		        							<div class="single-select-number">
		        								<a href="#"><p>19</p></a>
		        								<a href="#"><p>20</p></a>
		        								<a href="#"><p>21</p></a>
		        								<a href="#"><p>22</p></a>
		        								<a href="#"><p>23</p></a>
		        								<a href="#"><p>24</p></a>
		        								<a href="#"><p>25</p></a>
		        								<a href="#"><p>26</p></a>
		        								<a href="#"><p>27</p></a>
		        							</div>
		        							<div class="single-select-number">
		        								<a href="#"><p>28</p></a>
		        								<a href="#"><p>29</p></a>
		        								<a href="#"><p>30</p></a>
		        								<a href="#"><p>31</p></a>
		        								<a href="#"><p>32</p></a>
		        								<a href="#"><p>33</p></a>
		        								<a href="#"><p>34</p></a>
		        								<a href="#"><p>35</p></a>
		        								<a href="#"><p>36</p></a>
		        							</div>
		        							<div class="single-select-number">
		        								<a href="#"><p>37</p></a>
		        								<a href="#"><p>38</p></a>
		        								<a href="#"><p>39</p></a>
		        								<a href="#"><p>40</p></a>
		        								<a href="#"><p>41</p></a>
		        								<a href="#"><p>42</p></a>
		        								<a href="#"><p>43</p></a>
		        								<a href="#"><p>44</p></a>
		        								<a href="#"><p>45</p></a>
		        							</div>
		        							<div class="single-select-number">
		        								<a href="#"><p>46</p></a>
		        								<a href="#"><p>47</p></a>
		        								<a href="#"><p>48</p></a>
		        								<a href="#"><p>49</p></a>
		        								<a href="#"><p>50</p></a>
		        								<a href="#"><p>51</p></a>
		        								<a href="#"><p>52</p></a>
		        								<a href="#"><p>53</p></a>
		        								<a href="#"><p>54</p></a>
		        							</div>
		        							<div class="single-select-number">
		        								<a href="#"><p>55</p></a>
		        								<a href="#"><p>56</p></a>
		        								<a href="#"><p>57</p></a>
		        								<a href="#"><p>58</p></a>
		        								<a href="#"><p>59</p></a>
		        								<a href="#"><p>60</p></a>
		        								<a href="#"><p>61</p></a>
		        								<a href="#"><p>62</p></a>
		        								<a href="#"><p>63</p></a>
		        							</div>
		        							<div class="single-select-number">
		        								<a href="#"><p>64</p></a>
		        								<a href="#"><p>65</p></a>
		        								<a href="#"><p>66</p></a>
		        								<a href="#"><p>67</p></a>
		        								<a href="#"><p>68</p></a>
		        								<a href="#"><p>69</p></a>
		        								<a href="#"><p>70</p></a>
		        								<a href="#"><p>71</p></a>
		        								<a href="#"><p>72</p></a>
		        							</div>
		        							<div class="single-select-number">
		        								<a href="#"><p>73</p></a>
		        								<a href="#"><p>74</p></a>
		        								<a href="#"><p>75</p></a>
		        								<a href="#"><p>76</p></a>
		        								<a href="#"><p>77</p></a>
		        								<a href="#"><p>78</p></a>
		        								<a href="#"><p>79</p></a>
		        								<a href="#"><p>80</p></a>
		        								<a href="#"><p>81</p></a>
		        							</div>
		        							<div class="single-select-number">
		        								<a href="#"><p>82</p></a>
		        								<a href="#"><p>83</p></a>
		        								<a href="#"><p>84</p></a>
		        								<a href="#"><p>85</p></a>
		        								<a href="#"><p>86</p></a>
		        								<a href="#"><p>87</p></a>
		        								<a href="#"><p>88</p></a>
		        								<a href="#"><p>89</p></a>
		        								<a href="#"><p>90</p></a>
		        							</div>

		        								<input type="hidden" name="reg_user" value="<?php echo $login_user=$row['reg_user'];?>" />

<input type="hidden" name="reg_id" value="<?php echo $login_user=$row['reg_id'];?>" />
<input type="hidden" name="credit" value="<?php echo $login_user=$row['credit'];?>" />

		        							<div class="your-s election">
                                                Your Selection: <span id="result"> </span>
                                                <input type="hidden" name="luckynumbers" id="luckynumbers"/>
                                                 <input type="hidden" name="game_types" id="game_types"/>
		        							</div>

		        						</div>
	        						</div>
	        					</div>
	        					<div class="stake-amount">
	        						<div class="amount-input">
		        						<p>3. How much would you like to stake</p>
		        						<div class="amount-input">
			        						<img src="static/img/naira.png" class="naira" alt="">
			        						<input type="text" name="debit">
		        						</div>
	        						</div>
	        						<div class="place-bet-btn gen-btn">
	        							<a href="">
	        								<input type="submit" class="btn btn-primary" value="Place Bet">
	        							</a>
	        						</div>
	        					</div>
	        				</form>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </section>

	        <section class="recorded-modal">
	        	<div class="container">
	        		<div class="row">
	        			<div class="close-x">
							<h2>X</h2>
						</div>
	        			<div class="bet-recorded">
	        				<img src="static/img/clap.png" alt="">
	        				<p>Your Bet Has been Recorded But Not Placed Yet</br> Because You have not signed up for a BigGames Account</p>
	        			</div>
	        			<div class="red-gen-btn modal-yellow-btn">
	        				<a href="">
	        					<p class="sign-up-modal">Sign Up Here</p>
	        				</a>
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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="bootstrap/dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script>
            $("#selectable").selectable({
                filter: "p",
                selecting: function(event, ui) {
                 if ($(".ui-selected, .ui-selecting").length > 5) {
                   $('.ui-selecting').removeClass("ui-selecting");
                   console.log("selected should not be more than 5");
                 }
                },
               selected: function( event, ui ) {
                 var result = []
                 $(".ui-selected", this).each(function() {
                     result.push($(this).text())
                 });
                 $("#result").text(result.toString());
                 $("#luckynumbers").val(result.toString());
               }
            });
            $("#selectable").on("selectablestart", function (event, ui) {
                event.originalEvent.ctrlKey = true;
            });


            $("#selecttype").selectable({
                filter: ".single-circle",
                selected: function( event, ui ) {
                $("#game_types").val($(".ui-selected").text().replace(/\s+/, ""));
                }
            });

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
