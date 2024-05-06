<!DOCTYPE html>
<html>
<head>
    <title>Banco de la Fortuna</title>
    <style>
        body {
            background-color: lightblue;
        }
        h1 {
            color: navy;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <?php
    
    if(isset($sesion['usuario'])) {
        echo "Se inició sesión como usuario ".$sesion['usuario'];
        if($sesion['rol'] == 'administrador') {
            echo " con poderes de administrador";
        }
        if($sesion['rol'] == 'director') {
            echo " con el rol y privilegios de Director del Banco";
        }
        echo ". <a href='/index.php/Login/Logout'>Cierra sesión</a>.<br>";
    } else {
        echo "No se inició sesión. <a href='/index.php/Login/'>Iniciar</a>.<br>";
    }


    if($sesion['rol'] == "director") { ?>
    <h1>Dinero por departamento</h1>
    <table border='1px'>
        <tr>
            <th>La Paz</th>
            <th>Cochabamba</th>
            <th>Santa Cruz</th>
            <th>Oruro</th>
            <th>Potosí</th>
            <th>Chuquisaca</th>
            <th>Tarija</th>
            <th>Pando</th>
            <th>Beni</th>
        </tr>
    <?php
        //print_r($filas);
        foreach($filas as $fila) {
                echo "<tr><td>" . (isset($fila->lpz) ? $fila->lpz : 0) . "</td><td>" . (isset($fila->cbb) ? $fila->cbb : 0) . "</td><td>" . (isset($fila->scz) ? $fila->scz : 0) . "</td><td>" . (isset($fila->oru) ? $fila->oru : 0) . "</td><td>" . (isset($fila->pti) ? $fila->pti : 0) . "</td><td>" . (isset($fila->chq) ? $fila->chq : 0) . "</td><td>" . (isset($fila->tja) ? $fila->tja : 0) . "</td><td>" . (isset($fila->pnd) ? $fila->pnd : 0) . "</td><td>" . (isset($fila->ben) ? $fila->ben : 0) . "</td></tr>";
        }
        echo "</table>";
        
    ?>
    <?php } ?>
</body>
</html>