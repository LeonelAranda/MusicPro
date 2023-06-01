<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php print $datos["titulo"]; ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a href="<?php print RUTA; ?>" class="navbar-brand">MusicPro</a>
        <div class="collapse navbar-collapse" id="menu">
            <?php if ($datos["menu"]) {
                print "<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>";
                print "<li class='nav-item'>";
                print "<a href='" . RUTA . "cuerda' class='nav-link ";
                if (isset($datos["activo"]) && $datos["activo"] == "cuerda") print "active";
                print "'>Cuerda</a>";
                print "</li>";
                //

                print "<li class='nav-item'>";
                print "<a href='" . RUTA . "percusion' class='nav-link ";
                if (isset($datos["activo"]) && $datos["activo"] == "percusion") print "active";
                print "'>Percusion</a>";
                print "</li>";

                print "<li class='nav-item'>";
                print "<a href='" . RUTA . "amplificadores' class='nav-link ";
                if (isset($datos["activo"]) && $datos["activo"] == "amplificadores") print "active";
                print "'>Amplificadores</a>";
                print "</li>";

                print "<li class='nav-item'>";
                print "<a href='" . RUTA . "cajas' class='nav-link ";
                if (isset($datos["activo"]) && $datos["activo"] == "cajas") print "active";
                print "'>Cajas</a>";
                print "</li>";

                print "<li class='nav-item'>";
                print "<a href='" . RUTA . "accesoriosvarios' class='nav-link ";
                if (isset($datos["activo"]) && $datos["activo"] == "accesoriosvarios") print "active";
                print "'>Accesorios Varios</a>";
                print "</li>";

                print "<li class='nav-item'>";
                print "<a href='" . RUTA . "sobrenosotros' class='nav-link ";
                if (isset($datos["activo"]) && $datos["activo"] == "sobrenosotros") print "active";
                print "'>Sobre nosotros</a>";
                print "</li>";

                print "<li class='nav-item'>";
                print "<a href='" . RUTA . "contacto' class='nav-link ";
                if (isset($datos["activo"]) && $datos["activo"] == "contacto") print "active";
                print "'>Contacto</a>";
                print "</li>";
                print "</ul>";
                //
                print "<ul class='nav navbar-nav navbar-right'>";
                //
                print "<li class='nav-item'>";
                print "<a href='" . RUTA . "logout' class='nav-link ";
                if (isset($datos["activo"]) && $datos["activo"] == "cerrarsesion") print "active";
                print "'>Cerrar sesion</a>";
                print "</li>";
                print "</ul>";
            }
            if (isset($datos["admon"])) {
                if ($datos["admon"]) {
                    print "<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>";
                    print "<li class='nav-item'>";
                    print "<a href='" . RUTA . "admonUsuarios' class='nav-link'>Usuarios</a>";
                    print "</li>";
                    print "<li class='nav-item'>";
                    print "<a href='" . RUTA . "admonProductos' class='nav-link'>Productos</a>";
                    print "</li>";
                    print "</ul>";
                }
            }
            ?>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row content ">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <?php
                if (isset($datos["errores"])) {
                    if (count($datos["errores"]) > 0) {
                        print "<div class='alert alert-danger mt-3'>";
                        foreach ($datos["errores"] as $key => $valor) {
                            print "<strong>* " . $valor . "</strong> <br> ";
                        }
                        print "</div>";
                    }
                }



                ?>