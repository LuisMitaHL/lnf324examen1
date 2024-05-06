<!DOCTYPE html>
<html>
<head>
    <title>Operacion ejecutada</title>
</head>
<body>

<h1>Operacion ejecutada</h1>


<?php
if(isset($mensaje)) {
    echo "Mensaje de retorno: ".$mensaje;
}

    echo "<script>setTimeout(function(){ window.location.href = '$siguiente'; }, 3000);</script>";
?>

</body>
</html>
