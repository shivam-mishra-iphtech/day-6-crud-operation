<style>
    .alert_error{
        padding:10px;
        width:93%;
        color:red;
        background-color:rgba(226, 152, 137, 0.4);
        text-align:center;
       }
</style>


<?php
$host="localhost";
$root="root";
$password="";
$db_name="db_crud";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con= mysqli_connect($host, $root, $password, $db_name);
if(!$con){
    echo "<div class='alert_error'>Database connection failed!</div>";
}

?>