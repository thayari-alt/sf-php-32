<?
session_start();
$token = hash('gost-crypto', random_int(0,999999));
$_SESSION["CSRF"] = $token;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<?if($_COOKIE['user'] == ''):?>
			<div class="col-3">
				<div class="h2">Регистрация</div>
				<form method="post" action="register.php">
					<input type="text" name="login" placeholder="Логин" class="form-control"><br/>
					<input type="password" name="pass" placeholder="Пароль" class="form-control"> <br/>
					<input type="submit" value="Зарегистрироваться" class="btn btn-success">
				</form>
			</div>
			<div class="col-3">
				<div class="h2">Вход</div>
				<form method="post" action="auth.php">
					<input type="text" name="login" placeholder="Логин" class="form-control"><br/>
					<input type="password" name="pass" placeholder="Пароль" class="form-control"> <br/>
					<input type="submit" value="Войти" class="btn btn-success mt-2">
				</form>
				<?include 'auth-vk.php';?>
			</div>
		</div>
		<?else:?>
		<div class="row">
			<div class="col-2">
				<a class='btn btn-primary' href="/exit.php">Выйти</a>
			</div>
		</div>
		<div class="content">
			<?include 'content.php';?>
		</div>
		<?endif;?>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>