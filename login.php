<?php
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	#database
	$con = new mysqli("sql7.freemysqlhosting.net","sql7618289","khkmxlqkYy","sql7618289");
	if($con->connect_error){
		die("Nieudalo sie polaczyc: ".$con->connect_error);
	}else {
		$stmt = $con->prepare("select * from registration email where email = ?");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt_result=$stmt->get_result();
		if($stmt_result->num_rows>0){
			$data = $stmt_result->fetch_assoc();
			if($data['password'] ===$password){
				echo "<h2>Login udany</h2>";
			}else{
				echo "<h2>Nieprawidlowy login lub haslo</h2>";
			}
?>