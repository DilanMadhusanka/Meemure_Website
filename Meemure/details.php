<?php 
	$conn = new mysqli('localhost', 'root', '', 'meemure');
	if($conn->connect_error) {
		echo "Connection Failed".$conn->connect_error;
	}
	else {
		echo "Connected Succesfully!";
	}
	
	$name = $email = $message = '';
	
	if(isset($_POST['submit'])) {
		$name = $_POST['fname'];
		//$address = $_POST['address'];
		$email = $_POST['email'];
		//$nic = $_POST['nic'];
		$message = $_POST['message'];
		
		$sql = "INSERT INTO customer_details (name, email, message) VALUES ('$name', '$email', '$message')";
		
		if(mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		}
		else {
			echo "Error".$sql. "<br>". mysqli_error($conn);
		}
		//echo $name.' '.$email.' '.$address;
		mysqli_close($conn);
	}
	//mysqli_close($conn);

 ?>