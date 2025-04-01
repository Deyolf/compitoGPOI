<?php
require("connection.php"); // Connessione al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Usa explode per separare e prendere l'ultimo elemento (l'ID)
    $id_cantante = htmlspecialchars($_POST['cantante']);
    $titolo = htmlspecialchars($_POST['titolo']);
    $orario = htmlspecialchars($_POST['orario']);
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $stmt = null;

    if ($id_cantante <= 0) {
        die("ID cantante non valido.");
    }

    try {
        if ($action == "add") {
            // Per l'inserimento, l'ID canzone è opzionale
            $id_canzone = !empty($_POST['id_canzone']) ? intval($_POST['id_canzone']) : null;

            if ($id_canzone) {
                $stmt = $conn->prepare("INSERT INTO canzone (id_canzone, cantante, titolo, orario) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $id_canzone, $id_cantante, $titolo, $orario);
            } else {
                $stmt = $conn->prepare("INSERT INTO canzone (cantante, titolo, orario) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $id_cantante, $titolo, $orario);
            }
        } else if ($action == "update") {
            $id_canzone = intval($_POST['id_canzone']);
            $stmt = $conn->prepare("UPDATE canzone SET titolo = ?, orario = ?, cantante = ? WHERE id_canzone = ?");
            $stmt->bind_param("ssss", $titolo, $orario, $id_cantante, $id_canzone);
        } else if ($action == "delete") {
            $id_canzone = intval($_POST['id_canzone']);
            $stmt = $conn->prepare("DELETE FROM canzone WHERE id_canzone = ?");
            $stmt->bind_param("s", $id_canzone);
        } else {
            throw new Exception("Azione non valida.");
        }

        if (!$stmt->execute()) {
            throw new Exception("Errore nell'esecuzione: " . $stmt->error);
        }

        // Reindirizzamento dopo l'operazione riuscita
        header("Location: ModificaCanzoni.php");
        exit();

    } catch (Exception $e) {
        // Gestione degli errori più dettagliata
        echo "Errore: " . $e->getMessage();
        exit();
    }
} else {
    echo "Richiesta non valida.";
}
?>