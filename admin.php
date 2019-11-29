<?php
$db=mysqli_connect("127.0.0.1","raulosuna","raulosuna","rauldb") or die("No se puede conectar a la base de datos");
$tabla1="create table videojuego (videojuego_id int not null auto_increment,videojuego_nombre varchar(255) not null,videojuego_genero int not null,videojuego_companyia int not null,primary key (videojuego_id))";
$tabla2="create table genero (videojuego_genero int not null auto_increment, genero varchar(255) not null, primary key(videojuego_genero))";
$tabla3="create table companyia (videojuego_companyia int not null auto_increment, companyia varchar(255) not null, primary key(videojuego_companyia))";
$insert1="insert into genero (videojuego_genero,genero) values (1,'accion'),(2,'aventura'),(3,'deporte'),(4,'First person shooter')";
$insert2="insert into companyia (videojuego_companyia,companyia) values (1,'2k'),(2,'RockStar'),(3,'Electronic Arts')";
$insert3="insert into videojuego values (1,'NBA 2K20',3,1),(2,'Borderland 3',4,2),(3,'FIFA',3,3),(4, 'Uncharted', 2, 3),(5,'GTA v',4,2),(6,'madden',3,3)";

/*
mysqli_query($db,$tabla1) or die (mysqli_error($db));
mysqli_query($db,$tabla2) or die (mysqli_error($db));
mysqli_query($db,$tabla3) or die (mysqli_error($db));
mysqli_query($db,$insert1) or die (mysqli_error($db));
mysqli_query($db,$insert2) or die (mysqli_error($db));
mysqli_query($db,$insert3) or die (mysqli_error($db));
*/
?>
<html> 
	<head>
		<title>Videojuego database</title>
		
	</head>
	<body>
		<table>
			<tr>
				<th colspan="2">Videojuegos <a href="videojuegos.php?action=add">[ADD]</a></th>
			</tr>
			<?php
				$query = 'SELECT * FROM videojuego';
				
				$result = mysqli_query($db, $query) or die (mysqli_error($db));
				$odd = true;
				while ($row = mysqli_fetch_assoc($result)) {
					echo ($odd == true) ? '<tr >' : '<tr >';
					$odd = !$odd;
					echo '<td>';
					echo $row['videojuego_nombre'];
					echo '</td><td>';
					echo ' <a href="videojuegos.php?action=edit&id=' . $row['videojuego_id'] . '"> [EDIT]</a>';
					echo ' <a href="delete.php?type=videojuego&id=' . $row['videojuego_id'] . '"> [DELETE]</a>';
					echo '</td></tr>';
				}
			?>
			<tr>
				<th colspan="2">Companyia<a href="companyia.php?action=add"> [ADD]</a></th>
			</tr>
			<?php
				$query = 'SELECT * FROM companyia';
				$result = mysqli_query($db, $query) or die (mysqli_error($db));
				$odd = true;
				while ($row = mysqli_fetch_assoc($result)) {
				echo ($odd == true) ? '<tr >' : '<tr >';
				$odd = !$odd;
				echo '<td>';
				echo $row['companyia'];
				echo '</td><td>';
				echo ' <a href="companyia.php?action=edit&id=' . $row['videojuego_companyia'].'"> [EDIT]</a>';
				echo ' <a href="delete.php?type=companyia&id=' . $row['videojuego_companyia'].'"> [DELETE]</a>';
				echo '</td></tr>';
				}
			?>
		</table>
		<a href="restablecer.php">Restablecer</a>
	</body>
</html>
