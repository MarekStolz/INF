setInterval(function() {
  var d = new Date();
  var date = d.toLocaleDateString();
  var time = d.toLocaleTimeString();
  document.getElementById("cas").innerHTML = " Aktuální datum a čas: " + date + " " + time;
}, 1000);
