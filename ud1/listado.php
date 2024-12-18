<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejercicio Tema 3: Conjuntos de resultados en PDO</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
    <style>
        .producto {
            display: flex; /* Usar flexbox para alinear los elementos */
            justify-content: space-between; /* Espaciado entre el nombre del producto y el botón */
            align-items: center; /* Alinear verticalmente */
            margin-bottom: 10px; /* Espaciado entre los productos */
        }
        .editar-btn {
            margin-left: 10px; /* Espaciado entre el nombre y el botón */
        }
        .editar-btn input {
            vertical-align: middle; /* Alinear el botón verticalmente */
        }
    </style>
</head>
<body>
<div id="encabezado">
    <h1>Ejercicio: Conjuntos de resultados en PDO</h1>
    <form id="form_seleccion" action="" method="post">
        <span>Familia: </span>
        <select name="familia">
            <?php
            // Inicializa la variable $familia
            $familia = isset($_POST['familia']) ? $_POST['familia'] : null;

            try {
                // Conexión a la base de datos
                $dwes = new PDO("mysql:host=127.0.0.1;dbname=dwes", "root", "Tokio2324");
                $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Rellenamos el desplegable con los datos de todas las familias
                $sql = "SELECT cod, nombre FROM familia";
                $resultado = $dwes->query($sql);

                // Verificamos si la consulta fue exitosa
                if ($resultado) {
                    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . htmlspecialchars($row['cod']) . "'";
                        // Si se recibió un código de familia, seleccionamos el valor en el desplegable
                        if ($familia === $row['cod']) {
                            echo " selected='true'";
                        }
                        echo ">" . htmlspecialchars($row['nombre']) . "</option>";
                    }
                }
            } catch (PDOException $e) {
                echo "<p>Error en la conexión o en la consulta: " . htmlspecialchars($e->getMessage()) . "</p>";
            }
            ?>
        </select>
        <input type="submit" value="Mostrar stock" name="enviar"/>
    </form>
</div>

<div id="contenido">
    <h2>Stock de productos en las tiendas:</h2>
    <?php
    // Si se recibió un código de familia
    if (isset($familia)) {
        try {
            // Consulta para obtener el stock de los productos de la familia seleccionada en las tiendas
            $sql = "SELECT tienda.nombre AS tienda, producto.cod AS producto_cod, producto.nombre_corto AS producto, stock.unidades 
                    FROM tienda 
                    INNER JOIN stock ON tienda.cod = stock.tienda
                    INNER JOIN producto ON stock.producto = producto.cod
                    WHERE producto.familia = :familia";

            $consulta = $dwes->prepare($sql);
            $consulta->bindParam(':familia', $familia);
            $consulta->execute();

            // Verificamos si la consulta fue exitosa
            if ($consulta) {
                while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    // Mostrar información del producto
                    echo "<div class='producto'>";
                    echo "<span>Producto: " . htmlspecialchars($row['producto']) . " - Tienda: " . htmlspecialchars($row['tienda']) . " - Unidades: " . htmlspecialchars($row['unidades']) . "</span>";

                    // Formulario para editar el producto
                    echo "<form method='GET' action='editar.php' class='editar-btn'>";
                    echo "<input type='hidden' name='cod' value='" . htmlspecialchars($row['producto_cod']) . "'>";
                    echo "<input type='submit' value='Editar'>";
                    echo "</form>";
                    echo "</div>"; // Cerrar div .producto
                }
            } else {
                echo "<p>No se encontraron productos para la familia seleccionada.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Error en la consulta de stock: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
    ?>
</div>

<div id="pie">
    <?php
    // Cerrar la conexión
    unset($dwes);
    ?>
</div>
</body>
</html>

