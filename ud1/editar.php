<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tarea: Edición de un producto</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="encabezado">
    <h1>Tarea: Edición de un producto</h1>
</div>

<div id="contenido">
    <?php
    // Conexión a la base de datos
    try {
        $dwes = new PDO("mysql:host=127.0.0.1;dbname=dwes", "root", "Tokio2324");
        $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Verificar si se ha enviado un código de producto
        if (isset($_GET['cod'])) {
            $cod = $_GET['cod'];

            // Consulta para obtener los datos del producto
            $sql = "SELECT nombre_corto, nombre, descripcion, pvp FROM producto WHERE cod = :cod";
            $consulta = $dwes->prepare($sql);
            $consulta->bindParam(':cod', $cod);
            $consulta->execute();
            
            // Verificamos si se encontró el producto
            if ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                // Mostrar el formulario de edición
                ?>
                <form method="POST" action="actualizar.php">
                    <input type="hidden" name="cod" value="<?php echo htmlspecialchars($cod); ?>">
                    <label for="nombre_corto">Nombre Corto:</label>
                    <input type="text" id="nombre_corto" name="nombre_corto" value="<?php echo htmlspecialchars($row['nombre_corto']); ?>" required><br>

                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required><br>

                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($row['descripcion']); ?></textarea><br>

                    <label for="pvp">PVP:</label>
                    <input type="number" id="pvp" name="pvp" value="<?php echo htmlspecialchars($row['pvp']); ?>" step="0.01" required><br>

                    <button type="submit" name="actualizar">Actualizar</button>
                    <button type="submit" name="cancelar">Cancelar</button>

                </form>
                <?php
            } else {
                echo "<p>Producto no encontrado.</p>";
            }
        } else {
            echo "<p>No se ha especificado un producto para editar.</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Error en la conexión: " . htmlspecialchars($e->getMessage()) . "</p>";
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

