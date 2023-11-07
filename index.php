<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
    include 'conection.php';
    if(isset($_POST['enviar']))
    {
    $nombre=$_POST['nombre'];
    $edades=$_POST['edad'];
    $id_tipo_mascotas=$_POST['id_tipo_mascota'];
    $id_vacunas=$_POST['id_vacuna'];
    $sql= "INSERT INTO `mascota` (`id`, `names`, `edad`, `id_tipo_mascota`, `id_vacuna`) VALUES(0,'".$nombre."','".$edades."','".$id_tipo_mascotas."','".$id_vacunas."')";
    $insersion=mysqli_query($con,$sql);
    }
    
    ?>
<?php 
    include 'conection.php';
    $consulta="select * from tipo_mascota";
    $consulta2="select * from vacuna";
    $resultado=mysqli_query($con,$consulta);
    $resultado2=mysqli_query($con,$consulta2);
?>
<header>
    <img class="logo" src="https://previews.123rf.com/images/artsonik/artsonik1609/artsonik160900050/63391001-logotipo-para-cl%C3%ADnica-veterinaria-o-tienda-de-animales-un-perro-de-la-pata-estilizada-o-gato-signo.jpg" alt="">
    <h1 class="title">Veterinaria</h1>
</header>
<main>
    <form action="index.php" method="post">
        <h1>Mascotas Vacunadas</h1>
        <br>
        <input name="nombre" type="text" placeholder="Nombre">
        <br>
        <input name="edad" type="number" placeholder="Edad">
        <br>
        <select name="id_tipo_mascota" id="">
            <?php 
                while($filas=mysqli_fetch_assoc($resultado)){?>
                    <option value=" <?php echo $filas['id'] ?> "> <?php echo $filas['name']  ?> </option>
            <?php } ?>
        </select>
        <br>
        <select name="id_vacuna" id="">
            <?php 
                while($filas=mysqli_fetch_assoc($resultado2)){?>
                    <option value=" <?php echo $filas['id'] ?> "> <?php echo $filas['name']  ?> </option>
            <?php } ?>
        </select>
        <br>
        <br>
        <input class="button" name="enviar" type="submit" value="Registrar inyeccion">
        <br>
    </form>
</main>
</body>
</html>