<?php
    // Recuperamos la información de la sesión
    session_start();
    
    // Comprobamos que el usuario se haya autentificado
    if (!isset($_SESSION['usuario'])) {
        exit("Error - debe <a href='login.php'>identificarse</a>.<br />");
    }

    // Verificamos si existe la cesta antes de acceder a ella
    if (!isset($_SESSION['cesta']) || empty($_SESSION['cesta'])) {
        $_SESSION['cesta'] = [];
    }
?>
<!DOCTYPE html >
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo Tienda Web: cesta.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 4: Cesta de la Compra</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagcesta">

<div id="contenedor">
  <div id="encabezado">
    <h1>Cesta de la compra</h1>
  </div>
  <div id="productos">
<?php
    $total = 0;

    // Mostramos los productos en la cesta
    foreach($_SESSION['cesta'] as $codigo => $producto) {
        $nombreProducto = htmlspecialchars($producto['nombre'], ENT_QUOTES, 'UTF-8');
        $precioProducto = htmlspecialchars($producto['precio'], ENT_QUOTES, 'UTF-8');
        $codigoProducto = htmlspecialchars($codigo, ENT_QUOTES, 'UTF-8');

        echo "<p><span class='codigo'>$codigoProducto</span>";
        echo "<span class='nombre'>$nombreProducto</span>";
        echo "<span class='precio'>$precioProducto €</span></p>";

        $total += $producto['precio'];
    }
?>
      <hr />
      <p><span class='pagar'>Precio total: <?php echo htmlspecialchars($total, ENT_QUOTES, 'UTF-8'); ?> €</span></p>
      <form action='pagar.php' method='post'>
          <p>
              <span class='pagar'>
                  <input type='submit' name='pagar' value='Pagar'/>
              </span>
          </p>
      </form>                  
  </div>
  <br class="divisor" />
  <div id="pie">
    <form action='logoff.php' method='post'>
        <input type='submit' name='desconectar' value='Desconectar usuario <?php echo htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8'); ?>'/>
    </form>        
  </div>
</div>
</body>
</html>
