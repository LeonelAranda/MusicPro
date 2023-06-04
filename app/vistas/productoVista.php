<?php include_once("encabezado.php");
print "<h2 class='text-center'>" . $datos["subtitulo"] . "</h2>";
print "src='" . RUTA . "img/" . $datos["data"]["imagen"] . "' class='rounded float-right'>";
if ($datos["data"]["tipo"] == 1) {
    print "<h4>Descripcion: </4>/";
    print "<p>" . html_entity_decode($datos["data"]["descripcion"]) . "</p>";

    print "<h4>Precio: </4>/";
    print "<p>$" . number_format($datos["data"]["precio"], 2) . "</p>";
} else if ($datos["data"]["tipo"] == 2) {
    print "<h4>Descripcion: </4>/";
    print "<p>" . html_entity_decode($datos["data"]["descripcion"]) . "</p>";

    print "<h4>Precio: </4>/";
    print "<p>$" . number_format($datos["data"]["precio"], 2) . "</p>";
} else if ($datos["data"]["tipo"] == 3) {
    print "<h4>Descripcion: </4>/";
    print "<p>" . html_entity_decode($datos["data"]["descripcion"]) . "</p>";

    print "<h4>Precio: </4>/";
    print "<p>$" . number_format($datos["data"]["precio"], 2) . "</p>";
} else if ($datos["data"]["tipo"] == 4) {
    print "<h4>Descripcion: </4>/";
    print "<p>" . html_entity_decode($datos["data"]["descripcion"]) . "</p>";

    print "<h4>Precio: </4>/";
    print "<p>$" . number_format($datos["data"]["precio"], 2) . "</p>";
} else if ($datos["data"]["tipo"] == 5) {
    print "<h4>Descripcion: </4>/";
    print "<p>" . html_entity_decode($datos["data"]["descripcion"]) . "</p>";

    print "<h4>Precio: </4>/";
    print "<p>$" . number_format($datos["data"]["precio"], 2) . "</p>";
}
print "<a href='" . RUTA . "tienda' class='btn btn-success'/>Regresa</a>";
include_once("piepagina.php");
