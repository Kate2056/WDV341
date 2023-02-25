

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Recieved!</title>
    <style>
        *{
            box-sizing:border-box;
        }
        h1{
            text-align:center;
        }
        .phpContainer{
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            text-align:center;
            margin:40px;
            box-shadow: 0 2px 16px rgba(155, 154, 154, 0.6);
        }
        .bannerContainer{
            position: relative;
            text-align: center;
            color: white;
            background-color:#4a3c38;
            border-radius:5px;
        }
        body{
            background-color:#e3e3e3;
        }
        .banner{
            border-radius:10px;
        }
        #backgroundImage{
            background-image: url(wood.png);
            opacity:1;
            padding:20px;
        }
        
    </style>
</head>
<body>
<div class="bannerContainer">
        <img class="banner" alt="A picture of desserts and coffee." src="coffeeDesserts.jpg">
        <header><h1>Contact Us</h1></header>
    </div>
    <div id="backgroundImage">
    
    <?php 
        $contactName = $_POST['contactName'];
        $emailAddress = $_POST['emailAddress'];
        $contactReason = $_POST['contactReason'];
        $comments = $_POST['comments'];
        $date = date_create();
        
        $fromEmail = "kaitlynbriggs@kaitlynbriggs.name";
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
	    $headers .= "From: $fromEmail" . "\r\n";

        $htmlContent = "
        <html>
        <body>
        <style>
        h1,h3{
            text-align:center;
            
        }
        .phpContainer{
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            text-align:center;
            margin:40px;
            box-shadow: 0 2px 16px rgba(155, 154, 154, 0.6);
        }
        .bannerContainer{
            position: relative;
            text-align: center;
            color: white;
            background-color:#4a3c38;
            border-radius:5px;
        }
        body{
            background-color:#e3e3e3;
        }
        .banner{
            border-radius:10px;
        }
        #backgroundImage{
            background-image: url(wood.png);
            opacity:1;
            padding:20px;
        }
        </style>
        <h3>Hello " . $contactName . "! </h3>
        <div id='backgroundImage'>
            <div class='phpContainer'>
                <p>Your reason for contacting us was " . $contactReason . ". </p>
                <p>You also left the following comments: " . $comments . ". </p>
            </div>
        </div>
        </body>
        </html>";
        
        $contactEmailMessage = "New Email Contact Form Entry: ";
        $contactEmailMessage .= "Contact Name: " . $contactName;
        $contactEmailMessage .= "Email Address: " . $emailAddress;
        $contactEmailMessage .= "Contact Reason: " . $contactReason;
        $contactEmailMessage .= "Comments: " . $comments;
        $contactEmailMessage .= "Date of Response: " . date_format($date, "m/d/Y");



        mail($emailAddress, "Contact Form Response", $htmlContent, $headers);
        mail("kaitlynbriggs99@gmail.com", "New Contact Form Response", $contactEmailMessage, $headers);

        //This email should be formatted using HTML and CSS.  It should look like it is from the same site as the form page. 
    ?>
    <h1>Thank you for contacting us!</h1>
    <div class="phpContainer">
    <?php
        echo "<p><strong>Your reason for contacting us was:</strong> " . $contactReason . " </p>";
        echo "<p><strong>You also left the following comments: </strong>" . $comments . " </p>";

    ?>
    </div>
</div>
</body>
</html>