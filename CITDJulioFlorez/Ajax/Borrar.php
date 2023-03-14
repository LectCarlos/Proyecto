<?php
# Cuántos productos mostrar por página
$productosPorPagina = 10;
// Por defecto es la página 1; pero si está presente en la URL, tomamos esa
$pagina = 1;

if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
# El límite es el número de productos por página
$limit = $productosPorPagina;
# El offset es saltar X productos que viene dado por multiplicar la página - 1 * los productos por página
$offset = ($pagina - 1) * $productosPorPagina;
# Necesitamos el conteo para saber cuántas páginas vamos a mostrar
$sentencia = $base_de_datos->query("SELECT count(*) AS conteo FROM productos");
$conteo = $sentencia->fetchObject()->conteo;
# Para obtener las páginas dividimos el conteo entre los productos por página, y redondeamos hacia arriba
$paginas = ceil($conteo / $productosPorPagina);

# Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
$sentencia = $base_de_datos->prepare("SELECT * FROM productos LIMIT ? OFFSET ?");
$sentencia->execute([$limit, $offset]);
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
# Y más abajo los dibujamos...
?>

<div class="col-xs-12">
    <h1>Productos</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Existencia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) { ?>
                <tr>
                    <td><?php echo $producto->id ?></td>
                    <td><?php echo $producto->codigo ?></td>
                    <td><?php echo $producto->descripcion ?></td>
                    <td><?php echo $producto->precioCompra ?></td>
                    <td><?php echo $producto->precioVenta ?></td>
                    <td><?php echo $producto->existencia ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav>
        <div class="row">
            <div class="col-xs-12 col-sm-6">

                <p>Mostrando <?php echo $productosPorPagina ?> de <?php echo $conteo ?> productos disponibles</p>
            </div>
            <div class="col-xs-12 col-sm-6">
                <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
            </div>
        </div>
        <ul class="pagination">
            <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
            <?php if ($pagina > 1) { ?>
                <li>
                    <a href="./listar.php?pagina=<?php echo $pagina - 1 ?>">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php } ?>

            <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
            <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                <li class="<?php if ($x == $pagina) echo "active" ?>">
                    <a href="./listar.php?pagina=<?php echo $x ?>">
                        <?php echo $x ?></a>
                </li>
            <?php } ?>
            <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
            <?php if ($pagina < $paginas) { ?>
                <li>
                    <a href="./listar.php?pagina=<?php echo $pagina + 1 ?>">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>




/*
    <html>
  <head>
    <title>Stack de Imágenes</title>
    <style>
      #container {
        position: relative;
        height: 300px;
        width: 500px;
      }
      #img-container {
        position: absolute;
        top: 0;
        left: 0;
      }
      .img {
        width: 100%;
        height: 100%;
      }
      #plus-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      #plus {
        font-size: 50px;
        color: #fff;
      }
    </style>
  </head>
  <body>
    <div id="container">
      <div id="img-container" class="img">
        <img src="imagen1.jpg" />
        <img src="imagen2.jpg" />
        <img src="imagen3.jpg" />
      </div>
      <div id="plus-container">
        <p id="plus">+</p>
      </div>
    </div>
    <script>
    let container = document.getElementById('container'); 
    let imgContainer = document.getElementById('img-container'); 
    let imgs = document.querySelectorAll('.img img'); 
    let plusContainer = document.getElementById('plus-container'); 
    let plus = document.getElementById('plus'); 
    let count = 0; 

    container.addEventListener('click', () => {
      count++; 
      if(count > 2) count = 0; 
      imgContainer.style.zIndex = 0; 
      plusContainer.style.zIndex = 1; 
      imgs[count].style.zIndex = 2; 
    });

    </script>
  </body>
</html>
    */