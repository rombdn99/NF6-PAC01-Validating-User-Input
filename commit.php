<?php
$db=mysqli_connect("127.0.0.1","raulosuna","raulosuna","rauldb") or die("No se puede conectar a la base de datos");
?>
<html>
<head>
	<title>Commit</title>
</head>
<body>
	<?php
	$error=array();
	print_r($_POST);
	if(!isset($_GET['id']) || $_GET['id']==''){
		$_POST['videojuego_id']=0;
	}
	switch ($_GET['action']) {
		case 'add':
		$accion='add';
			switch ($_GET['type']) {

				case 'videojuego':
					if(empty($_POST['videojuego_nombre'])){
						$error[] = urlencode('Introduce el nombre del videojuego.');
					}
					if(empty($_POST['videojuego_genero'])){
						$error[] = urlencode('Introduce el genero del videojuego.');
					}
					if(empty($_POST['companyia'])){
						$error[] = urlencode('Selecciona la companyia del videojuego.');
					}
					
					$query = 'INSERT INTO
					videojuego
					(videojuego_nombre, videojuego_genero, videojuego_companyia)
					VALUES
					("' . $_POST['videojuego_nombre'] . '",
					' . $_POST['videojuego_genero'] . ',
					' . $_POST['companyia'] . ')';
					break;

				case 'companyia': 
					if(empty($_POST['companyia'])){
						$error[] = urlencode('Introduce el nombre de la companyia.');
					}
					
					
					$query = "INSERT INTO
					companyia
					(companyia)
					VALUES
					(' ".$_POST['companyia'] . "')";
				break;
			}
			break;
		case 'edit':
			$accion='edit';
			switch ($_GET['type']) {
				case 'videojuego':
					if(empty($_POST['videojuego_nombre'])){
						$error[] = urlencode('Introduce el nombre del videojuego.');
					}
					if(empty($_POST['videojuego_genero'])){
						$error[] = urlencode('Introduce el genero del videojuego.');
					}
					if(empty($_POST['companyia'])){
						$error[] = urlencode('Selecciona la companyia del videojuego.');
					}

					$query = 'UPDATE videojuego SET
					videojuego_nombre = "' . $_POST['videojuego_nombre'] . '",
					videojuego_genero = ' . $_POST['videojuego_genero'] . ',
					videojuego_companyia = ' . $_POST['companyia'] . '
					WHERE
					videojuego_id = ' . $_POST['videojuego_id'];
					break;
				case 'companyia':
					if(empty($_POST['companyia'])){
						$error[] = urlencode('Introduce el nombre de la companyia.');
					}
					$query = "UPDATE companyia SET
					companyia = '" . $_POST['companyia'] . "'
					WHERE
					videojuego_companyia = " . $_POST['videojuego_companyia'];
					break;
			}
			break;
	}
	if(empty($error)){
		if (isset($query)) {
			$result = mysqli_query($db, $query) or die(mysqli_error($db));
		}
	}else{
		header('Location: videojuegos.php?action='.$accion.'&id='.$_POST['videojuego_id'].'&error='.join($error, urlencode('<br/>')));
	}
	?>
	<p>Datos actualizados correctamente</p>
	<a href="admin.php">Volver</a>
</body>
</html>