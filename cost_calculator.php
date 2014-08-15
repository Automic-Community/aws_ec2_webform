<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<link href="style.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Cost Calculator</title>

</head>

<body>

	<table class="header">
			<tr>
			<td><img src="images/aws-logo-cloud.png" width="100px"/></td>
			<td style="text-align:left"><p>Cost Calculator</p></td>
			</tr>
	</table>

<div id="cost_cal">
	<div style="padding-bottom:10px;">
	<?php
	  $days = (isset($_POST['formDays'])? $_POST['formDays'] : null);
	echo "<h2>Estimated Cost for ". $days. " days. </h2> \n";
	?>
	</div>

	<div style="display:inline-block;">
		<h2>Windows</h2>
		<table border="1" style="text-align:center;">
			<tr>
			<th>Size</th>
			<th>Description</th>
			<th>Estimated Cost</th>
			</tr>

			<?php

			$days = (isset($_POST['formDays'])? $_POST['formDays'] : null);
			//$days = 5;

			echo "<tr> \n";
			echo "<td>t1.micro</td> \n";
			echo "<td>1 CPU / .62 GB RAM</td> \n";
			$win1 = round((($days * 24) * .020),2);
			echo "<td> $" . $win1 . "</td> \n";
			echo "</tr> \n";
			echo "<tr> \n";
			echo "<td>m1.small</td> \n";
			echo "<td>1 CPU / 1.7 GB RAM</td> \n";
			$win2 = round((($days * 24) * .075),2);
			echo "<td> $" . $win2 . "</td> \n";
			echo "</tr> \n";
			echo "<tr> \n";
			echo "<td>m3.medium</td> \n";
			echo "<td>1 CPU / 3.75 GB RAM</td> \n";
			$win3 = round((($days * 24) * .133),2);
			echo "<td> $" . $win3 . "</td> \n";
			echo "</tr> \n";
			echo "<tr> \n";
			echo "<td>m3.large</td> \n";
			echo "<td>2 CPU / 7.5 GB RAM</td> \n";
			$win4 = round((($days * 24) * .266),2);
			echo "<td> $" . $win4 . "</td> \n";
			echo "</tr> \n";
			echo "<tr> \n";
			echo "<td>m3.xlarge</td> \n";
			echo "<td>4 CPU / 15 GB RAM</td> \n";
			$win5 = round((($days * 24) * .532),2);
			echo "<td> $" . $win5 . "</td> \n";
			echo "</tr> \n";

			?>

		</table>
	</div>
	
		<div style="display:inline-block;padding-left:25px;">
		<h2>Linux</h2>

		<table border="1" style="text-align:center;">
			<tr>
			<th>Size</th>
			<th>Description</th>
			<th>Estimated Cost</th>
			</tr>
			<?php

			$days = (isset($_POST['formDays'])? $_POST['formDays'] : null);
			//$days = 1;


			echo "<tr> \n";
			echo "<td>t1.micro</td> \n";
			echo "<td>1 CPU / .62 GB RAM</td> \n";
			$linux1 = round((($days * 24) * .080),2);
			echo "<td> $" . $linux1 . "</td> \n";
			echo "</tr> \n";
			echo "<tr> \n";
			echo "<td>m1.small</td> \n";
			echo "<td>1 CPU / 1.7 GB RAM</td> \n";
			$linux2 = round((($days * 24) * .104),2);
			echo "<td> $" . $linux2 . "</td> \n";
			echo "</tr> \n";
			echo "<tr> \n";
			echo "<td>m3.medium</td> \n";
			echo "<td>1 CPU / 3.75 GB RAM</td> \n";
			$linux3 = round((($days * 24) * .130),2);
			echo "<td> $" . $linux3 . "</td> \n";
			echo "</tr> \n";
			echo "<tr> \n";
			echo "<td>m3.large</td> \n";
			echo "<td>2 CPU / 7.5 GB RAM</td> \n";
			$linux4 = round((($days * 24) * .200),2);
			echo "<td> $" . $linux4 . "</td> \n";
			echo "</tr> \n";
			echo "<tr> \n";
			echo "<td>m3.xlarge</td> \n";
			echo "<td>4 CPU / 15 GB RAM</td> \n";
			$linux5 = round((($days * 24) * .340),2);
			echo "<td> $" . $linux5 . "</td> \n";
			echo "</tr> \n";

			?>
		</table>
	</div>
</div>

<div id="footer">
<button onclick="CloseWindow()">Close Window</button>
	 <script text="text/javascript">
		function CloseWindow()
			{
				window.close();
			}
	</script>
</div>
</body>
</html>

