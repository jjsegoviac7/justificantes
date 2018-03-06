<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="jquery-1.9.1.min.js"></script>

<title>Documento sin título</title>
</head>

<body>
<br><br>
<br><br><br>

<form accept-charset="utf-8" method="POST">
Buscar:
<input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();"/>
</form>
<div id="resultadoBusqueda"></div>



<script>
$(document).ready(function() {
    $("#resultadoBusqueda").html('<p>JQUERY VACIO</p>');
});

function buscar() {
    var textoBusqueda = $("input#busqueda").val();
 
     if (textoBusqueda != "") {
        $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusqueda").html('<p>JQUERY VACIO</p>');
        };
};
</script>


</body>
</html>