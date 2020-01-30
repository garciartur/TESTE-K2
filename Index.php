<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="UTF-8">
		<title>Upload multimídia</title>
		<link rel="stylesheet" href="reset.css">
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<header>
				<h1><img src="upload.png"></h1>
				<p>Upload multimídia</p>
		</header>
		<div class="caixa">
		<form method="post" action="" enctype="multipart/form-data">
		<p class="formulario"><input type="file" name="arquivo" required></p>
		<p class="formulario">Descrição: <input type="text" name="descricao" required></p>
		<p class="formulario"><input type="submit"></p>
		</form>

	<?php
		$arquivo=isset($_FILES['arquivo'])?$_FILES['arquivo']:"";

		if (isset($_FILES['arquivo'])){
			$nome = $arquivo ['name'];
			$extperm = ['jpg','jpeg','png', 'bmp', 'tiff', 'gif','mp4', 'avi','flv','mov'];
			$extensao = explode ('.' , $nome);
			$extensao = end($extensao);
			$rename = mD5(time()) . '.' .$extensao;

			if (in_array($extensao, $extperm)) {
				$upload = move_uploaded_file($_FILES['arquivo']['tmp_name'], 'uploads/' .$rename);
				echo "Parabéns! Seu upload foi efetuado com sucesso.";
				echo "<br><br><br><img src='uploads/$rename' width='150'><br><br>";
				echo $_POST ['descricao'];
			}
			else{
				echo "Favor enviar apenas arquivos de vídeo ou imagem.";
			}
		}
	?>

	</div>
	</body>
</html>