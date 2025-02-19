
<?php

require 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>User Contact List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            height: 30vh;
        }
        .container {
            background-color: skyblue;
            padding: 30px;
            border-radius: 1px;
            width: 100%;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header h1 {
            font-size: 24px;
            font-weight: bold;
            font-size:30px;
            font-weight:700;
            color: black;
        }
        .table-wrapper {
            margin-top:70px;
            overflow-x: auto;
            background: white;
            padding: 15px;
            border-radius: 1px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }
        @media only screen and (max-width: 1000px  min-width:650px) {
            .table-wrapper {
                margin-top:70px;
                overflow-x: auto;
                padding: 5px;
            }
        }
        @media only screen and (max-width: 651px  min-width:300px) {
            .table-wrapper {
                margin-top:70px;
                overflow-x: auto;
                padding: 5px;
            }
        }   
        #customers {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        #customers th, #customers td {
            padding: 10px;
            text-align: center;
        }

        #customers th {
            background-color: rgb(79, 184, 225);
            color: white;
        }
        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }
        
        .icon a i{
            color:black;
            font-size:18px;
            font-weight:500px;
            padding:3px;
        }
        a[title="Edit"]:hover i {
                                       
            color: blue !important;
                                    
        }
                                    
        a[title="View"]:hover i {
                                      
            color: green !important;
                                   
        }
                                    
        a[title="Delete"]:hover i {
                                        
            color: red !important;
                                    
        }
        .alert_success{
            padding:10px;
            width:98.4%;
            color:green;
            background-color:rgba(171, 242, 149, 0.4);
            text-align:center;
        }
        .alert_error{
            padding:10px;
            width:98.4%;
            color:red;
            background-color:rgba(226, 152, 137, 0.4);
            text-align:center;
        }

    </style>
</head>
<body>
    
    <div class="container">
        <div class="header">
       
            <h1>User Contact List</h1>
        </div>
        <div class="table-wrapper">
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
            <table id="customers">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM contact_message";
                    $qry = mysqli_query($con, $sql);

                    if (!$qry) {
                        die("Query Failed: " . mysqli_error($con)); // Debugging info
                    }

                    while ($row = mysqli_fetch_assoc($qry)) { 
                ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['f_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['l_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td>
                                <?php 
                                    $message = json_decode($row['message'], true);
                                    $text = htmlspecialchars($message['text'] ?? $row['message']);
                                    echo mb_strimwidth($text, 0, 60, '...');
                                ?>
                            </td>


                            <td class="icon">
                            <a href="message_update.php?id=<?php echo urlencode($row['id']); ?>" title="Edit" style="color: gray; text-decoration: none;">
                                    <i class="fa-solid fa-pen-to-square" style="color: gray;"></i>
                                </a>

                                <a href="view_message.php?id=<?php echo urlencode($row['id']); ?>" title="View" style="color: gray; text-decoration: none;">
                                    <i class="fa-solid fa-eye" style="color: gray;"></i>
                                </a>

                                <a href="message_delete.php?id=<?php echo urlencode($row['id']); ?>" title="Delete" style="color: gray; text-decoration: none;">
                                    <i class="fa-solid fa-trash" style="color: gray;"></i>
                                </a>
                            </td>
                        </tr>
                   <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
