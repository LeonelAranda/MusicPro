window.onload = function () {
    document.getElementById("cuerdas").style.display = "none";
    document.getElementById("percusion").style.display = "none";
    document.getElementById("amplificadores").style.display = "none";
    document.getElementById("cajas").style.display = "none";
    document.getElementById("accesoriosVarios").style.display = "none";

    //Detectamos cambios en el select
    document.getElementById("tipo").onchange = function () {
        if (this.value == 1) {
            document.getElementById("cuerdas").style.display = "none";
            document.getElementById("percusion").style.display = "block";
            document.getElementById("amplificadores").style.display = "block";
            document.getElementById("cajas").style.display = "block";
            document.getElementById("accesoriosVarios").style.display = "block";

        } else if (this.value == 2) {

            document.getElementById("cuerdas").style.display = "block";
            document.getElementById("percusion").style.display = "none";
            document.getElementById("amplificadores").style.display = "block";
            document.getElementById("cajas").style.display = "block";
            document.getElementById("accesoriosVarios").style.display = "block";

        } else if (this.value == 3) {

            document.getElementById("cuerdas").style.display = "block";
            document.getElementById("percusion").style.display = "block";
            document.getElementById("amplificadores").style.display = "none";
            document.getElementById("cajas").style.display = "block";
            document.getElementById("accesoriosVarios").style.display = "block";

        } else if (this.value == 4) {

            document.getElementById("cuerdas").style.display = "block";
            document.getElementById("percusion").style.display = "block";
            document.getElementById("amplificadores").style.display = "block";
            document.getElementById("cajas").style.display = "none";
            document.getElementById("accesoriosVarios").style.display = "block";

        } else if (this.value == 5) {

            document.getElementById("cuerdas").style.display = "block";
            document.getElementById("percusion").style.display = "block";
            document.getElementById("amplificadores").style.display = "block";
            document.getElementById("cajas").style.display = "block";
            document.getElementById("accesoriosVarios").style.display = "none";

        } else {

            document.getElementById("cuerdas").style.display = "block";
            document.getElementById("percusion").style.display = "block";
            document.getElementById("amplificadores").style.display = "block";
            document.getElementById("cajas").style.display = "block";
            document.getElementById("accesoriosVarios").style.display = "block";


        }

    }

}