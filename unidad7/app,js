// Seleccionar elementos
const titulo = document.getElementById("titulo");
const parrafos = document.querySelectorAll(".parrafo");
const boton = document.getElementById("boton");

// Cambiar texto al hacer clic en el botón
boton.addEventListener("click", () => {
  titulo.textContent = "Texto cambiado dinámicamente";
  parrafos.forEach((p, index) => {
    p.textContent = `Este es el párrafo ${index + 1} cambiado`;
  });
});