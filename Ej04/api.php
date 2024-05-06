<?php
$servidor = "127.0.0.1";
$usuario = "root";
$contrasena = "rootpassword";
$nombreBaseDatos = "BDLuis";
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $nombreBaseDatos);
if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}

if(isset($_GET['tabla'])){
    if ($_GET['tabla'] == 'Persona' || $_GET['tabla'] == 'CuentaBancaria') {
        $query = 'SELECT * FROM '.$_GET['tabla'].' WHERE activo = 1';
        $resultado = mysqli_query($conexion, $query);
        $data = [];
    
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                unset($row['activo']);
                $data[] = $row;
            }
            echo json_encode($data);
        } else {
            echo json_encode(['mensaje' => '0 resultados']);
        }
    } else {
        echo json_encode(['mensaje' => 'Tabla incorrecta']);
    }    
} else {
    echo json_encode(['mensaje' => 'Tabla incorrecta']);
}
?>