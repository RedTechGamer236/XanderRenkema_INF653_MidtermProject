<?php
$dsn = 'mysql:host=cig4l2op6r0fxymw.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=i1twq9fodkijd3aj';
$username = 'csmwws8rjc0wfvs3';
$password = 'h9mtqog3wbxpudjc';


try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error = "Database Error: ";
    $error .= $e -> getMessage();
    include('view/error.php');
    exit();
}

?>
