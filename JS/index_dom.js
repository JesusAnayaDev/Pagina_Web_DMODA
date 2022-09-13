import hamburguerMenu from "./menu_hamburguesa.js";
import { digitalClock } from "./reloj.js";

const d = document;

d.addEventListener("DOMContentLoaded", e=> {
    hamburguerMenu(".btn-config", ".enlaces");
    digitalClock(".reloj", ".relojDigital");
})
