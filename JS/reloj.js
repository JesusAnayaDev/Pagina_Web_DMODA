const d = document;

export function digitalClock(clock) {
  setInterval(() => {
    let clockHour = new Date().toLocaleTimeString();
    d.querySelector(clock).innerHTML = `<h3>${clockHour}</h3>`;
    d.querySelector('h3').classList.add("relojDigital");
  }, 1000);
}
