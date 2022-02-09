<?
function dbconnect() {
	$host = 'localhost'; 
	$user = 'mysql'; 
	$password = ''; 
	$db = 'sf-32'; 

	$mysql = mysqli_connect($host, $user, $password, $db);

	return $mysql;
}
?>