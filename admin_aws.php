<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<link href="style.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin AWS</title>

</head>

<body>

	<table class="header">
			<tr>
			<td><img src="images/aws-logo-cloud.png" width="100px"/></td>
			<td style="text-align:left"><p>All Requested Instances</p></td>
			</tr>
	</table>
	
	<div id="instance_table">
			<?php
			$serverName = "<servername>";
			$uid = "<user>";
			$pwd = "<password>";
	
			$connectionInfo = array( "UID"=>$uid,
									 "PWD"=>$pwd,
									 "Database"=>"<database name>");

			//connection to the database
			$conn = sqlsrv_connect($serverName, $connectionInfo);
				  if( $conn === false )
					{
						echo "Unable to connect.</br>";
						die( print_r( sqlsrv_errors(), true));
					}
			$connection2 = array ("UID"=>$uid,
								  "PWD"=>$pwd,
								  "Database"=>"v10");
			
			

			//declare the SQL statement that will query the database
			$query = "SELECT  [Requestor],[RunId],[Email],[Instance_Size],[AMI_Id],[Cost_Center],[AMI_OS],[Region],[Launch_Time],[Instance_Id],[Public_IP],[Request_Id],[ah_timestamp4], [Est_Dur], [OS], [Dollar],[Hour_A] FROM [E_Examples.SS_MVP]";
			
			
			
			$result = sqlsrv_query($conn, $query);
			if( $result === false )
			{
				 echo "Error in executing query.</br>";
				 die( print_r( sqlsrv_errors(), true));
			}
			
			$numRows = sqlsrv_num_rows($result);

			echo "<table border='1'>"; 
			echo "<tr><th style=\"width:150px;\">Instance Id</th><th style=\"width:175px;\">Cost Center</th><th style=\"width:100px;\">Size</th><th style=\"width:100px;\">Charges</th><th style=\"width:150px;\">Public IP</th><th style=\"width:150px;\">Launch Time</th><th style=\"width:100px;\">Region</th></tr>";
			while ( $row = sqlsrv_fetch_array ($result, SQLSRV_FETCH_ASSOC)) 
			{
				echo "<tr>";
				echo "<td>" . $row['Instance_Id'] . "</td> \n";
				echo "<td>" . $row['Cost_Center'] . "</td> \n";
				echo "<td>" . $row['Instance_Size'] . "</td> \n";
				$charges = $row['Dollar'] * $row['Est_Dur'];
				echo "<td>$" . $charges . "</td> \n"; 
				//echo "<td> tbd </td> \n";
				echo "<td>" . $row['Public_IP'] . "</td> \n";
				echo "<td>" . $row['Launch_Time'] . "</td> \n";
				echo "<td>" . $row['Region'] . "</td> \n";
				echo "</tr>";
			}
			echo "</table>";
						
			/* Free statement and connection resources. */
			sqlsrv_free_stmt( $result);
			sqlsrv_close( $conn);
			?>
			
	</div>
</body>
</html>
