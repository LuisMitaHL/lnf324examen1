<?php
include '../Ej01/cabecera.php';
?>
<h2>Panel de Control Administrador</h2>

<!-- FORMULARIOS -->
<table border="1px">
    <tr>
        <td>
            <h3>Alta Persona</h3>
            <form action="index.php" method="post">
                <input type="hidden" name="transaccion" value="AltaPersona">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre"><br>
                <label for="direccion">Direccion:</label><br>
                <input type="text" id="direccion" name="direccion"><br>
                <label for="telefono">Telefono:</label><br>
                <input type="text" id="telefono" name="telefono"><br>
                <input type="submit" value="Dar de alta">
            </form>
        </td>
        <td>
            <h3>Baja Persona</h3>
            <form action="index.php" method="post">
                <input type="hidden" name="transaccion" value="BajaPersona">
                <label for="id">ID Persona:</label><br>
                <input type="text" id="id" name="id"><br>
                <input type="submit" value="Dar de baja">
            </form>
        </td>
        <td>
            <h3>Cambio Persona</h3>
            <form action="index.php" method="post">
                <input type="hidden" name="transaccion" value="CambioPersona">
                <label for="id">ID Persona:</label><br>
                <input type="text" id="id" name="id"><br>
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre"><br>
                <label for="direccion">Direccion:</label><br>
                <input type="text" id="direccion" name="direccion"><br>
                <label for="telefono">Telefono:</label><br>
                <input type="text" id="telefono" name="telefono"><br>
                <input type="submit" value="Dar de alta">
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <h3>Alta Cuenta Bancaria</h3>
            <form action="index.php" method="post">
                <input type="hidden" name="transaccion" value="AltaCuentaBancaria">
                <label for="id_persona">ID Persona:</label><br>
                <input type="text" id="id_persona" name="id_persona"><br>
                <label for="tipo">Tipo:</label><br>
                <select id="tipo" name="tipo">
                    <option value="cajadeahorro">Caja de Ahorro</option>
                    <option value="cuentacorriente">Cuenta Corriente</option>
                    <option value="dpf">DPF</option>
                </select><br>
                <input type="submit" value="Dar de alta">
            </form>
        </td>
        <td>
            <h3>Baja Cuenta Bancaria</h3>
            <form action="index.php" method="post">
                <input type="hidden" name="transaccion" value="BajaCuentaBancaria">
                <label for="id">ID Cuenta Bancaria:</label><br>
                <input type="text" id="id" name="id"><br>
                <input type="submit" value="Dar de baja">
            </form>
        </td>
        <td>
            <h3>Cambio Cuenta Bancaria</h3>
            <form action="index.php" method="post">
                <input type="hidden" name="transaccion" value="CambioCuentaBancaria">
                <label for="id">ID Cuenta Bancaria:</label><br>
                <input type="text" id="id" name="id"><br>
                <label for="id_persona">ID Persona:</label><br>
                <input type="text" id="id_persona" name="id_persona"><br>
                <label for="saldo">Saldo:</label><br>
                <input type="text" id="saldo" name="saldo"><br>
                <label for="tipo">Tipo:</label><br>
                <select id="tipo" name="tipo">
                    <option value="cajadeahorro">Caja de Ahorro</option>
                    <option value="cuentacorriente">Cuenta Corriente</option>
                    <option value="dpf">DPF</option>
                </select><br>
                <input type="submit" value="Modificar">
            </form>
        </td>
    </tr>
</table>

<hr>



<?php

$servidor = "127.0.0.1";
$usuario = "root";
$contrasena = "rootpassword";
$nombreBaseDatos = "BDLuis";
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $nombreBaseDatos);
if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}

if (!empty($_POST['transaccion'])) {
$transaccion = $_POST['transaccion'];
} else {
    $transaccion = '';
}

switch ($transaccion) {
    case 'AltaPersona':
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $activo = 1; // le activamos la cuenta de inmediato

        $sql = "INSERT INTO Persona (nombre, direccion, telefono, activo) VALUES ('$nombre', '$direccion', '$telefono', $activo)";
        $resultado = $conexion->query($sql);

        if ($resultado) {
            echo "La consulta se realizó con éxito.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        break;
    case 'BajaPersona':
        $id = $_POST['id'];
        $sql = "UPDATE Persona SET activo=0 WHERE id=$id"; // No se borra, solo se oculta
        $resultado = $conexion->query($sql);

        if ($resultado) {
            echo "La consulta se realizó con éxito.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        break;
    case 'CambioPersona':
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $activo = 1; // la cuenta se mantiene activada

        $sql = "UPDATE Persona SET nombre='$nombre', direccion='$direccion', telefono='$telefono', activo=$activo WHERE id=$id";
        $resultado = $conexion->query($sql);

        if ($resultado) {
            echo "La consulta se realizó con éxito.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        break;
    case 'AltaCuentaBancaria':
        $id_persona = $_POST['id_persona'];
        $saldo = 0;
        $fecha_creacion = date("Y-m-d"); // fecha actual
        $tipo = $_POST['tipo'];
        $activo = 1; // la cuenta se activa de inmediato
        $sql = "INSERT INTO CuentaBancaria (id_persona, saldo, fecha_creacion, tipo, activo) VALUES ($id_persona, $saldo, '$fecha_creacion', '$tipo', $activo)";
        $resultado = $conexion->query($sql);

        if ($resultado) {
            echo "La consulta se realizó con éxito.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        break;
    case 'BajaCuentaBancaria':
        $id = $_POST['id'];
        $sql = "UPDATE CuentaBancaria SET activo=0 WHERE id=$id"; // No se borra, solo se oculta
        $resultado = $conexion->query($sql);

        if ($resultado) {
            echo "La consulta se realizó con éxito.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        break;
    case 'CambioCuentaBancaria':
        $id = $_POST['id'];
        $id_persona = $_POST['id_persona'];
        $saldo = $_POST['saldo'];
        $tipo = $_POST['tipo'];
        $activo = 1; // la cuenta se mantiene activada

        $sql = "UPDATE CuentaBancaria SET id_persona='$id_persona', saldo=$saldo, tipo='$tipo', activo=$activo WHERE id=$id";
        $resultado = $conexion->query($sql);

        if ($resultado) {
            echo "La consulta se realizó con éxito.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
        break;
    default:
        // No transacciones
        break;
}
?>

<!-- MOSTRAREMOS EL CONTENIDO -->
<h3>Personas activas</h3>
<?php
$sql = "SELECT * FROM Persona WHERE activo=1";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table border='1px'><tr><th>ID Persona</th><th>Nombre</th><th>Direccion</th><th>Telefono</th></tr>";
    while($fila = $resultado->fetch_assoc()) {
        echo "<tr><td>" . $fila["id"]. "</td><td>" . $fila["nombre"]. "</td><td>" . $fila["direccion"]. "</td><td>" . $fila["telefono"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
?>
<h3>Cuentas Bancarias activas</h3>
<?php
$sql = "SELECT * FROM CuentaBancaria WHERE activo=1";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table border='1px'><tr><th>ID Cuenta Bancaria</th><th>ID Persona</th><th>Saldo</th><th>Fecha Creacion</th><th>Tipo</th></tr>";
    while($fila = $resultado->fetch_assoc()) {
        echo "<tr><td>" . $fila["id"]. "</td><td>" . $fila["id_persona"]. "</td><td>" . $fila["saldo"]. "</td><td>" . $fila["fecha_creacion"]. "</td><td>" . $fila["tipo"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
?>

<?php
$conexion->close();
?>
<?php
include '../Ej01/pie.php';
?>