<?php
// Establecer la conexión a la base de datos
require_once('conexion.php');

$conn = new mysqli($localhost, $user, $pass, $bd);

// Comprobar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

// Eliminar citas pasadas de la base de datos
$consulta = "DELETE FROM citas WHERE fecha_hora < NOW()";
if ($conn->query($consulta) === TRUE) {
    echo "Las citas pasadas han sido eliminadas correctamente.";
} else {
    echo "Error al eliminar citas pasadas: " . $conn->error;
}

// Consulta SQL para obtener las citas disponibles junto con los nombres y apellidos de los usuarios
$sql = "SELECT citas.*, usuarios.nombre, usuarios.apellido FROM citas INNER JOIN usuarios ON citas.id = usuarios.id WHERE citas.fecha_hora > NOW()";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Citas</title>
     <!-- enlazamos imagen para establecer el favicon -->
     <link rel="icon" type="image/jpg" href="img/icons8-huella-de-perro-40.png"/>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background: #C2C2C2;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1, h3,h2 {
            color: #333;
            text-align: center;
            font-family:Vegur, 'PT Sans', Verdana, sans-serif;;
        }

        form {
            background: #C2C2C2;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }
        
        
        input[type="datetime-local"],
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

    
    </style>
</head>
<body>
    <h1>Administrar Citas</h1>
    <h3>Corta y Ladra</h3>
    <h2>Citas Disponibles</h2>

    <?php
    // si el resultado de filas es mayor a 0 imprimimos un formulario con toda la tabla de citas y el nombre y el apellido del usuario para poder identificarlos
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Fecha y Hora</th><th>Nombre</th><th>Apellido</th><th>Animal</th><th>Servicio</th><th>Corte de Pelo</th><th>Acción</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["fecha_hora"]."</td><td>".$row["nombre"]."</td><td>".$row["apellido"]."</td><td>".$row["animal"]."</td><td>".$row["servicio"]."</td><td>".$row["corte_pelo"]."</td>";
        echo "<td><form action='borrar_cita.php' method='post'><input type='hidden' name='cita_id' value='".$row["id"]."'><input type='submit' value='Borrar'></form></td></tr>";
    }
    echo "</table>";
} else {
    echo "No hay citas disponibles.";
}
?>
</body>
</html>
<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>

