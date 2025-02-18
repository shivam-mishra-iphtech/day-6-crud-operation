<?php
require 'db_connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $con->prepare("DELETE FROM contact_message WHERE id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    $stmt->close();
    
    if ($success) {
        header("Location: messageList.php?status=success&msg=Message deleted successfully.");
        exit();
    } else {
        header("Location: messageList.php?status=error&msg=Error deleting message.");
        exit();
    }
} else {
    header("Location: messageList.php?status=error&msg=Invalid request.");
    exit();
}
?>
