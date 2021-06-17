<?php
$name=$_POST[name];
$phone=$_POST[phone];

$dbms='mysql';
$host='localhost';
$dbName='database';
$user='username';
$pass='password';
$dsn="$dbms:host=$host;dbname=$dbName";

try {
    $dbh = new PDO($dsn, $user, $pass);
	$sql_cmd = "INSERT INTO `table`(`name`,`phone`,`date`)VALUES(:name,:phone)";
	$sql_cmd->bindParam(':name', $name);
	$sql_cmd->bindParam(':phone', $phone);
	
	$dbh->exec($sql_cmd);
    echo "Successfully Registration<br/>";
    $dbh = null;
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
$db = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
?>