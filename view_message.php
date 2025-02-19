<?php

require 'db_connection.php';
require 'header_navbar.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

$sql = "SELECT * FROM contact_message WHERE `id` = '$id'";
$qry = mysqli_query($con, $sql);
if (!$qry) {
    header("Location: messageList.php?status=error&msg=Message not found !..");
    exit();
}
else{
    $row = mysqli_fetch_assoc($qry);
}
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
    <style>
        body{
            margin:0px;
            padding:0px;
            font-family:sans-serif;
        }
        
        .message-form h1 {
            text-align: center;
        }
        .paragraph{
            text-align: center;
            border-bottom:2px solid skyblue;
            padding-bottom:20px;
            width:97%;
        }
        .message-form {
            width: 100%;
            max-width:600px;
            margin: -80px auto;
            background: #fff;
            padding: 10px 10px 10px 32px;
            box-shadow: 0 0 20px rgba(10, 10, 11, 0.4);

        }
        .header{
            width: auto;
            text-align:center;
            background: skyblue;
            height: 250px;
        }
        .media-icon {
            margin-top:60px;
            text-align:center;
            padding:10px;
            

        }
        .media-icon i{
            margin-top:10px;
            padding:20px;
            font-size:20px;
            font-weight:100;
            color:skyblue;

        }
        .media-icon i:hover{
            color:#0d3c4c;
        }
       
        
        @media only screen and (max-width: 1000px  min-width:300px) {
            .header{
                width:100%;
                height:30vh;
            }
            .message-form {
                max-width: 500px !important;
                padding: 0px !important;
                margin: -60px auto;
                width:100%; 
                /* max-width:400px; */

            }

        }
        @media only screen and (max-width: 650px) {
            .header{
                width:100%;
                max-width:100% !important;
                height:20vh;
            }
            .message-form {
                max-width: 500px !important;
                padding: 0px !important;
                margin: -60px auto;
                width:100%; 
                /* max-width:400px; */

            }
        }
        .message {
            text-align: center;
            border-bottom:2px solid skyblue;
            padding-bottom:10px;
            width:97%;

        }
        .close{
            text-align:end;
            font-size:24px;
            font-weight:600;
            padding:0px;
            color:darkgray;

        }
        .close :hover{
            color:red;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header"></div>
        <div class="message-form">
            <div class="close">
                <a href="messageList.php"><i class="fa-solid fa-xmark"></i></a>
            </div>
            <h1>User Message</h1>
            <p class="paragraph">Hello user please leaved your query</p>
            <div>
            <?php if($row){  ?>
            <p><b>Name: </b> <?php echo $row['f_name'].' '. $row['l_name']?></p>
            <p><b>Email: </b> <?php echo $row['email'];?></p>
            <p><b>Phone: </b> <?php echo $row['phone'];?></p>
            <h3 class="message">Message</h3>
            <p> <?php 
                    $message = json_decode($row['message'], true);
                    $text = htmlspecialchars($message['text'] ?? $row['message']);
                    echo $text;
                ?>
            </p>


            <?php }?>
        </div>
        </div>
        
        <div class="media-icon">
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-google"></i>
            <i class="fa-brands fa-instagram"></i>
        </div>
    </div>  
</body>
</html>







