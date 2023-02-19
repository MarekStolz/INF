function checkForUpdates() {
    $.ajax({
      url: '../INF/APP/table.php',
      type: 'GET',
      success: function(response) {
        if (response === '1') {
          location.reload();
        }
      },
      complete: function() {
        // spustit opět každých 30 sekund
        setTimeout(checkForUpdates, 3000);
      }
    });
  }
  
  // spustit po načtení stránky
  $(document).ready(function() {
    setTimeout(checkForUpdates, 3000);
  });
  