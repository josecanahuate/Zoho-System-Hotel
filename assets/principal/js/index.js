const formulario = document.querySelector("#formulario");
//VALIDAR CAMPOS DEL FORMULARIO
document.addEventListener("DOMContentLoaded", function () {
  formulario.addEventListener("submit", function (e) {
    e.preventDefault();
    if (
      formulario.fecha_llegada.value == "" ||
      formulario.fecha_salida.value == "" ||
      formulario.habitacion.value == ""
    ) {
      alertSW("TODOS LOS CAMPOS SON REQUERIDOS", "warning");
    } else {
      this.submit();
    }
  });
});
