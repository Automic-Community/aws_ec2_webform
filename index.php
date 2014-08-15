
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
	<link href="bootstrap.css" type="text/css" rel="stylesheet" />
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row-fluid">
				<div class="span4">
					<img src="images/automic_web_logo.png" style="margin-top:10px;" width="125px"/>
				</div>
				<div class="span4">
					
				</div>
				<div class="span4">
					
				</div>
			</div>
		</div>
	</div>
	<span id="main">
		
		
		
		<div class="container">
			<div class="row-fluid">
				<div class="span12">
					<img src="images/aws-logo-cloud.png" width="100px"/><h2 style="text-align: center; font-size:40px; margin-bottom:40px;">VM Provisioning</h2>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span9">
					<div class="row-fluid border">
						<div class="span9">
							<img style="background-color: #EEEEEE;float: left; margin-right: 20px; padding: 8px;" src="images/Windows_server_logo.jpg" width="100px"/>
							<h2>Windows Server 2008 R2</h2>
							<p>Microsoft Windows Server 2008 R2, 64 bit </p>
						</div>
						<div class="span3">
							<button onclick="openWin()">Launch</button>
							<script>
								var myWindow;
								function openWin(){
									myWindow = window.open("windows_req_EC2_instance.php","_blank","width=600,height=800");
								}
							</script>
						</div>
					
					</div>
					<div class="row-fluid border">
						<div class="span9">
							<img style="background-color: #EEEEEE;float: left; margin-right: 20px; padding: 8px;" src="images/redhat_logo.jpeg" width="100px"/>
							<h2>Redhat Linux 6.4</h2>
							<p>Redhat Enterprise Linux 6.4, 64 bit</p>
						</div>
						<div class="span3">
							<button onclick="openWinLinux()">Launch</button>
							<script>
								var myWindow;
								function openWinLinux()
									{
										myWindow = window.open("rhel_req_EC2_instance.php","_blank","width=600,height=800");
									}
							</script>
						</div>
			
					</div>
				</div>
				
				<div class="span3">
					
					<form name="cost_cal" method="post" target="_blank" action="cost_calculator.php">
						
						<h3>Cost Calculator</h3>
						<div>
						
							<input style="width: 50px; margin-top:20px;" placeholder="# days" class="days element text hours" name="formDays" type="text">
							<input class="button_cal" type="submit" name="WinCost" value="Calculate" />
						</div>
					</form>
					
				</div>
			</div>
		</div>

	<!-- Foooooter Area   -->
	
	<div id="footer">
		<div>
		<button onclick="openStats()">View Requested Instances by User</button>
		<script>
		var myStats;
					function openStats()
						{
							myStats = window.open("user_aws.php","_blank","width=900,height=550");
						}
		</script>
		
		<button onclick="openAdminStats()">View All Requested Instance Details</button>
		<script>
		var myAdminStats;
					function openAdminStats()
						{
							myAdminStats = window.open("admin_aws.php","_blank","width=1250,height=550");
						}
		</script>
		</div>
	</div>
</body>
</html>
