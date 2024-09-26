<?php
// Verificar si se ha proporcionado un ID de cita válido en el formulario
if(isset($_POST['cita_id']) && !empty($_POST['cita_id'])) {
    // Recuperar el ID de la cita del formulario
    $cita_id = intval($_POST['cita_id']);

    // Establecer la conexión a la base de datos
    require_once('conexion.php');
    $conn = new mysqli($localhost, $user, $pass, $bd);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
    }

    // consulta SQL para borrar una cita utilizando el ID y LIMIT 1 para que si un usuario hace varias citas no se le borren todas las citas
    $sql = "DELETE FROM citas WHERE id = ? LIMIT 1";

    // Preparar la sentencia
    $resultado = $conn->prepare($sql);

    // Verificar si  la consulta fue exitosa
    if ($resultado === false) {
        die("Error al realizar la consulta: " . $conn->error);
    }

    // Vincular el parámetro de ID de cita
    $resultado->bind_param("i", $cita_id);

    // Ejecutar la consulta
    if ($resultado->execute()) {
        if ($resultado->affected_rows > 0) {
            echo "La cita ha sido borrada correctamente.";
        } else {
            echo "No se encontró ninguna cita con ese ID.";
        }
    } else {
        echo "Error al borrar la cita: " . $resultado->error;
    }

    // Cerrar la sentencia
    $resultado->close();

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "No se ha proporcionado un ID de cita válido.";
}
?>
