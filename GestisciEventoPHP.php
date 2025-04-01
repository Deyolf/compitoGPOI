<?php
require("connection.php"); // Connessione al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $posti_dis = htmlspecialchars($_POST['Posti-dis']);
    $posti_occ = htmlspecialchars($_POST['Posti-occ']);
    $posti = htmlspecialchars($_POST['Posti']);
    $location = htmlspecialchars($_POST['Location']);
    $data = htmlspecialchars($_POST['Data']);
    $id_evento = htmlspecialchars($_POST['ide']);
    
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    if ($action == "insert") {
        // Controlla se l'ID evento esiste già
        $check = $conn->prepare("SELECT id_evento FROM evento WHERE id_evento = ?");
        $check->bind_param("s", $id_evento);
        $check->execute();
        $result = $check->get_result();
        
        if ($result->num_rows > 0) {
            // Se esiste già, fai un UPDATE invece di INSERT
            $stmt = $conn->prepare("UPDATE evento SET luogo = ?, data = ?, posti_totali = ?, posti_disponibili = ?, posti_occupati = ? WHERE id_evento = ?");
            $stmt->bind_param("ssssss", $location, $data, $posti, $posti_dis, $posti_occ, $id_evento);
        } else {
            // Altrimenti fai un INSERT normalmente
            $stmt = $conn->prepare("INSERT INTO evento(id_evento, luogo, data, posti_totali, posti_disponibili, posti_occupati) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("ssssss", $id_evento, $location, $data, $posti, $posti_dis, $posti_occ);
        }
    } else if ($action == "update") {
        $stmt = $conn->prepare("UPDATE evento SET luogo = ?, data = ?, posti_totali = ?, posti_disponibili = ?, posti_occupati = ? WHERE id_evento = ?");
        $stmt->bind_param("ssssss", $location, $data, $posti, $posti_dis, $posti_occ, $id_evento);
    } else if ($action == "delete") {
        $stmt = $conn->prepare("DELETE FROM evento WHERE id_evento = ?");
        $stmt->bind_param("s", $id_evento);
    } else {
        die("Azione non valida.");
    }
    
    if ($stmt->execute()) {
        echo "Operazione riuscita.";
    } else {
        echo "Errore: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
    
    header("Location: index.php");
    exit();
} else {
    echo "Richiesta non valida.";
}
?>