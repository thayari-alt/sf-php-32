<?
require_once('dbconnect.php');

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass.'blablabla');

$mysql = dbconnect();
$mysql->query("INSERT INTO `users` (`login`, `pass`) VALUES('$login', '$pass')");
$mysql->close();

header('Location: /');
?>