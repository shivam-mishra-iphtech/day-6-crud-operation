<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $send_to = 'shivam.mishra@iphtechnologies.com';
    $subject = 'Contact Message';
    $f_name = htmlspecialchars(trim($_POST['first_name']));
    $l_name = htmlspecialchars(trim($_POST['last_name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));
    $mess = json_encode($message);

    if (empty($f_name) || empty($l_name) || empty($email) || empty($message)) {
        header("Location: newContact_form.php?status=error&msg=All fields are required!");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: newContact_form.php?status=error&msg=Invalid email format!");
        exit();
    }
    $sql="INSERT INTO contact_message (`f_name`, `l_name`, `email`, `phone`, `message`) VALUES('$f_name', '$l_name', '$email', '$phone' ,'$mess' )";
    $qry = mysqli_query($con, $sql);
    if(!$qry){
        header("Location: newContact_form.php?status=error&msg=Data not saved!!");
        exit();

    }
    $user_message = "
    <html>
    <head>
        <title>Contact Form Message</title>
    </head>
    <body>
        <p><strong>Name:</strong> $f_name $l_name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Message:</strong> $message</p>
    </body>
    </html>";

    // Headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // Send mail
    if (mail($send_to, $subject, $user_message, $headers)) {
        header("Location: newContact_form.php?status=success&msg=Message sent successfully!");
        exit();
    } else {
        header("Location: newContact_form.php?status=error&msg=Failed to send message.");
        exit();
    }
} else {
    header("Location: newContact_form.php?status=error&msg=Invalid request.");
    exit();
}

?>
