<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phoneNo = $_POST['phoneNo'];
$gender = $_POST['gender'];
$bloodg = $_POST['bloodg'];
$height = $_POST['height'];
$weight = $_POST['weight'];

/*Establishing connection with the database*/
$conn = new mysqli('localhost','root','','reg_details');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(fname, lname, phoneNo, gender, bloodg, height, weight) values(?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("ssissii", $fname, $lname, $phoneNo, $gender, $bloodg, $height, $weight);
		$execval = $stmt->execute();
		echo $execval;
		echo "Thank You For Your Registration. Your Data Has Been Succesfully Recorded";
		$stmt->close();
		$conn->close();
	}

?>