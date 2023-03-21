<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Basic Form Handler Example</title>
<style>
	*{
		box-sizing:border-box;
	}
	.container	{
		width:600px;
		margin:auto;
		background-color:lightblue;	
		padding-left: 20px;
		padding:50px;
	}
	
	.container div	{
		font-size:larger;
		text-align:center;
	}
	
	


</style>
</head>

<body>

<?php
	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$selectedMajor = $_POST["selected_major"];
	$emailAddress = $_POST["email_address"];
	$comments = $_POST["comments"];
	$honeypotTest = $_POST["honeypot"];
	$comments = $_POST["comments"];

	if($honeypotTest == ""){
		echo "<div class='container'><div>Thank you " . $firstName . " " . $lastName . "!";
		echo "<br>";
		echo "Selected Major: " . $selectedMajor;
		echo "<br>";
		if(isset($_POST["contactProgramInfo"]) &&
		$_POST["contactProgramInfo"] == "yes"){
			echo "Recieve Program Information:" . $_POST["contactProgramInfo"];
		}else {
			echo "Recieve Program Information: No ";
		}
		echo "<br>";
		if(isset($_POST["contactProgramAdvisor"]) &&
		$_POST["contactProgramAdvisor"] == "yes"){
			echo "Share your Information with Program Advisor:" . $_POST["contactProgramAdvisor"];
		}else {
			echo "Share your Information with Program Advisor: No ";
		}
		echo "<br>";
		echo "Comments: " . $comments;
		echo "<br>";
		echo "A signup confirmation has been sent to " . $emailAddress . ". Thank you for your support!";
		echo "</div></div>";
		$message = "Thank you for contacting us, " . $firstName . $lastName . "! <br> Your selected major was: " . $selectedMajor . "<br> Your comments were: " . $comments ;
		mail($emailAddress, "Form Confirmation Email", $message);
	}else{
		echo "<div class='container'><div>Dear ".$firstName.", ";
		echo "<br>";
		echo "Thank for you for your interest in DMACC. ";
		echo "<br>";
		if(isset($_POST["academicStanding"])){
			$academicStanding = $_POST["academic_standing"];
			echo "We have you listed as an ".$academicStanding." starting this fall. ";
			echo "<br>";
		};
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
		echo "</div></div>";
	}
?>

</body>
</html>
