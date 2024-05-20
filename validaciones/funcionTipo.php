<?php
function obtenerImagenTipo($tipo) {

    switch ($tipo) {
        case "fuego":
            return "fuego";
        case "agua":
            return "agua";
        case "hierba":
            return "hierba";
        case "electrico":
            return "electrico";

        default:
            return "default";
    }
}