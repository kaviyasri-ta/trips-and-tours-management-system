<html>
<head>
<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  

  
  
<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="css/jquery.min.js"></script>
  <script src="css/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" type="text/css" href="style.css" />
  
</head>
<body>
<?php
include('HeaderAdmin.php');
include('Db.php');	


	$query= mysql_query("SELECT coalesce(max(sno),0)+1  as cnt FROM Transport", $con);
	$row = mysql_fetch_array($query);
	$Id="T" . sprintf("%03d",$row['cnt']);
	

?>
	
	<center>
		<h4>PAYMENT DETAILS</h4>
	</center>

	<form action="ViewPaymentCode.php" method="post" enctype="multipart/form-data">
	
		<center>
	<table border='1' cellspacing='0' class="table table-bordered table-hover table-striped table-condensed;">
		<!--
		<tr>
			<th>Package Id</th>
			<th>Package Name</th>
			<th>Places of Vist</th>
			<th>Duration</th>
			<th>Fare</th>
			<th>Description</th>
				<th>Includes Food</th>
			<th>Image</th>
		<th>Delete</th>
		</tr>
		-->
		<?php
		$query= mysql_query("Select A.BookingCode,A.EntryDate,C.CustomerCode,B.CustomerName,C.ScheduleCode,C.SeatsRequired,C.Status,A.Amount,A.Mode,A.Description From Payment A,CustomerTable B,Booking C Where A.BookingCode=C.BookingCode and C.CustomerCode=B.CustomerCode ", $con);
		
		while ($row = mysql_fetch_array($query))
		{
			echo "<table class='table table-hover table-bordered table-striped' style='width:60%'>";
			
			echo "<tr>";
			echo "<tr><td style='width:250px' align='left'>Booking Code</td><td align='left' valign='middle'>" . $row['BookingCode'] . "</td>";
			echo "<td style='font-size:22px' align='left'>Entry Date</td><td align='left'  valign='middle' style='font-size:22px'>" . $row['EntryDate'] . "</td></tr>";
			
			
			echo "<tr><td align='left'>Customer Code</td><td align='left' valign='middle'>" . $row['CustomerCode'] . "</td>";
			echo "<td align='left'>Customer Name</td><td align='left'  valign='middle'>" . $row['CustomerName'] . " " . "</td></tr>";
				echo "<tr><td align='left'>Schedule Code</td><td align='left'  valign='middle'>" . $row['ScheduleCode'] . "</td><td align='left'>Seats Required</td><td align='left'  valign='middle'>" . $row['SeatsRequired'] . "</td></tr>";
			
			echo "<tr><td align='left'>Status</td><td align='left'  valign='middle'>" . $row['Status'] ."</td>";
			echo "<td align='left'>Mode</td><td align='left'  valign='middle'>" . $row['Mode'] ."</td>";
			echo "</tr>";
			echo "<tr><td align='left' style='color:green;font-weight:bold;font-size:16px'>Amount</td><td align='left'  valign='middle' style='color:green;font-weight:bold;font-size:18px'>" . $row['Amount'] ."</td>";
			echo "<td align='left' style='color:green;font-weight:bold;font-size:16px'>Description</td><td align='left'  valign='middle' style='color:green;font-weight:bold;font-size:18px'>" . $row['Description'] ."</td></tr>";
			
		//	echo "<tr><td colspan='2'><input type='submit' name='" . $row['ScheduleCode'] . "' value='Book >>' class='btn_submit' /></td></tr>";
		}
		
	?>
		
		</table>
		</center>
	</form>


</body>
</html>