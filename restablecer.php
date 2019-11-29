<?php
//Creacion de tablas y datos
$mysqli=mysqli_connect("127.0.0.1","raulosuna","raulosuna","rauldb") or die("No se puede conectar a la base de datos");
$tabla1="create table videojuego (videojuego_id int not null auto_increment,videojuego_nombre varchar(255) not null,videojuego_genero int not null,videojuego_companyia int not null,primary key (videojuego_id))";
$tabla2="create table genero (videojuego_genero int not null auto_increment, genero varchar(255) not null, primary key(videojuego_genero))";
$tabla3="create table companyia (videojuego_companyia int not null auto_increment, companyia varchar(255) not null, primary key(videojuego_companyia))";
$insert1="insert into genero (videojuego_genero,genero) values (1,'accion'),(2,'aventura'),(3,'deporte'),(4,'First person shooter')";
$insert2="insert into companyia (videojuego_companyia,companyia) values (1,'2k'),(2,'RockStar'),(3,'Electronic Arts')";
$insert3="insert into videojuego values (1,'NBA 2K20',3,1),(2,'Borderland 3',4,2),(3,'FIFA',3,3),(4, 'Uncharted', 2, 3),(5,'GTA v',4,2),(6,'Madden',3,3)";
$drop1="drop table videojuego";
$drop2="drop table companyia";
$drop3="drop table genero";

mysqli_query($mysqli,$drop1) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$drop2) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$drop3) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$tabla1) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$tabla2) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$tabla3) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$insert1) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$insert2) or die (mysqli_error($mysqli));
mysqli_query($mysqli,$insert3) or die (mysqli_error($mysqli));

?>
<a href="admin.php">Volver</a>