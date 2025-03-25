<?php
require("connection.php"); // Connessione al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_prenotazione = htmlspecialchars($_POST['id_prenotazione']);
    $utente = htmlspecialchars($_POST['utente']);
    $numero_posto =htmlspecialchars($_POST['numero_posto']);
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action == "insert") {
        $stmt = $conn->prepare("INSERT INTO prenotazioni (id_utente, numero_posto) VALUES (?, ?)");
        $stmt->bind_param("is", $utente, $numero_posto);
    } elseif ($action == "update") {
        $stmt = $conn->prepare("UPDATE prenotazioni SET id_utente = ?, numero_posto = ? WHERE id_prenotazione = ?");
        $stmt->bind_param("isi", $utente, $numero_posto, $id_prenotazione);
    } elseif ($action == "delete") {
        $stmt = $conn->prepare("DELETE FROM prenotazioni WHERE id_prenotazione = ?");
        $stmt->bind_param("i", $id_prenotazione);
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
    header("Location: GestisciPrenotazioni.php");
    exit();
} else {
    echo "Richiesta non valida.";
}
