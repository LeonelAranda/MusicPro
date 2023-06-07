<?php include_once("encabezado.php");
print "<h2 class='text-center'>" . $datos["subtitulo"] . "</h2>";
print "<img src='" . RUTA . "img/" . $datos["data"][0]["imagen"] . "' class='rounded float-right'>";

if ($datos["data"][0]["tipo"] == 1) {

    print "<h4>Nombre: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["nombre"]) . "</p>";
    print "<h4>Marca: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["marca"]) . "</p>";
    print "<h4>Descripcion: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["descripcion"]) . "</p>";
    print "<h4>Precio: </4>";
    print "<p>$" . number_format($datos["data"][0]["precio"]) . "</p>";
} else if ($datos["data"][0]["tipo"] == 2) {
    print "<h4>Nombre: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["nombre"]) . "</p>";
    print "<h4>Marca: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["marca"]) . "</p>";
    print "<h4>Descripcion: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["descripcion"]) . "</p>";
    print "<h4>Precio: </4>";
    print "<p>$" . number_format($datos["data"][0]["precio"]) . "</p>";
} else if ($datos["data"][0]["tipo"] == 3) {
    print "<h4>Nombre: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["nombre"]) . "</p>";
    print "<h4>Marca: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["marca"]) . "</p>";
    print "<h4>Descripcion: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["descripcion"]) . "</p>";
    print "<h4>Precio: </4>";
    print "<p>$" . number_format($datos["data"][0]["precio"]) . "</p>";
} else if ($datos["data"][0]["tipo"] == 4) {
    print "<h4>Nombre: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["nombre"]) . "</p>";
    print "<h4>Marca: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["marca"]) . "</p>";
    print "<h4>Descripcion: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["descripcion"]) . "</p>";
    print "<h4>Precio: </4>";
    print "<p>$" . number_format($datos["data"][0]["precio"]) . "</p>";
} else if ($datos["data"][0]["tipo"] == 5) {
    print "<h4>Nombre: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["nombre"]) . "</p>";
    print "<h4>Marca: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["marca"]) . "</p>";
    print "<h4>Descripcion: </4>";
    print "<p>" . html_entity_decode($datos["data"][0]["descripcion"]) . "</p>";
    print "<h4>Precio: </4>";
    print "<p>$" . number_format($datos["data"][0]["precio"]) . "</p>";
}
$regresa = ($datos["regresa"] == "") ? "tienda" : $datos["regresa"];
print "<a href='" . RUTA . $regresa . "' class='btn btn-success'/>Regresa</a>";
include_once("piepagina.php");
