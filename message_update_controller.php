<?php
require 'PDO_db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = json_encode($_POST['message']);

    if (!empty($id) && !empty($email)) {
        $sql = "UPDATE  contact_message 
                    SET f_name = :f_name, 
                        l_name = :l_name, 
                        email = :email, 
                        phone = :phone, 
                        message = :message 
                 WHERE  id = :id";

        $stmt = $conn->prepare($sql);

       
        $stmt->bindParam(':f_name', $f_name, PDO::PARAM_STR);
        $stmt->bindParam(':l_name', $l_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR); 
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: messageList.php?status=success&msg=Message updated successfully!");
        } else {
            header("Location: messageList.php?status=error&msg=Failed to update message.");

            echo "Failed to update message.";
        }
    } else {
        header("Location: messageList.php?status=error&msg=ID and Email fields are required.");
    }
}
?>
