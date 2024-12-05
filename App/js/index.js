import $ from "jquery";

import hola from "./hola.js";
import "./cam.js";

import "./navbar.js";
import "../../public/js/mapahome.js"

 
import {Example, obj} from "./example.ts";

$(function() {
    console.log('Hello World');
    hola();
    console.log("Example", obj);
});

