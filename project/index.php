<?php 
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
 
// Include config file
require_once "init.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
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
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: dashboard.php");
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
            $stmt->close();
        }
    }
    
    // Close connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hospital Management System</title>
	<meta name="Description" content="This is MIS For Hospital Management System" charset="utf-8">
	<meta name="Obaid Samim" content="Software Developer">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/bootstrap/bootstrap/css/bootstrap.min.css">
	<style>
	.class{}
	#id{}
	</style>
</head>
<body>
	<!-- Begin End Section of Header -->
		<section>
		<div class="container-fluid">
			<div class="row" id="myHeader">
      			<div class="col-sm-3" style="background-color:lightgreen;">
      			<div>
				<img class="rounded" src="images/logo.png" width="80" height="120" alt="Company logo">
				</div>
				</div>
      			<div class="col-sm-9" style="background-color:lightgreen;">
				<div>		
				<h3 class="display-3">Ibne Sina Hospital</h3>
				</div>
				</div>
			</div>
		</div>

		<!--
		<ul>
	  	<li><a class="active" href="#home">Home</a></li>
	  	<li><a href="#news">News</a></li>
	 	<li><a href="#contact">Contact</a></li>
	 	<li><a href="#about">About</a></li>
		</ul>-->
	<!--<div class="dropdown">
  <button class="dropbtn">Menu</button>
  <div class="dropdown-content">
  <a href="#">Link 1</a>
  <a href="#">Link 2</a>
  <a href="#">Link 3</a>
  </div></div>-->
  
  		</section>
	<!-- End Section of Header -->

	<!-- Begin End Section of Main -->
	<section> 
		<div class="container-fluid"><br />
			<div class="nav nav-tabs" class="row">
			<div class="btn-group">
			    <button type="button" class="btn btn-success">Menus</button>
			    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
			    </button>
			    <div class="dropdown-menu">
			      <a class="dropdown-item" href="#">About</a>
			      <a class="dropdown-item" href="#">About2</a>
			    </div>
			    <a class="nav-link" data-toggle="tab" href="#menu1">Services</a>
			  	</div>
			  	</div>
				<div class="row">
				<div class="col-sm-4"><br /> 
			<div style="margin-right: auto; margin-left: auto;" class="card text-white bg-danger mb-3" style="max-width: 20rem;">
				  <div class="card-header">Messages from Principal <span class="badge badge-success">4</span></div>
				  <div class="card-body">
 				  <h5>Sun 6 Jun Holiday <span class="badge badge-pill badge-success">New</span></h5>
				  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				  </div>
			</div>
		</div>
				<!--<div class="col-sm-4"> 
				<div><p id="ser_box">Principle Masseges:</p></div>
				</div>-->
			<div class="col-sm-4"><br /> 
			<div class="container">
				<div class="card-header">
					<p style="font-size: 20px;">Please fill in your credentials to login!</p>
			  </div>
		        <?php 
		        if(!empty($login_err)){
		            echo '<div class="alert alert-danger">' . $login_err . '</div>';
		        }        
		        ?>
			  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			    <div class="form-group">
			      <label for="text">Username:</label>
			      <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
			    </div>
			    <div class="form-group">
			      <label for="pwd">Password:</label>
			      <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
			    </div>
			    <div class="form-group form-check">
			      <label class="form-check-label">
			        <input class="form-check-input" type="checkbox" name="remember"> Remember me
			      </label>
			    </div>
			    <button type="submit" value="Login" class="btn btn-success btn-block">Submit</button>
			  </form>
			</div>

			</div>
				<div class="col-sm-4"><br /> 
			<div style="margin-right: auto; margin-left: auto;" class="card border-success mb-3" style="max-width: 20rem;">
			  <div class="card-header">Service Provides</div>
			  <div class="card-body">
			    <h4 class="card-title">Specially Provided By Hospital</h4>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div>
				<!--<div><p id="ser_box">Services:</p></div>-->
				</div>
			</div>
		 <!--<div class="alert alert-warning alert-dismissible fade show">
   		 <button type="button" class="close" data-dismiss="alert">&times;</button>
    	<strong>Warning!</strong> This alert box could indicate a warning that might need attention.
 		</div>-->
		</div>
		<!--
		<h2>Top Tooltip w/ Bottom Arrow</h2>
		<div class="tooltip1">Hover over me
  		<span class="tooltiptext1">Tooltip text</span>
		</div>
		
		<video width="400" controls>
  		<source src="mov_bbb.mp4" type="video/mp4">
  		<source src="mov_bbb.ogg" type="video/ogg">
  		Your browser does not support HTML5 video.
		</video>-->
 		
		<!--<p id="demo">this is my html</p>
		<button type="button" onclick='document.getElementById("demo").innerHTML="HellO JavaScript"'>Button</button>-->
	</section>
	<!-- End Section of Main -->

	<!-- Begin End Section of footer -->
	<section>
		<div id="time">
		<p class="uppercase"><em id="date"></em> username developed by obaid samim at sonware</p>
		</div>
		<!--
		<div class="polaroid">
  		<img src="images/logo.png" alt="Norway" style="width:100%">
  		<div class="container">
   		 <p>Hardanger, Norway</p>
  		</div>-->
	</section>
	<!-- End Section of footer -->
	<!--the JavaScript here -->
	<script src="assets/bootstrap/jquery/jquery.min.js"></script>
  	<script src="assets/bootstrap/proper.js/popper.min.js"></script>
  	<script src="assets/bootstrap/bootstrap/js/bootstrap.min.js"></script>
 	<script>
	var dater = new Date();
	document.getElementById("date").innerHTML = dater.toDateString();
 	</script>
</body>
</html>