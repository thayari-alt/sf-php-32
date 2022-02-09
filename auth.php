<?
require_once('dbconnect.php');
require_once('logError.php');

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$remember = $_POST['remember'];

$pass = md5($pass.'blablabla');

$mysql = dbconnect();
$result = mysqli_query($mysql, "SELECT * FROM users WHERE `login` = '$login' AND `pass` = '$pass'");
$user = $result->fetch_assoc();

print_r($user);

if (!$user || count($user) == 0) {
	echo '<p>Пользователь не найден</p>';
	logError([$login, $pass]);

	echo '<p><a href="/">Назад</a></p>';
	exit();
}

setcookie('user', $user['login'], time() + 3600, '/');

$mysql->close();

header('Location: /');
?>