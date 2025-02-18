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
        .message-form p {
            text-align: center;
        }
        .message-form {
            width: 100%;
            max-width:600px;
            margin: -80px auto;
            background: #fff;
            padding: 10px 10px 10px 32px;
            box-shadow: 0 0 20px rgba(10, 10, 11, 0.4);

        }
        .form-rows{
            display:flex;
            padding:10px;
        }
        .form-field{
            width:100%;
            display:block;
            margin:12px; 
            text-align:start
           
        }
        .form-field textarea{
            font-weight:400;
            font-size:15px;
            width: 95%;
            text-align:start;
            padding:10px;
            border:1px solid lightgrey;
            color:black;
           
        }
        .form-field textarea:hover{
            border:2px solid skyblue;
        }
        .form-field label{
            display:block;
            font-weight:400;
            font-size:15px;
            margin-bottom:3px;
            padding:2px;
            color:darkgray;
        }
        .form-field input{
            font-weight:400;
            font-size:15px;
            width: 90%;
            text-align:start;
            padding:10px;
            border:1px solid lightgrey;
            color:black;
            
        }
        ::placeholder {
            color: lightgrey;
            opacity: 1; /* Firefox */
        }
        .form-field input:hover{
            border:2px solid skyblue;
        }
        .input-field{
            display:block;
            padding:10px;
            margin: 10px;
            
        }
        .button{
              width: 100%;
              max-width:100%;
              padding:10px;
              font-weight:600;
              font-size:20px;
              background-color:skyblue;
              border:2px solid white;
              margin:20px;
              
        }
        .button:hover{
            background-color:lightgreen;
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
       .alert_success{
        padding:10px;
        width:93%;
        color:green;
        background-color:rgba(171, 242, 149, 0.4);
        text-align:center;
       }
       .alert_error{
        padding:10px;
        width:93%;
        color:red;
        background-color:rgba(226, 152, 137, 0.4);
        text-align:center;
       }
       .error{
            color: red;
            font-size: 14px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header"></div>
        <div class="message-form">
            <h1>Get in Touch </h1>
            <p>Hello user please leaved your query</p>
            <form class="form-group" action="cont_message.php" method="post" name="my_form" onsubmit="return(vailidate())"> 
            <?php
                if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    $msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';

                    if ($status == "success") {
                        echo "<div class='alert_success'>$msg</div>";
                    } elseif ($status == "error") {
                        echo "<div class='alert_error'>$msg</div>";
                    }
                }
                ?>
                <div class="form-rows">
                    <div class="form-field">
                        <label for="first_name"> First Name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="Please enter first name">
                    </div>
                    <div class="form-field">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Please enter last name">
                        <span class="error" id="last_name_error"></span>

                    </div>
                </div>
                <div class="form-rows">
                    <div class="form-field">
                        <label for="email"> Email</label>
                        <input type="email" name="email" id="email" placeholder="Please enter first name">
                        <span class="error" id="email_error"></span>

                    </div>
                    <div class="form-field">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone" placeholder="Please enter last name">
                        <span class="error" id="phone_error"></span>

                    </div>
                </div>
                <div class="form-rows">
                    <div class="form-field meesage">
                        <label for="message">What do you have in mind</label>
                        <textarea name="message" id="message" rows="4" placeholder="Please enter query.."></textarea>
                        <span class="error" id="message_error"></span>

                    </div>
                </div>
                <div class="form-rows">
                     <button class="button" name="submit">Submit</button>
                </div>
            </form>
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
<script>
    function validate() {
        let isValid = true; 
        let firstName = document.getElementById("first_name").value.trim();
        let lastName = document.getElementById("last_name").value.trim();
        let email = document.getElementById("email").value.trim();
        let phone = document.getElementById("phone").value.trim();
        let message = document.getElementById("message").value.trim();
        let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        let phonePattern = /^[0-9]{10}$/; 
        document.querySelectorAll(".error").forEach(el => el.innerHTML = "");

        if (firstName === "") {
            document.getElementById("first_name_error").innerText = "First name is required.";
            isValid = false;
        }

       
        if (lastName === "") {
            document.getElementById("last_name_error").innerText = "Last name is required.";
            isValid = false;
        }

      
        if (email === "") {
            document.getElementById("email_error").innerText = "Email is required.";
            isValid = false;
        } else if (!emailPattern.test(email)) {
            document.getElementById("email_error").innerText = "Enter a valid email address.";
            isValid = false;
        }

        
        if (phone === "") {
            document.getElementById("phone_error").innerText = "Phone number is required.";
            isValid = false;
        } else if (!phonePattern.test(phone)) {
            document.getElementById("phone_error").innerText = "Enter a valid 10-digit phone number.";
            isValid = false;
        }

    
        if (message === "") {
            document.getElementById("message_error").innerText = "Message cannot be empty.";
            isValid = false;
        }

        return isValid; 
    }

   
    document.forms["my_form"].onsubmit = function () {
        return validate();
    };
</script>