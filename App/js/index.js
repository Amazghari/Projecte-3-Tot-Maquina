import $ from "jquery";

import hola from "./hola.js";

import {Example, obj} from "./example.ts";

$(function() {
    console.log('Hello World');
    hola();
    console.log("Example", obj);
});

// Espera a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Función para alternar la visibilidad del menú
    document.getElementById("hamburger-button").addEventListener("click", function() {
        const navbar = document.getElementById("navbar-default");
        navbar.classList.toggle("hidden"); // Alterna la clase 'hidden' para mostrar/ocultar el menú
    });
});