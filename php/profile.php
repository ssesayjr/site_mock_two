<?php
// Initialize the session
//session_start();

$link2 = mysqli_connect('192.168.137.1', 'duser', 'Leumas88!', 'test',3306);


/* Attempt to connect to MySQL database */
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $updateAcct = "";
$username_err = $password_err = $login_err = "";


 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter email.";
    } else{
        $username = trim($_POST["username"]);
        $acctStatus =intval($_POST['acctStatus']);
    }
    


    //Second Level
    $param_username = $username;
    $param_accStatus = $acctStatus; 
                        

    $second_query="UPDATE users SET status = ? WHERE email =?";
    
    // WOrking PRepare
    // if ($stmt=mysqli_prepare($link2,$second_query)){
    //     echo "prepared pass"; 
    // }else {
    //     echo "failed prepare";
    // }

    //Bind result variables
    $stmt2 = mysqli_prepare($link, $second_query);

    mysqli_stmt_bind_param($stmt2,"is", $param_accStatus,$param_username);
    mysqli_stmt_execute($stmt2);
    // Set parameters
    mysqli_stmt_store_result($stmt2);
  
  
    mysqli_close($link);
}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Transform for Equity | An Antiracist Repair Group | Maryland</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!-- <link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="shortcut icon" href="../images/butterfly.png"> -->
        <!-- Site favicon -->
        <link rel="image" href="./assets/butterfly_icon.png">
        <!-- Normal style CSS -->
        <link rel="stylesheet" href="./assets/main.css">
        <!-- Profile style CSS -->
        <link rel="stylesheet" href="./assets/profile.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	

  </head>
	<body class="is-preload">
        <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="../index.html">Transform <span>For Equity</span> <img src="../assets/butterfly_icon.png" style="vertical-align: text-bottom; float: left;" height="30px"/></a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
        <nav id="menu">
			<ul class="links">
				<li><a href="./home.php">Home</a></li>
				<li><a href="./redirect_res.php">Resources</a></li>
				<li><a href="./redirect_prof.php" style="font-weight: 300;"><i class="fas fa-user" style="color: white; padding-right: 1px;"></i>&nbsp;Profile</a></li>
				<li><a href="./logout.php" style="font-weight: 300;"><i class="fas fa-sign-out-alt" style="color: white; padding-right: 1px;"></i>&nbsp;Logout</a></li>

			</ul>
		</nav>


        <!-- Banner -->
		<section>
			<div id="bannerMini" style="text-align: center;">
				<div class="svgMini">
						 <object style="width: 100%;" data="../static/T4E_banner_v2.svg"></object> 
				</div>
						<div class="inner">
							<header class="heading major">
								<h1>Profile</h1>
							</header>
						</div>
		
			</div>
		</section>

    		<!-- Profile Body -->
		      <section style="background-color: white;transform: (0,95%); clear: both;">
            <div class="container">
                  <div class="col-6 uxa-form-group mt-5" style="padding-bottom: 7.5%;">
              
                    <h1 class="text-center mt-5 mb-2">Deitra Reiser</h1>
                    <!-- single sentence description -->
              
                    <div class="uxa-user-avatar">
                      <img src="../static/profile_pic.jpg" alt="User avatar">
                    </div>
                    
                              
                  </div>
              </div>
            </section>

           

            <!-- Table Information  -->
              
            <section class="wrapper" style="background-color: white;transform: (0,95%); clear: both;">
              <div class="inner">
      
		<?php 
                $username = "duser"; 
                $password = "Leumas88!"; 
                $database = "test"; 
                $mysqli = new mysqli("192.168.137.1", $username, $password, $database); 
                $query = "SELECT * FROM users";


                echo '<table border="0" cellspacing="2" cellpadding="2"> 
                    <tr> 
                        <td> <font face="Arial">Value1</font> </td> 
                        <td> <font face="Arial">Value2</font> </td> 
                        <td> <font face="Arial">Value3</font> </td> 
                        <td> <font face="Arial">Value4</font> </td> 
                        <td> <font face="Arial">Value5</font> </td> 

                    </tr>';

                if ($result = $mysqli->query($query)) {
                    while ($row = $result->fetch_assoc()) {
                        $field1name = $row["id"];
                        $field2name = $row["email"];
                        $field3name = $row["password"];
                        $field4name = $row["created_at"];
                        $field5name = $row["status"];


                        echo '<tr> 
                                <td>'.$field1name.'</td> 
                                <td>'.$field2name.'</td> 
                                <td>'.$field3name.'</td> 
                                <td>'.$field4name.'</td> 
                                <td>'.$field5name.'</td> 

                            </tr>';
                    }
                    $result->free();
                } 
                ?>
	
            </div>
            </section>
         
 
            
            <!-- One -->
            <section class ="wrapper" style="background-color: white;transform: (0,95%);">
              <div class="inner">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <form class="mt-5 mb-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="field half">

                  <div class="form-group" style="padding-left: 2.5%; padding-right: 2.5%;">
                    <label>Account Email Address</label>
                    <input name="username" id="username" for="username" type="email" class="form-control"  placeholder="Enter email">
                  </div>
                </div>

                <div class="field half">
                  <label>Account Status</label>
                  <select name="acctStatus" id="acctStatus" for="acctStatus">
                    <option value="">- Select One -</option>
                    <option value="1">Active (1)</option>
                    <option value="0">Inactive (0)</option>
                  </select>
                  
                </div>				
                <section id="two" class="wrapper" style="z-index: 100; background-color: rgba(255,255,255,1); padding-bottom: 0%;">
                  <div id="main" class="wrapper">
                      <div class="inner">
      

      
                              <div >


                                    <input type="submit" class="button large primary"  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> value="Update Account Details">
 

                              </div>
                          </div>
                </form>

                  </div>
              </section>


              </form>
            </div>
            </section>


       
    



            <!-- BWB Banner Message -->
            <section id ="build" style="z-index: 100; background-color: rgba(255,255,255,1);">
                <div class="wrapper style1"  style="padding-bottom: 1.5%">
                    <div class="inner";>
                        <div class="features">
                            <div class="feature">
                                <header class="heading">
                                    <h2>Believe</h2>
                                </header>
                                <p>While growth requires discomfort, it also requires care and dignity.</p><br>
                            </div>
                            <div class="feature">
                                <header class="heading">
                                    <h2>Work</h2>
                                </header>
                                <p>The work of being antiracist has a beginning, it does not have an end.</p><br>
    
                            </div>
                            <div class="feature">
                                <header class="heading">
                                    <h2>Build</h2>
                                </header>
                                <p>The ripples of antiracist change can positively impact entire communities.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
        <!-- Footer -->
		<section id="footer">
			<div class="inner">
				<ul class="icons">
					<li><a href="http://www.linkedin.com/in/deitra-reiser-1aa71117" class="icon brands fa-linkedin"><span class="label">LinkedIn</span></a></li>
					<li><a href="https://www.instagram.com/transformforequity/" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="https://goo.gl/maps/wJLPuEocsqHvUBvR9" class="icon solid fa-map-marker-alt"><span class="label">Location</span></a></li>
					<li><a href="tel:+16672021586" class="icon solid fa-phone"><span class="label">Phone</span></a></li>
					<li><a href="mailto:info@transformforequity.com" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
				</ul>
			</div>
			<div class="copyright">
				&copy; Transform For Equity - All rights reserved. 
			</div>
			<div>
				<img src="./assets/butterfly_icon.png" style="vertical-align: text-bottom; float: center;" height="30px"/>
			</div>
		</section>
    
    
		<!-- Scripts -->
        <script src="../static/browser.min.js"></script>
        <script src="../static/breakpoints.min.js"></script>
        <script src="../static/util.js"></script>
        <script src="../static/main.js"></script>
        <script src="../static/script.js"></script>

        <script type="text/javascript" src="../static/main2.js"></script>
        <script src="../static/modernizr.js"></script>
        <script type="text/javascript" src="../static/jquery.js"></script>
        <script type="text/javascript" src="../static/bootstrap.js"></script>
        <script src="../static/velocity.min.js"></script>

    </body>
</html>