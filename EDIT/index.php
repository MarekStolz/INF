<?php
// Připojení k databázi
$servername = "localhost"; // Adresa serveru
$username = "root"; // Uživatelské jméno pro přihlášení do MySQL
$password = ""; // Heslo pro přihlášení do MySQL
$dbname = "lety"; // Název databáze

$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola připojení
if ($conn->connect_error) {
  die("Připojení selhalo: " . $conn->connect_error);
}

// Výběr dat z tabulky
$sql = "SELECT * FROM flight";
$result = $conn->query($sql);

// Vypsání dat v tabulce
if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Kód letu</th><th>Cílová destinace</th><th>Datum a čas odletu</th><th>Kód gate</th><th>Status</th><th>IfDelayed</th><th>Upravit</th></tr>";
  // Výpis řádků s daty
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["code"]."</td><td>".$row["destination"]."</td><td>".$row["from_dttm"]."</td><td>".$row["gate_code"]."</td><td>".$row["status"]."</td><td>".$row["ifdelayed"]."</td><td><form action='edit.php' method='post'><input type='hidden' name='id' value='".$row["id"]."'/><input type='submit' name='submit' value='Upravit'/></form></td></tr>";
  }
  echo "</table>";
} else {
  echo "0 výsledků";
}

// Uzavření spojení s databází
$conn->close();
?>
