<?php

		$varFname = $_POST['formFname'];
		$varLname = $_POST['formLname'];
		$varEmail = $_POST['formEmail'];
		$varRegion = $_POST['formRegion'];
		$varSize = $_POST['formSize'];
		$varCount = $_POST['formCount'];
		$varCostc = $_POST['formCostc'];
		
		$theDate=isset($_REQUEST["enddate"])?$_REQUEST["enddate"]:"";
		
			$fs = fopen("req_ec2_activate_object.txt","w");
			fwrite($fs, ":PUT_READ_BUFFER fname#='".$varFname. "' \r\n");
			fwrite($fs, ":PUT_READ_BUFFER lname#='".$varLname. "' \r\n");
			fwrite($fs, ":PUT_READ_BUFFER email#='".$varEmail. "' \r\n");
			fwrite($fs, ":PUT_READ_BUFFER region#='".$varRegion. "' \r\n");
			fwrite($fs, ":PUT_READ_BUFFER imagesize#='".$varSize. "' \r\n");
			fwrite($fs, ":PUT_READ_BUFFER amios#='Windows Server 2008 R2 Base' \r\n");
			fwrite($fs, ":PUT_READ_BUFFER min#='".$varCount. "' \r\n");
			fwrite($fs, ":PUT_READ_BUFFER max#='".$varCount. "' \r\n");
			fwrite($fs, ":PUT_READ_BUFFER keypair#='ONEcloud' \r\n");
			fwrite($fs, ":PUT_READ_BUFFER costcenter#='".$varCostc. "' \r\n");
			fwrite($fs, ":PUT_READ_BUFFER enddate#='".$theDate. "' \r\n");
			fwrite($fs, ":set &job#=activate_uc_object(SS_MVP.REQUEST_EC2_INSTANCE)". "\r\n");
			fwrite($fs, ":p &job#". "\r\n");
			fclose($fs);
			$output = shell_exec('req_ec2.bat');
			header("Location: thankyou_req_ec2.php"); 
			exit;
		
				


?>
