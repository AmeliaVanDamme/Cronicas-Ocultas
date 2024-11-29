<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo de Aventuras RPG - Tu Portal a Reinos Fantásticos</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <link rel="stylesheet" href="../css/nuestroEstilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    session_start();
    include("conexion.php");
    $_SESSION['foro']=1;
    ?>
    <header class="Header">
    <nav  class="navbar navbar-expand-xl ColorMarron border-bottom border-body colorMarron">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../Imagenes/cronicas-perdidas.png" alt="Logo"  height="124" class="d-inline-block align-text-top">
                <a id="tipografia" class="navbar-brand fs-1" href="#">Cronicas Perdidas</a>
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5" href="../html/inicioSesion.html">Iniciar sesion</a>
              </li>
             
              <?php
                    if(isset($_SESSION['id'])){
                        echo "<li class='nav-item'><a class='nav-link fs-5' href='cerrar.php'>Cerrar sesion</a>";
                        echo "<li class='nav-item'><a class='nav-link fs-5' href='../html/membresia.html'>Mejorar membresia</a>";
                    }
                    ?>
              <li class="nav-item">
                <a class="nav-link fs-5" href="foroVista.php">Foro</a>
              </li>
              <?php
                    
                    if(isset($_SESSION['id'])){
                       $id = $_SESSION['id'];
                       $admin = $_SESSION['administrador'];
                       $sql =mysqli_query($conexion,"SELECT * FROM usuarios WHERE idUsuario = '$id'");
                       $mostrar=mysqli_fetch_array($sql);
                       $nivel = $mostrar['nivelSuscripcion']; 
                        echo "<li class='nav-item'><a class='nav-link fs-5' href='mostrarCarro.php'>Carrito</a></li>";
                        if($nivel>=2){
                            echo "<li class='nav-item'><a class='nav-link fs-5' href='../html/personalizar.html'>Personalizar</a></li>";
                        }
                        if($admin==1){
                            echo "<li class='nav-item'><a class='nav-link fs-5' href='admin.php'>Admin</a></li>";
                        }
                       
                    }
                    
                    ?>
          
            </ul>
            <!-- <form class="d-flex" role="search">
              <input class="form-control me-2 fs-5" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form> -->
          </div>
        </div>
      </nav>
    </header>

    
         <div class="container text-center my-4">
        <h1>
            Bienvenido a tu Próxima Gran Aventura
          </h1>
          <h2>
            Explora mundos fantásticos, forja leyendas y vive épicas historias
          </h2>
          <!-- <button type="button" class="btn btn-primary btn-large">Primary</button> -->
        </div>
                
      <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="container">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../Imagenes/imagenWallpaperPrueba.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../Imagenes/imagenWallpaperPrueba.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../Imagenes/imagenWallpaperPrueba.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
     </div>

      

      <div class="container row text-center mx-auto gap-5 my-4">
     <?php
        
        $sql2 = mysqli_query($conexion,"SELECT * from manuales where activo = true");
        while($row = mysqli_fetch_array($sql2)){
        $i = "../Imagenes/cohete-removebg-preview.png";
        ?>
       <div class="card mx-auto" style="width: 17rem;">
            <img src="../Imagenes/cohete-removebg-preview.png" class="card-img-top" alt="...">
            <a href="mostrarManual.php?img=<?php $i; ?>&idM=<?php echo $row['idManual']; ?>">Ver mas</a>
            <div class="card-body">
              <h4 class="card-title">Ciencia Ficción</h4>
              <p class="card-text">Viaja a las estrellas y descubre nuevos mundos y tecnologías.</p>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        
        $sql = mysqli_query($conexion,"SELECT * from producto where activo = true");
        while($row2 = mysqli_fetch_array($sql)){
        $i ="../Imagenes/". $row2['img'];
        ?>
        <div class="card mx-auto" style="width: 18rem;">
            <img src="../imagenes/<?php echo $row2['img']; ?>" class="card-img-top" alt="...">
            <a href="mostrarProducto2.php?img=<?php echo $i; ?>&id=<?php echo $row2['idProducto']; ?>">Ver mas</a>
            <div class="card-body">
              <h4 class="card-title">Fantasía Medieval</h4>
              <p class="card-text">Sumérgete en reinos de magia, dragones y heroicas hazañas.</p>
            </div>
          </div>
        <?php
        }
        ?>
     </div>

    <?php
    if(!isset($_SESSION['nivel']) || $_SESSION['nivel']<=1){
        ?>
        <section id="advertisement">
        <div class="container">
             <img src="https://pub-3626123a908346a7a8be8d9295f44e26.r2.dev/mystery-icon.png" alt="Icono de Misterio">
                <h2>¡Oferta Especial!</h2>
                <p>Obtén un 20% de descuento en tu primera compra de manuales de juego.</p>
                <p>Usa el código: <strong>AVENTURA20</strong> al finalizar tu compra.</p>
            <a href="#" class="ad-button">Comprar Ahora</a>
        </div>
    </section>
    <?php
    }

    ?>
    
    <div class="container my-4 ">
        <h3>Sobre Mundo de Aventuras RPG</h3>
        <p>Somos una comunidad apasionada por los juegos de rol. Nuestro objetivo es proporcionar a los jugadores las mejores herramientas y recursos para crear y vivir increíbles aventuras en todos los géneros imaginables.</p>
    </div>


    <footer class="row text-center colorMarron  border-bottom border-body text-white" data-bs-theme="dark"  >
        <div class="col-sm-12 col-mb-6 col-lg-6 col-xl-6"> 
          <h3 class="">Contacto</h3>
          <p>¿Tienes preguntas o sugerencias? ¡Nos encantaría escucharte!</p>
          <p>Email: info@mundoaventurasrpg.com</p>
          <p>Teléfono: (123) 456-7890</p>
        </div>
        <div class="col-sm-12 col-mb-6 col-lg-6 col-xl-6">
          <h3>Mundo de Aventuras RPG © 2023</h3>
          <li class='nav-item'><a class='nav-link fs-5' id="manual" href=''>Manual usuario</a></li>
        </div>
       
      </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../manualUsuario.js"></script>
</html>
