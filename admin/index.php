<?php
	error_reporting( E_ERROR );
	$f=file_get_contents(dirname($_SERVER['SCRIPT_FILENAME']).'/password.txt');
	settype($f, 'string');

	$config=file_get_contents(dirname($_SERVER['SCRIPT_FILENAME']).'/../scripts/config.json');
	settype($config, 'string');
	$parsed=json_decode($config, true);
?>
<html>
	<head>
		<title>Admin panel</title>
		<link rel="stylesheet" href="../styles/admin.css">
		<meta charset='utf-8'>
	</head>
	<body>
		<div class="container">
			<h1>Админ-панель сайта stickymp.in.ua</h1>
			<?php
				if(!isset($_POST['password'])){
			?>
			<form method='POST'>
				Пароль: <input type='password' name='password'><br>
				<button type='submit' class='btn btn-success'>Вход</button>
			</form>
		<?php
			}else{
				if(md5($_POST['password']) == $f || $_POST['password'] == $f){
					?>
					<form method='post'>
					<table class='table table-striped table-bordered table-hover table-condensed'>
						<tr>
							<td>
								Почта для отправки запросов:
							</td>
							<td>
								<input type='text' name='mail' value="<?php echo $parsed['mail'];?>">
							</td>
						</tr>
						<tr>
							<td>
								Цена до акции:
							</td>
							<td>
								<input type='number' name='original-price' value="<?php echo $parsed['original-price'];?>"> грн
							</td>
						</tr>
						<tr>
							<td>
								Процент скидки (в зависимости от этого значения считается новая цена товара):
							</td>
							<td>
								<input type='number' name='discount-percent' value="<?php echo $parsed['discount-percent'];?>"> %
							</td>
						</tr>
						<tr>
							<td>
								Специальное предложение (цена на вторую пару):
							</td>
							<td>
								<input type='number' name='special-suggestion' value="<?php echo $parsed['special-suggestion'];?>"> грн
							</td>
						</tr>
						<tr>
							<td>
								Новая цена:
							</td>
							<td>
								<input type='number' name='new-price' value="<?php echo $parsed['new-price'];?>"> грн
							</td>
						</tr>
						<tr>
							<td>
								Пароль админ-панели:
							</td>
							<td>
								<input type='text' name='new-password' value="<?php echo $_POST['password'];?>">
							</td>
						</tr>
					</table>
					<button class='btn btn-success' type='submit'>Сохранить настройки!</button>
					</form>
					<?php
				}
				else{
					mail($parsed['mail'], 'Уведомление от stickymp!', "Используйте этот код как пароль аккаунта админ-панели: $f", "Content-type: text/plain; charset=utf-8");
					echo "Неверный пароль! На почту <b>".$parsed['mail']."</b> было отправлено уведомление с кодом восстановения пароля.";
				}
			}
		?>
		<?php
			$originalPrice=$_POST['original-price'];
			$newPrice=$_POST['new-price'];
			$discount=$_POST['discount-percent'];
			$specialSuggestion=$_POST['special-suggestion'];
			$mail=$_POST['mail'];
			$newPassword=$_POST['new-password'];
			if(!isset($_POST['original-price'])) $originalPrice='250';
			if(!isset($_POST['discount-percent'])) $discount='30';
			if(isset($_POST['mail']) && isset($_POST['new-password'])){
				if($parsed['mail'] !== $mail){
					mail($parsed['mail'], 'Уведомление stickymp!', "E-mail приема заказов был изменен на: $mail", "Content-type: text/plain; charset=utf-8");
					echo "<br/>На почту <b>".$parsed['mail']."</b> было отправлено уведомление о смене E-mail.";
				}
				$arr=array(
					'mail' => $mail,
					'original-price' => $originalPrice,
					'new-price' => $newPrice,
					'discount-percent' => $discount,
					'special-suggestion' => $specialSuggestion,
				);
				$newJSON=json_encode($arr);
				$fp = fopen(dirname($_SERVER['SCRIPT_FILENAME']).'/../scripts/config.json', 'w');
				fwrite($fp, $newJSON);
				fclose($fp);
				$fp1 = fopen(dirname($_SERVER['SCRIPT_FILENAME']).'/password.txt', 'w');
				fwrite($fp1, md5($newPassword));
				fclose($fp1);
				if($f !== md5($newPassword)){
					mail($_POST['mail'], 'Уведомление от stickymp!', "Пароль аккаунта админ-панели сменен: $newPassword", "Content-type: text/plain; charset=utf-8");
					echo "<br/>На почту <b>".$_POST['mail']."</b> было отправлено уведомление о смене пароля.";
				}
			}
		?>
		</div>
	</body>
</html>