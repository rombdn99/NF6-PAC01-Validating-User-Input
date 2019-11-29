<?php
$db=mysqli_connect("127.0.0.1","raulosuna","raulosuna","rauldb") or die("No se puede conectar a la base de datos");
	if ($_GET['action'] == 'edit') {
		$query = 'SELECT * FROM videojuego WHERE videojuego_id = ' . $_GET['id'];
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
		extract(mysqli_fetch_assoc($result));
	} else {
		$videojuego_nombre = '';
		$videojuego_genero = 0;
		$companyia_uno = 0;
	}
?>
<html>
	<head>
		<title><?php echo ucfirst($_GET['action']); ?> Videojuegos</title>
	</head>
	<body>
		<h1><?php echo ucfirst($_GET['action']); ?> Videojuegos</h1>
		<style type="text/css">
			#error { background-color: #600; border: 1px solid #FF0; color: #FFF;
			text-align: center; margin: 10px; padding: 10px; }
		</style>

		<?php
			if (isset($_GET['error']) && $_GET['error'] != '') {
				echo '<div id="error">' . $_GET['error'] . '</div>';
			}
		?>
		<form action="commit.php?action=<?php echo $_GET['action']; ?>&type=videojuego" method="post">
			<table>
				<tr>
					<td>Nombre del Videojuego</td>
					<td><input type="text" name="videojuego_nombre" value="<?php echo $videojuego_nombre; ?>"/></td>
				</tr>
				<tr>
					<td>Genero</td>

					<td>
						<select name="videojuego_genero">
						<?php
							$query = 'SELECT * FROM genero ORDER BY genero';
							$result = mysqli_query($db, $query) or die(mysqli_error($db));
							while ($row = mysqli_fetch_assoc($result)) {
								
									if ($row['videojuego_genero'] == $videojuego_genero) {
										echo '<option value="' . $row['videojuego_genero'] . '"selected="selected">';
									} else {
										echo '<option value="' . $row['videojuego_genero'] . '">';
									}
									echo $row['genero'] . '</option>';
								
							}
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Compañia</td>
					<td>
						<select name="companyia">
						<?php
							$query = 'SELECT videojuego_companyia, companyia FROM companyia ORDER BY companyia';
							$result = mysqli_query($db, $query) or die(mysqli_error($db));
							while ($row = mysqli_fetch_assoc($result)) {
								
									if ($row['videojuego_companyia'] == $videojuego_companyia) {
										echo '<option value="' . $row['videojuego_companyia'] . '" selected="selected">';
									} else {
										echo '<option value="' . $row['videojuego_companyia'] . '">';
									}
									echo $row['companyia'] . '</option>';
								
							}
						?>
						</select>
					</td>
				</tr>

				<tr>
					<td >
						<?php
							if ($_GET['action'] == 'edit') {
								echo '<input type="hidden" value="' . $_GET['id'].'" name="videojuego_id" />';
							}
						?>
						<input type="submit" name="submit" value="<?php echo ucfirst($_GET['action']); ?>" />
					</td>
					<td><a href="admin.php">Volver</a></td>
				</tr>
			</table>
		</form>
	</body>
</html>
