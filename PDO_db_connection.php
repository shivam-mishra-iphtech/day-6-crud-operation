<style>
    .alert_success{
        padding:10px;
        width:100%;
        color:rgba(3, 4, 3, 0.4);
        background-color:rgba(124, 238, 158, 0.4);
        text-align:center;
        font-family: sans-serif;
       }

    .alert_error{
        padding:10px;
        width:93%;
        color:red;
        background-color:rgba(226, 152, 137, 0.4);
        text-align:center;
       }
</style>
<?php
$dsn = "mysql:host=localhost;dbname=db_crud";
$username = "root";
$password = "";
try {
   $conn = new PDO($dsn, $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "<div class='alert_success'>Database connection successfull.</div>";
} catch (PDOException $e) {
   echo "<div class='alert_error'>Database connection failed!</div>" . $e->getMessage();
}
?>
