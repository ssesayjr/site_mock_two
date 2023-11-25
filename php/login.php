<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $status = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter email.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT idusers, email, active, password FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username,$status,$hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
						if($password== $hashed_password){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;      
							$_SESSION["status"] = $status;                            
                      
                            
                            // Redirect user to welcome page
                            header("location: home.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Transform for Equity | An Antiracist Repair Group | Maryland</title>
	<!-- Site favicon -->
	<link rel="shortcut icon" href="./assets/butterfly_icon.png">
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700" rel="stylesheet"> -->
    <!-- Icon Font -->
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.css">
	<!-- Text Font -->
    <link rel="stylesheet" href="./css/fonts.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <!-- Normal style CSS -->
	<link rel="stylesheet" href="./css/style.css">
    <!-- Normal media CSS -->
	<link rel="stylesheet" href="./css/media.css">

</head>
<body class="is-preload">

	<!-- Header start -->
		<!-- Header -->
		<header id="header">
			<a class="logo" href="../index.shtml">   Transform <span>For Equity</span> <img src="./assets/butterfly.png" style="vertical-align: top; float: left;" height="30px"/></a>
			<nav>
				<a href="#logBan">Menu</a>
			</nav>
		</header>

	<!-- Nav -->
	<nav id="logBan">
		<ul class="links">
			<li><a href="../index.shtml">Home</a></li>
			<li><a href="../about.shtml">About</a></li>
			<li><a href="../contactus.shtml">Contact Us</a></li>
			<li><a href="../partners.shtml">Services</a></li>
			<li><a href="../portfolio.shtml">Portfolio</a></li>
			<li class="submenu"><a href="#">Social Media</a>
				<ul>
					<li><a href="portfolio.shtml"><i class="fas fa-newspaper" style="color: white; padding-right: 1px;"></i>&nbsp;Blogs</a></li>
					<li><a href="http://www.linkedin.com/in/deitra-reiser-1aa71117"><i class="fab fa-linkedin" style="color: white; padding-right: 1px;"></i> LinkedIn</a></li>
					<li><a href="https://www.instagram.com/transformforequity/"><i class="fab fa-instagram" style="color: white; padding-right: 1px;"></i>&nbsp;Instagram</a></li>
				</ul>
		</li>
		</ul>
	</nav>
	<!-- Header end -->
	<main class="cd-main">
		<section class="cd-section index4 visible">
			<div class="cd-content style4">
				<div class="login-box">
					<div class="login-form-slider">
						<!-- login slide start -->
						<div class="login-slide slide">
							<div class="row no-gutters height-100-percentage">
								<div class="col-md-8 col-sm-12 style4-left">
									<div class="d-flex height-100-percentage padding-40px">
										<div class="align-self-center width-100-percentage">
											<h2>Login</h2>

											<?php 
												if(!empty($login_err)){
													echo   $login_err ;
												}        
												?>


											<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">
												<div class="form-group">
													<label class="label">Email Address</label>
													<input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                									<span><?php echo $username_err; ?></span>

												</div>
												<div class="form-group">
													<label class="label">Password</label>
													<input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
               										<span><?php echo $password_err; ?></span>

												</div>

												<div class="form-group">
													<input type="submit" class="submit" value="Login">
												</div>
											</form>




										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- login slide end -->
						<!-- signup slide end -->
					</div>
				</div>
			</div>
		</section>
	</main>



	<!-- JS File -->
	<script src="./js/breakpoints.min.js"></script>
	<script src="./js/browser.min.js"></script>
	<script src="./js/jquery.min.js"></script>
	<script src="./js/util.js"></script>
	<script src="./js/main.js"></script>

	<script type="text/javascript" src="./js/main.js"></script>
	<script src="./js/main2.js"></script>
	<script src="./js/modernizr.js"></script>
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script>
	<script src="./js/velocity.min.js"></script>
	<script type="text/javascript" src="./js/script.js"></script>


	</body>
</html>