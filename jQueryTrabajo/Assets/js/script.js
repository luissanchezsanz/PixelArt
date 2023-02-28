$(document).ready(function() {
    $('a').on('click', function() {
      // Recuperar las coordenadas del pixel correspondiente
      var coords = $(this).data('coords').split(',');
      var x = parseInt(coords[0]);
      var y = parseInt(coords[1]);
  
      // Abrir formulario para elegir el color
      var color = prompt("Elija un color en formato hexadecimal (#RRGGBB):");
      if (color) {
        // Llamar a la función updateColor con las coordenadas y el color elegido
        $.ajax({
          url: "actualizar.php",
          type: "POST",
          data: {
            x: x,
            y: y,
            color: color
          },
          success: function(response) {
            // Mostrar mensaje de éxito o error
            alert(response);
          },
          error: function(xhr, status, error) {
            // Mostrar mensaje de error en caso de que la actualización falle
            alert("Error al actualizar el color del pixel: " + xhr.responseText);
          }
        });
      }
    });
  });