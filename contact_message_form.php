
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .form-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(57, 46, 46, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container mx-auto">
            <h2 class="text-center mb-4">Contact Message</h2>
            <form class="form-group" action="cont_message.php" method="post" name="my_form" onsubmit="return(vailidate())"> 
            <?php
                    if (isset($_GET['status'])) {
                        $status = $_GET['status'];
                        $msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';

                        if ($status == "success") {
                            echo "<div class='alert alert-success text-center'>$msg</div>";
                        } elseif ($status == "error") {
                            echo "<div class='alert alert-danger text-center'>$msg</div>";
                        }
                    }
                ?>

                <div class="mb-3">
                    <label class="form-label" for="first_name">First Name</label>
                    <input class="form-control" type="text" id="first_name" name="first_name">
                    <span class="error" id="first_name_error"></span>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="last_name">Last Name</label>
                    <input class="form-control" type="text" id="last_name" name="last_name">
                    <span class="error" id="last_name_error"></span>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email">
                    <span class="error" id="email_error"></span>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="phone">Phone</label>
                    <input class="form-control" type="tel" id="phone" name="phone">
                    <span class="error" id="phone_error"></span>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <textarea class="form-control" name="address" id="address" rowa="3"></textarea>
                    <span class="error" id="address_error"></span>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                    <span class="error" id="message_error"></span>
                </div>

                <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
<style>
    .error{
        color: red;
        font-size: 14px;
    }
</style>

<script>
    function validate() {
        let isValid = true; 
        let firstName = document.getElementById("first_name").value.trim();
        let lastName = document.getElementById("last_name").value.trim();
        let email = document.getElementById("email").value.trim();
        let phone = document.getElementById("phone").value.trim();
        let address= document.getElementById("address").value.trim();
        // alert(address);
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
        if(address ===""){
            document.getElementById("address_error"). innerText = "Addrees is required.";
            isvalid =false;
        }else if(!address.test(address)){
            document.getElementById("address_error").innerText="Enter your valid current address";
            isvalid.false;
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


