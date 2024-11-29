<?php
include("conexion.php");
$id=$_GET['idM'];
$sql = mysqli_query($conexion,"SELECT * from manuales where idManual = '$id'");
$resultado = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espada Legendaria - Tienda de Rol</title>
    <link rel="stylesheet" href="../css/mostrarProducto.css?v=<?php echo time();?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <style>
       
    </style>
</head>
<body>
    <div class="product">
    <canvas id="pdf-canvas"></canvas>
        <h1 id="h1" class="product-title"><?php echo$resultado['nombre'] ?></h1>
        <p class="product-description">Autor: <?php echo$resultado['autor'] ?></p>
        <p class="product-price"></p>
        <form action="mostrarProducto.php" method="get">
            <input type="hidden" name="idM" value="<?php echo$id ?>">
            <button type="submit" name="enviar" class="buy-button">Comprar Ahora</button>
        </form>
        <a  class="buy-button" href="index.php">Inicio</a>
    </div>
</body>
<script>
        // const pdfUrl ="; // Ajusta 'urlPDF' al nombre del campo en tu base de datos

        // const pdfJs = window['pdfjs-dist/build/pdf'];
        // let nombre = document.getElementById('h1');
        const url2 = "../<?php echo $resultado['nombre']; ?>";

        const pdfJs= window['pdfjs-dist/build/pdf'];

        pdfJs.getDocument(url2).promise.then(pdf => {
                pdf.getPage(url2);
                pdf.getPage(1).then(page => {
                const scale = 0.5;
                const viewport = page.getViewport({ scale: scale });

                const canvas = document.getElementById('pdf-canvas');
                const context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        });
    </script>
</html>
