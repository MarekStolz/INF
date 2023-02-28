$(document).ready(function() {
  setInterval(function() {
      $.ajax({
          url: "../INF/APP/table.php", // zde je potřeba uvést cestu k PHP skriptu, který vrací aktualizovanou tabulku
          cache: false,
          success: function(data) {
              $('#flight-table').html(
                  data); // nahrazení obsahu tabulky novými daty
          }
      });
  }, 3000); // interval aktualizace v milisekundách
});