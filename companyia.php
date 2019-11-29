<?php
$db=mysqli_connect("127.0.0.1","raulosuna","raulosuna","rauldb") or die("No se puede conectar a la base de datos");
	if ($_GET['action'] == 'edit') {

		
		if($_GET['id']!=0){
			echo "entra";
			$query = 'SELECT * FROM companyia WHERE videojuego_companyia = ' . $_GET['id'];
			$result = mysqli_query($db, $query) or die(mysqli_error($db));
			extract(mysqli_fetch_assoc($result));
	}
	} 
?>
<html>
	<head>
		<title><?php echo ucfirst($_GET['action']); ?> Companyia</title>
	</head>
	<body>
		<h1><?php echo ucfirst($_GET['action']); ?> Companyia</h1>
		<form action="commit.php?action=<?php echo $_GET['action']; ?>&type=companyia" method="post">
			<table>
				<tr>
					<td>Nombre del Companyia</td>
					<td>
						<?php
							if ($_GET['action'] == 'edit') {
							echo '<input type="text" name="companyia" value="'.$companyia.'"/></td>';
							}else{
								echo '<input type="text" name="companyia" value=""/></td>';
							}

						?>
				</tr>
				<tr>
					<td>
						<?php
							if ($_GET['action'] == 'edit') {
								echo '<input type="hidden" value="' . $_GET['id'].'" name="videojuego_companyia" />';
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