<?php
session_start();
include('Header.php');
	
	
	
	
	$EmailID = $_POST["txtUsername"];
	$Password = $_POST["txtPassword"];
	
	$query= mysql_query("Select Count(*) as data From CustomerTable Where EmailID = '". $EmailID ."' and Password = '". $Password ."' ", $con);
		$row = mysql_fetch_array($query);
	
	/* if($row['data']==1){ */

		$query= mysql_query("Select CustomerCode From CustomerTable Where EmailID = '". $EmailID ."' ", $con);
		$row = mysql_fetch_array($query);
		$CusCode = $row['CustomerCode'];

		$_SESSION["username"] = $CusCode;
		$_SESSION["customerid"] = $CusCode;
		$_SESSION["usertype"]= "customer";

		if(isset($_SESSION['ScheduleCode'])){
			header('location:AddBooking.php');
		}
		else{
			header('location:ViewPackage.php');
		}

	/* }
	else
	{
        header('location:LoginCustomer.php');
	} */

	mysql_close($con);
?>