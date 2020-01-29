<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="UTF-8">
		<title>Upload multimídia</title>
		<link rel="stylesheet" href="style.css"
	</head>

	<body>
		<form method="post" action="" enctype="multipart/form-data">
		<p class="formulario"><input type="file" name="arquivo" required></p>
		<p class="formulario">Descrição: <input type="text" name="descricao" required></p>
		<p class="formulario"><input type="submit"></p>
		</form>

	<?php
		$arquivo=isset($_FILES['arquivo'])?$_FILES['arquivo']:"";
		$arquivo=isset($_GET['arquivo'])?$_FILES['arquivo']:"";

		if (isset($_FILES['arquivo'])){
			$nome = $arquivo ['name'];
			$extperm = ['jpg','jpeg','png', 'mp4'];
			$extensao = explode ('.' , $nome);
			$extensao = end($extensao);
			$rename = mD5(time()) . '.' .$extensao;

			if (in_array($extensao, $extperm)) {
				$upload = move_uploaded_file($_FILES['arquivo']['tmp_name'], 'uploads/' .$rename);
				echo "Parabéns! Seu upload foi efetuado com sucesso.";
				print "<img src='uploads/$rename' width='150'>";
			}
			else{
				echo "Favor enviar apenas arquivos de vídeo ou imagem.";
			}
		}
	?>
	</body>
</html>