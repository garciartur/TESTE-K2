<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="UTF-8">
		<title>Upload multimídia</title>
		<link rel="stylesheet" href="style.css"
	</head>

	<body>
		<form method="post" action="" enctype="multipart/form-data">
		<input type="file" name="arquivo" required>
		<input type="submit">
		</form>

	<?php
		$arquivo=isset($_FILES['arquivo'])?$_FILES['arquivo']:"";

		if (isset($_FILES['arquivo'])){
			$nome = $arquivo ['name'];
			$extperm = ['jpg','jpeg','png'];
			$tamanho = $arquivo['size'];
			$extensao = explode ('.' , $nome);
			$extensao = end($extensao);
			$renomear = mD5(time());
		}
	?>
	</body>
</html>