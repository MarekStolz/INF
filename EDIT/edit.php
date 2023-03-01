<?php
// Připojení k databázi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lety";

$conn = new mysqli($servername, $username, $password, $dbname);

// Zpracování formuláře po odeslání
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Získání hodnot z formuláře
    $id = $_POST['id'];
    $code = $_POST['code'];
    $destination = $_POST['destination'];
    $gate_code = $_POST['gate_code'];
    $status = $_POST['status'];

    // Aktualizace dat v databázi
    $sql = "UPDATE flight SET code='$code', destination='$destination', gate_code='$gate_code', status='$status' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Data byla úspěšně aktualizována.";
    } else {
        echo "Chyba při aktualizaci dat: " . $conn->error;
    }
}

// Načtení dat z databáze
$id = $_GET['id'];
$sql = "SELECT * FROM flight WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Výpis formuláře pro editaci dat
    $row = $result->fetch_assoc();
    ?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Code: <input type="text" name="code" value="<?php echo $row['code']; ?>"><br>
        Destination: <input type="text" name="destination" value="<?php echo $row['destination']; ?>"><br>
        Gate Code: <input type="text" name="gate_code" value="<?php echo $row['gate_code']; ?>"><br>
        Status:
        <select name="status">
            <option value="OK" <?php if ($row['status'] == 'OK') echo 'selected'; ?>>OK</option>
            <option value="CANCELED" <?php if ($row['status'] == 'CANCELED') echo 'selected'; ?>>CANCELED</option>
            <option value="DELAYED" <?php if ($row['status'] == 'DELAYED') echo 'selected'; ?>>DELAYED</option>
        </select><br>
        <input type="submit" value="Uložit">
    </form>
    <?php
} else {
    echo "Žádná data nebyla nalezena.";
}

$conn->close();
?>
