<?php
$db=mysqli_connect("127.0.0.1","raulosuna","raulosuna","rauldb") or die("No se puede conectar a la base de datos");

if (!isset($_GET['do']) || $_GET['do'] != 1) {
	switch ($_GET['type']) {
		case 'videojuego':
		echo 'Quieres borrar este videojuego?<br/>';
		break;
		case 'companyia':
		echo 'Quieres borrar esta companyia?<br/>';
		break;
	}
	echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">yes</a> ';
	echo 'or <a href="admin.php">no</a>';
} else {
	switch ($_GET['type']) {
		case 'companyia':
		$query = 'UPDATE videojuego SET
		videojuego_companyia = 0
		WHERE
		videojuego_companyia = ' . $_GET['id'];
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		$query = 'DELETE FROM videojuego
		WHERE
		videojuego_companyia = ' . $_GET['id'];
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		?>
		<p>El Companyia ha sido borrada.
			<a href="admin.php">Volver a Admin</a></p>
		<?php
		break;
		case 'videojuego':
		$query = 'DELETE FROM videojuego WHERE videojuego_id = ' . $_GET['id'];
		$result = mysqli_query($db, $query) or die(mysqli_error($db));

		?>
		<p >Tu videojuego ha sido eliminado
			<a href="admin.php">Volver a Admin</a></p>
		<?php
		break;
	}
}
?>