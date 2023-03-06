setInterval(function() {
  var d = new Date();
  var date = d.toLocaleDateString();
  var time = d.toLocaleTimeString();
  document.getElementById("cas").innerHTML = " Current date and time: " + date + " " + time;
}, 1000);
