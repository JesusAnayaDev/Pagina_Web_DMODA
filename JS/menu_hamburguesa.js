export default function hamburguerMenu(btnPanel, panel){
    const d = document;

    d.addEventListener("click", e => {
        if(e.target.matches(btnPanel) || e.target.matches(`${btnPanel} *`)) {
            d.querySelector(panel).classList.toggle("is-active");
            d.querySelector(btnPanel).classList.toggle("is-active");
        }
    })
}