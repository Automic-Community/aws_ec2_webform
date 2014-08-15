<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Linux Server Request</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<link href="style.css" type="text/css" rel="stylesheet" />

<!-- Script and CSS links for Input Calendar -->
<script language="javascript" src="calendar/calendar.js"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css">

<script src="validate_form.js" language="javascript" type="text/javascript"></script>
  
</head>
<body id="main_body" >

	<table class="header">
		<tr>
		<td style="width:150px;text-align:left;padding-left:5px;padding-right:50px;"><img src="images/automic_web_logo.png" width="125px"/></td>
		<td style="text-align:left;width:125px;padding-right:50px;"><img src="images/redhat_logo.jpeg" width="100px"/></td>
		<td style="text-align:left;width:100%;"><p>Redhat Linux</p></td>
		</tr>
	</table>
	<div id="form_container">
		<form name="myForm" class="appnitro"  method="post" action="aws_submit_linux.php" onsubmit="return validateForm();">				
		<ul>
		<li>
		 <label class="description" for="formCostc">Cost Center
			<select class="element select email" name="formCostc"> 
				<option value="320101 - Product Development [EU]" selected="selected">320101 - Product Development [EU]</option>
				<option value="210102 - Product Build [EU]" >210102 - Product Build [EU]</option>
				<option value="210101 - Product Build [ROW]" >210101 - Product Build [ROW]</option>
				<option value="210100 - Product Build [US]" >210100 - Product Build [US]</option>
				<option value="320102 - Product Development [US]" >320102 - Product Development [US]</option>
				<option value="350102 - Product Support [EU]" >350102 - Product Support [EU]</option>
				<option value="350103 - Product Support [US]" >350103 - Product Support [US]</option>
				<option value="310102 - Product QA [EU]" >310102 - Product QA [EU]</option>
				<option value="310103 - Product QA [US]" >310103 - Product QA [US]</option>
				<option value="510123 - Marketing [US]" >510123 - Marketing [US]</option>
				<option value="510124 - Marketing [ROW]" >510124 - Marketing [ROW]</option>
				<option value="510122 - Marketing [EU]" >510122 - Marketing [EU]</option>
			</select>
			</label>
		</li>
				<li id="li_1">
				<li>
					<label class="description" for="formFname">First Name
					<input name="formFname" class="element text small" type="text" maxlength="100" value=""/>
					</label>
					
					<label class="description" for="formLname">Last Name
					<input name="formLname" class="element text small" type="text" maxlength="100" value=""/>		
					</label>
				</li>
				<li>
					<label class="description" for="formEmail">Email
					<input name="formEmail" class="element text email" type="text" maxlength="255" value=""/> 
					</label>
				</li>
				</li>
		
		<table border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td>
				<li id="li_2" >
					<li>
					<label class="description" for="formRegion">Region
					<select class="element select medsmall" name="formRegion"> 
						<option value="" selected="selected">Select...</option>
						<option value="eu-west-1" >EU (Ireland)</option>
						<option value="us-west-1" >Northern California</option>
						<option value="us-west-2" >Oregon</option>
						<option value="us-east-1" >North Virgina</option>
						<option value="sa-east-1" >South America (Sao Paulo)</option>
						<option value="ap-southeast-1" >Singapore</option>
						<option value="ap-southeast-2" >Sydney</option>
						<option value="ap-northeast-1" >Tokyo</option>
					</select>
					</label>
				</li>
				<br>
				<li>
				<label class="description" for="formCount">Number of Machines
					<select class="element select xsmall" name="formCount"> 
						<option value="1" selected="selected">1</option>
						<option value="2" >2</option>
						<option value="3" >3</option>
						<option value="4" >4</option>
						<option value="5" >5</option>
					</select>
				</label>
					<br>
					<br>
					<br>
						
				<span class="description" for="formSize">Size</span><br><br>
				<li>
					<input class="radio" type="radio" name="formSize" value="t1.micro" checked>1 CPU / .62 GB RAM (t1.micro)<br><br>
					<input type="radio" name="formSize" value="m1.small" >1 CPU / 1.7 GB RAM (m1.small)<br>
					<input type="radio" name="formSize" value="m3.medium" >1 CPU / 3.75 GB RAM (m3.medium)<br>
					<input type="radio" name="formSize" value="m3.large" >2 CPU / 7.5 GB RAM (m3.large)<br>
					<input type="radio" name="formSize" value="m3.xlarge" >4 CPU / 15 GB RAM (m3.xlarge)<br>
				</li>
				</li>
				</li>
				</td>
				<td>
					<span>Please choose end date for Instance(s):</span>
					<br>
				<?php
					require_once('calendar/classes/tc_calendar.php');

				
					$myCalendar = new tc_calendar("enddate");
					$myCalendar->setIcon("calendar/images/iconCalendar.gif");
					$myCalendar->setDate(date('d'),date('m'),date('Y'));
					$myCalendar->setPath("calendar/");
					$myCalendar->setYearInterval(2014, 2017);
					$myCalendar->dateAllow('2014-04-25', '2015-12-31',false);
					$myCalendar->setDateFormat('Y-m-d H:i:s');
					
				
					 //Tooltips
				/*
				  $myCalendar->setToolTips(array("2013-07-02", "2013-07-15", "2013-07-25"), 'ŞŢĂÎÂ şţăîâ אי אפשר test!', '');
				  $myCalendar->setToolTips(array("2013-06-06", "2013-06-01", "2013-06-05"), 'אי אפשר לבחור תאריך זה', 'month');
				  $myCalendar->setToolTips(array("1969-07-06", "2040-07-01", "2013-06-05")
															, 'Δεν επιτρέπετε η επιλογή αυτής της ημέρας', 'month');
				  $myCalendar->setToolTips(array("1969-07-06", "2040-07-01", "2013-06-05")
															, 'الإصدار الخاص بي ليس لديها الدعم للعام 2038 وفيما بعد!', 'month');
				  $myCalendar->setToolTips(array("1969-07-06", "2040-07-01", "2013-06-05"), 'の間の日付を選択してください', 'month');
				  $myCalendar->setToolTips(array("1969-07-06", "2040-07-01", "2013-06-05"), '올바르지 않은 값입니다', 'month');
				  $myCalendar->setToolTips(array("2013-06-06", "2013-06-11", "2013-06-15"), 'और बाद के वर्षों का समर्थन नहीं है!', 'month');
				  $myCalendar->setToolTips(array("2013-07-06", "2013-01-01", "2013-12-25"), 'วันนี้ไม่ได้รับอนุญาตให้มีการเลือก', 'year');
				  $myCalendar->setToolTips(array("2013-07-06", "2013-07-15", "2013-07-25"), '请选择日期%s之前一个', '');
				*/	
					$myCalendar->writeScript(); 
					?></td>
				<!-- 
				<td><input type="button" name="button" id="button" value="Check the value" onclick="javascript:alert(this.form.date2.value);" /></td>
				-->
			</tr>
		</table>

		<input class="button_text" type="submit" name="formSubmit" value="Submit" />
	</ul>
		</form>	
	</div>
	</body>
</html>
