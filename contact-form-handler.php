<?php

$errors = '';
$myemail = 'D00251856@student.dkit.ie';// <-----Put your DkIT email address here.
if(empty($_POST['fname'])  ||
   empty($_POST['lname'])  ||
   empty($_POST['email']) ||
   empty($_POST['phone']) ||
   empty($_POST['address'])  ||
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


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$address=$_POST['address'];
$admissions = $_POST['admissions'];
$gender =$_POST['gender'];
$message = $_POST['message'];
$updates = isset($_POST['updates']) ? $_POST['updates'] : '';
$birthdate = $_POST['birthdate'];
$resume = $_FILES['resume'];
$tuition_budget = $_POST['tuition_budget'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))

{
    $errors .= "\n Error: Invalid email address";
}
if (!preg_match('/^[0-9]{10}$/', $phone)) {
    $errors .= "\n Error: Invalid phone number";
}

if( empty($errors))
{
        $to = $myemail;
        $email_subject = "Contact form submission: $name";
        $email_body = "You have received a new message. ".
        " Here are the details:\n First Name: $fname \n Last Name: $lname \n Email: $email_address \nPhone: $phone \nAddress: $address \nBirthdate: $bithdate 
         \nAdmission Type: $admissions \nGender: $gender \nTuition Budget: $tuition_budget 
        \n Receive updates: $updates \n Message: \n $message  \n Resume:";

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
        $message = "--" . $boundary . "\r\n" .
                   "Content-Type: text/plain; charset=ISO-8859-1\r\n" .
                   "Content-Transfer-Encoding: 7bit\r\n\r\n" .
                   $message . "\r\n\r\n" .
                   "--" . $boundary . "\r\n" .
                   "Content-Type: " . $file_type . "; name=\"" . $file_name . "\"\r\n" .
                   "Content-Transfer-Encoding: base64\r\n" .
                   "Content-Disposition: attachment; filename=\"" . $file_name . "\"\r\n\r\n" .
                   $file_content . "\r\n\r\n" .
                   "--" . $boundary . "--";
    }

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