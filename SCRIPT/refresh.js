$(document).ready(function() {
  setInterval(function() {
      $.ajax({
          url: "../INF/APP/table.php", 
          cache: false,
          success: function(data) {
              $('#flight-table').html(
                  data); // nahrazení obsahu tabulky novými daty
          }
      });
  }, 3000); 
});