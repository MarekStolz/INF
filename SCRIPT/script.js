setInterval(function(){
    refreshData();
}, 30000); //30 seconds

function refreshData() {
    $.ajax({
        url: 'table.php',
        success: function(data) {
            //update the table with the new data
        }
    });
}