<?php

$errors = '';
$myemail = 'D00251856@student.dkit.ie';// <-----Put your DkIT email address here.
if(empty($_POST['fname'])  ||
   empty($_POST['lname'])  ||
   empty($_POST['email']) ||
   empty($_POST['phone']) ||
   empty($_POST['birthdate']) ||
   empty($_FILES['resume']) ||
   empty($_POST['admissions']) ||
   empty($_POST['gender']) ||
   empty($_POST['updates']) ||
   empty($_POST['tuition_budget']) ||
   empty($_POST['message']))

{
    $errors .= "\n Error: all fields are required";
}

// Important: Create email headers to avoid spam folder
$headers .= 'From: '.$myemail."\r\n".
    'Reply-To: '.$myemail."\r\n" .
    'X-Mailer: PHP/' . phpversion();


// $fname = $_POST['fname'];
// $lname = $_POST['lname'];
// $email_address = $_POST['email'];
//$phone = $_POST['phone'];
//$address=isset($_POST['address']) ? $_POST['address'] : 'No address.';
//$admissions = $_POST['admissions'];
//$gender =$_POST['gender'];
//$message = $_POST['message'];
//$updates = isset($_POST['updates']) ? $_POST['updates'] : '';
//$birthdate = $_POST['birthdate'];
//$resume = $_FILES['resume'];
//$tuition_budget = $_POST['tuition_budget'];

$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
$email_address = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
if ($address === null) {
    $address = 'No address.';
}
$admissions = filter_input(INPUT_POST, 'admissions', FILTER_SANITIZE_STRING);
$gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING );
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
$updates = filter_input(INPUT_POST, 'updates', FILTER_SANITIZE_STRING);
if ($updates === null) {
    $updates = 'No updates.';
}
$birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_STRING);
$resume = $_FILES['resume'];
$tuition_budget = filter_input(INPUT_POST, 'tuition_budget', FILTER_SANITIZE_NUMBER_INT);


if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))

{
    $errors .= "\n Error: Invalid email address";
}
if (!preg_match('/^[0-9]{10}$/', $phone)) {
    $errors .= "\n Error: Invalid phone number";
}
if (!preg_match("/^[a-z ,.'-]+$/i", $fname)) {
    $errors .= "\n Error: Invalid First name";
}
if (!preg_match("/^[a-z ,.'-]+$/i", $lname)) {
    $errors .= "\n Error: Invalid Last name";
}

if( empty($errors))
{
        $to = $myemail;
        $email_subject = "Contact form submission: $name";
        $initMessage = "You have received a new message. ".
        " Here are the details:\n First Name: $fname \n Last Name: $lname \n Email: $email_address \nPhone: $phone \nAddress: $address \nBirthdate: $birthdate 
         \nAdmission Type: $admissions \nGender: $gender \nTuition Budget: $tuition_budget 
        \n Receive updates: $updates \n Message: \n $message  \n Resume:please see the attachment.";

         // Attach resume file if uploaded
    if (isset($resume) && $resume['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['resume']['tmp_name'];
        $file_name = $_FILES['resume']['name'];
        $file_type = $_FILES['resume']['type'];
        $file_size = $_FILES['resume']['size'];
        $file_content = file_get_contents($file);
        $file_content = chunk_split(base64_encode($file_content));
        $boundary = md5(time());
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: multipart/mixed; boundary="' . $boundary . '"' . "\r\n";
        $email_body = "--" . $boundary . "\r\n" .
                   "Content-Type: text/plain; charset=ISO-8859-1\r\n" .
                   "Content-Transfer-Encoding: 7bit\r\n\r\n" .
                   $initMessage . "\r\n\r\n" .
                   "--" . $boundary . "\r\n" .
                   "Content-Type: " . $file_type . "; name=\"" . $file_name . "\"\r\n" .
                   "Content-Transfer-Encoding: base64\r\n" .
                   "Content-Disposition: attachment; filename=\"" . $file_name . "\"\r\n\r\n" .
                   $file_content . "\r\n\r\n" .
                   "--" . $boundary . "--";
        
     }
    //   else {
    //     $email_body = $initMessage;
    // }

        mail($to,$email_subject,$email_body,$headers);
        //redirect to the 'thank you' page
        header('Location: contact-form-thank-you.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
        <title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>
</body>
</html>