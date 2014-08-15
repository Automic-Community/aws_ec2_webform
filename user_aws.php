<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<link href="style.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>User AWS</title>

</head>

<body>

	<table class="header">
			<tr>
			<td><img src="images/aws-logo-cloud.png" width="100px"/></td>
			<td style="text-align:left"><p>Requested Instances</p></td>
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


			//declare the SQL statement that will query the database
			$query = "Select distinct(ah_idnr) as RunId,";
				$query .= "((select AV_Value from AV where AV_VName='&fname#' and AV_AH_Idnr=ah_idnr) + ' ' + (select AV_Value from AV where AV_VName='&lname#' and AV_AH_Idnr=ah_idnr)) as Requestor,";
				$query .= "(select AV_Value from AV where AV_VName='&email#' and AV_AH_Idnr=ah_idnr) as Email,";
				$query .= "(select AV_Value from AV where AV_VName='&ami_id#' and AV_AH_Idnr=ah_idnr) as AMI_Id, ";
				$query .= "(select AV_Value from AV where (AV_Vname='instanceid#' or AV_Vname='&instanceid#') and AV_AH_Idnr=ah_idnr) as Instance_Id, ";
				$query .= "(select AV_Value from AV where AV_Vname='&costcenter#' and AV_AH_Idnr=ah_idnr) as Cost_Center ";
				$query .= "from ah,av "; 
				$query .= "where ah_idnr=av_ah_idnr and ";  
					$query .= "ah_oh_idnr in (select oh_idnr from OH where OH_Name='AMI_OS_TYPE') and "; 
					$query .= "ah_status=1900 ";
				$query .= "order by ah_idnr";
	
			
			$result = sqlsrv_query($conn, $query);
			if( $result === false )
			{
				 echo "Error in executing query.</br>";
				 die( print_r( sqlsrv_errors(), true));
			}
			
			$numRows = sqlsrv_num_rows($result);

			echo "<table border='1'>"; 
			echo "<tr><th style=\"width:150px;\">Instance Id</th><th style=\"width:175px;\">Requestor</th><th style=\"width:200px;\">Email</th><th style=\"width:150px;\">RunId</th><th style=\"width:150px;\">AMI Id</th></tr>";
			while ( $row = sqlsrv_fetch_array ($result, SQLSRV_FETCH_ASSOC)) 
			{
				echo "<tr>";
				echo "<td>" . $row['Instance_Id'] . "</td> \n";
				echo "<td>" . $row['Requestor'] . "</td> \n";
				echo "<td>" . $row['Email'] . "</td> \n";
				echo "<td>" . $row['RunId'] . "</td> \n";
				echo "<td>" . $row['AMI_Id'] . "</td> \n";
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
