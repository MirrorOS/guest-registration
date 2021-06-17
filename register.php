<?php
$name=$_POST[name];
$phone=$_POST[phone];

$dbms='mysql';
$host='127.0.0.1';
$dbName='guest';
$user='root';
$pass='flag{Pwn3D_p4$Sw0rds}';
$dsn="$dbms:host=$host;dbname=$dbName";

try {
    $dbh = new PDO($dsn, $user, $pass);
	$sql_cmd = "INSERT INTO `history`(`name`,`phone`,`date`)VALUES(:name,:phone)";
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