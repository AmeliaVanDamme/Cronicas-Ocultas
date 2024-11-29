<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time();?>">
    <title>Document</title>
</head>
<body>
<?php
include("conexion.php");
$sql=mysqli_query($conexion,"SELECT * from producto");
$sql2=mysqli_query($conexion,"SELECT * from manuales");
$sql3=mysqli_query($conexion,"SELECT * from usuarios");
?>

<a href="../html/agregar.html">agregar producto</a>
<a href="../html/agregarManual.html">agregar Manual</a>
<a href="index.php">inicio</a>
    <table>
       
               
        
    </table>
    <table>
        <tbody>
        <tr>
                <th class="id">id</th> 

                <th class="nombre">Nombre</th>
            
                <th class="precio">precio</th>
                
                <th class="cantidad">cantidad</th>
                
                <th class="des">descripcion</th>

                <th class="id">activo</th>
                
        
            </tr>
            <?php
            while($mostrar=mysqli_fetch_array($sql)){
           
            ?>
            <tr>
                <td class="id" ><?php  echo $mostrar['idProducto']  ?> </td>
                <td class="nombre" > <?php  echo $mostrar['nombre']  ?> </td>
                <td class="precio"> <?php  echo $mostrar['precio']  ?> </td>
                <td class="cantidad"> <?php  echo $mostrar['cantidad']  ?> </td>
                <td class="des"> <?php  echo $mostrar['descripcion']  ?> </td>
                <td class="des"> <?php  echo $mostrar['activo']  ?> </td>
                <td> <?php  echo "<a href='modificar.php?idP=".$mostrar['idProducto']."'>editar</a>";  ?> </td>
                <td> <?php  echo "<a href='borrar.php?idP=".$mostrar['idProducto']."'>eliminar</a>";  ?> </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <table>
       
      

</table>
    <table>
        <tbody>
            <tr>
            <th class="id" >id</th>
       
       <th class="nombre">Nombre</th>
       
       <th class="precio">Autor</th>
       <th class="precio">Paginas</th>
       <th class="precio">activo</th>
    
            </tr>
            <?php
            while($mostrar2=mysqli_fetch_array($sql2)){
           
            ?>
            <tr>
                <td class="id" ><?php  echo $mostrar2['idManual']  ?> </td>
                <td class="nombre" > <?php  echo $mostrar2['nombre']  ?> </td>
                <td class="marca"> <?php  echo $mostrar2['autor']  ?> </td>
                <td class="marca"> <?php  echo $mostrar2['cantPaginas']  ?> </td>
                <td class="marca"> <?php  echo $mostrar2['activo']  ?> </td>
                <td> <?php  echo "<a href='editarManual.php?id=".$mostrar2['idManual']."'>editar</a>";  ?> </td>
                <td> <?php  echo "<a href='borrar.php?id=".$mostrar2['idManual']."'>eliminar</a>";  ?> </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <table>
        <tbody>
        <tr>
                <th class="id">id</th> 

                <th class="nombre">Nombre</th>
            
                <th class="precio">correo</th>

                <th class="cantidad">Contrasenia</th>
                
                <th class="cantidad">Membresia</th>
                
                <th class="des">admin</th>

                
        
            </tr>
            <?php
            while($mostrar=mysqli_fetch_array($sql3)){
           
            ?>
            <tr>
                <td class="id" ><?php  echo $mostrar['idUsuario']  ?> </td>
                <td class="nombre" > <?php  echo $mostrar['NombreUsuario']  ?> </td>
                <td class="precio"> <?php  echo $mostrar['Gmail']  ?> </td>
                <td class="cantidad"> <?php  echo $mostrar['contrasenia']  ?> </td>
                <td class="des"> <?php  echo $mostrar['nivelSuscripcion']  ?> </td>
                <td class="des"> <?php  echo $mostrar['administrador']  ?> </td>
                <td> <?php  echo "<a href='activar.php?id=".$mostrar['idUsuario']."'>Privilegios</a>";  ?> </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    mysqli_close($conexion);
    ?>

</body>
</html>