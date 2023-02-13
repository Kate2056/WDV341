<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Basic Form Handler Example</title>
</head>

<body>

<?php
	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$academicStanding = $_POST["academic_standing"];
	$selectedMajor = $_POST["selected_major"];
	$emailAddress = $_POST["email_address"];
	$comments = $_POST["comments"];


	$comments = $_POST["comments"];

	echo "Dear ".$firstName.", ";
	echo "<br>";
	echo "Thank for you for your interest in DMACC. ";
	echo "<br>";
	echo "We have you listed as an ".$academicStanding." starting this fall. ";
	echo "<br>";
	echo "You have declared ".$selectedMajor." as your major. ";
	echo "<br>";
	echo "Based upon your responses we will provide the following information in our confirmation email to you at ".$emailAddress.". ";
	echo "<br>";
	if(isset($_POST["contactProgramInfo"]) &&
		$_POST["contactProgramInfo"] == "yes"){
			echo "We will contact you with Program Information. ";
		}else {
			echo "We will not contact you with Program Information. ";
		}
	echo "<br>";
	if(isset($_POST["contactProgramAdvisor"]) &&
		$_POST["contactProgramAdvisor"] == "yes"){
			echo "We will connect you with a Program Advisor. ";
		}
		else{
			echo "We will not connect you with a Program Advisor. ";
		}
	echo "<br>";
	echo "You have shared the following comments which we will review:	";
	echo "<br>";
	echo $comments;

?>

</body>
</html>
