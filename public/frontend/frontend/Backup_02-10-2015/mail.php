<?php 

$firstname = $_POST['persontname'];
$lastname = $_POST['companyname'];
$address = $_POST['address'];
$town = $_POST['city'];
$country = $_POST['country'];
$postcode = $_POST['pincode'];
$postcode = $_POST['fax'];
$postcode = $_POST['mobile'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$views = $_POST['views'];

$msg = "Feedback Form Submitted at Swastik Tools and Engineering Works \n\n";
$msg .= "First Name:\t$persontname\n\n";
$msg .= "Last Name:\t$companyname\n\n";
$msg .= "Address:\t$address\n\n";
$msg .= "Town:\t$city\n\n";
$msg .= "Country:\t$country\n\n";
$msg .= "Postcode:\t$pintcode\n\n";
$msg .= "Postcode:\t$fax\n\n";
$msg .= "Postcode:\t$mobile\n\n";
$msg .= "Telephone:\t$telephone\n\n";
$msg .= "E-Mail:\t$email\n\n";
$msg .= "Views:\t$views\n\n";

$recipient = "info@eaglecarpentrytools.com";

$subject = "Feedback Form Submitted at Swastik Tools and Engineering Works";

$mailheaders = "From:$email";
//$mailheaders .= "Reply-To:$email";

mail($recipient, $subject, $msg, $mailheaders);
header("Location: http://www.eaglecarpentrytools.com");
?> 
