import hamburguerMenu from "./menu_hamburguesa.js";
import { digitalClock } from "./reloj.js";
import scrollTopButton from "./boton_scroll.js";
import darkTheme from "./tema_dark.js";
import searchFilters from "./filtro_busquedas.js";
import slider from "./carrusel.js";
import contactFormValidations from "./validaciones_form.js";

const d = document;

d.addEventListener("DOMContentLoaded", e=> {
    hamburguerMenu(".btn-config", ".enlaces");
    digitalClock(".reloj", ".relojDigital");
    scrollTopButton(".scroll-top-btn");
    searchFilters(".card-filter", ".cards");
    slider();
    contactFormValidations();
})

darkTheme(".dark-theme-btn", "dark-mode", "dark-mode-btn");
