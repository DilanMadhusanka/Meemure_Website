<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" type="text/css" href="css/style-contactUs.css">
</head>
<body>
	<div class="wrapper">
		<header>
        	<img src="images/3.jpg" alt="">
        </header>
        
        <div class="text">
        	<h2>Sri Lankan Beautiful Nature</h2>
        </div><!--text-->
        
        <div class="navigation-bar">
        	<ul>
            	<li><a href="home.html">|Home|</a></li>
                <li><a href="about.html">|About Meemure|</a></li>
                <li><a href="contactUs.php">|Contact us|</a></li>
            </ul>
        </div><!--navigation-bar-->
        
        <div class="home-body">
        	<img src="images/8.jpg" alt="">
        </div><!--home-body-->

        <div class="body-content">
        	<h2>Request tour prices, availability, booking instruction or ask us a question</h2>
        	<div class="form">
        		<fieldset>
        			<legend>Personal Information</legend>
        			<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        				Title: <br>
        					<input type="radio" name="title" value="Mr"> Mr
        					<input type="radio" name="title" value="Mrs"> Mrs <br>
        				Name: <br>
        					<input type="text" name="fname"> <br>
        				Email: <br>
        					<input type="text" name="email"> <br>
        				Message: <br>
        					<textarea name="message">Message..</textarea> <br>
        				<button type="submit" name="submit">Send Message</button>
        			</form>
        		</fieldset>
        	</div><!--form-->
        	
        </div><!--body-content-->
	</div><!--wrapper-->
</body>
</html>


<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'meemure');
    if($conn->connect_error) {
        echo "Connection Failed".$conn->connect_error;
    }
    else {
        echo "Connected Succesfully!";
    }
    
    $name = $title = $email = $message = '';
    
    if(isset($_POST['submit'])) {
        $name = $_POST['fname'];
        $title = $_POST['title'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO customer_details (name, title, email, message) VALUES ('$name', '$title' ,'$email', '$message')";
        
        if(mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        }
        else {
            echo "Error".$sql. "<br>". mysqli_error($conn);
        }
        mysqli_close($conn);
        header('location:contactUs.php');
        exit;
    }

 ?>