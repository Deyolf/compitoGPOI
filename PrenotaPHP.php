<?php
require("connection.php"); // Connessione al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $cognome = htmlspecialchars($_POST['cognome']);
    $data_nascita = htmlspecialchars($_POST['data_nascita']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $provincia = htmlspecialchars($_POST['provincia']);
    $nazionalita = htmlspecialchars($_POST['nazionalita']);
    $citta = htmlspecialchars($_POST['citta']);
    $via = htmlspecialchars($_POST['via']);
    $cap = htmlspecialchars($_POST['cap']);
    $civico = htmlspecialchars($_POST['civico']);
    $IBAN = htmlspecialchars($_POST['IBAN']);
    $nposto = htmlspecialchars($_POST['nposto']);
    $evento_id = 1;  // ID dell'evento, da passare nel form

    // Controllo se l'utente esiste già (ad esempio, con il numero di telefono come identificatore unico)
    $check = $conn->prepare("SELECT id_utente FROM utente WHERE telefono = ?");
    $check->bind_param("s", $telefono);
    $check->execute();
    $result = $check->get_result();
    
    if ($result->num_rows > 0) {
        // Se esiste già, recupero l'ID esistente
        $row = $result->fetch_assoc();
        $id_utente = $row['id_utente'];

        // Fai un UPDATE per l'utente esistente
        $stmt = $conn->prepare("UPDATE utente SET nome = ?, cognome = ?, data_nascita = ?, provincia = ?, nazionalita = ?, citta = ?, via = ?, cap = ?, civico = ?, IBAN = ? WHERE telefono = ?");
        $stmt->bind_param("sssssssssss", $nome, $cognome, $data_nascita, $provincia, $nazionalita, $citta, $via, $cap, $civico, $IBAN, $telefono);
    } else {
        // Altrimenti fai un INSERT per un nuovo utente
        $stmt = $conn->prepare("INSERT INTO utente (nome, cognome, data_nascita, telefono, provincia, nazionalita, citta, via, cap, civico, IBAN) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $nome, $cognome, $data_nascita, $telefono, $provincia, $nazionalita, $citta, $via, $cap, $civico, $IBAN);
        
        if ($stmt->execute()) {
            // Recupero l'id dell'utente appena inserito
            $id_utente = $conn->insert_id;
        } else {
            echo "Errore: " . $stmt->error;
            exit();
        }
    }
    
    $stmt->close();

    // Ora aggiorno la tabella `evento` per diminuire i posti disponibili di 1
    $update_evento = $conn->prepare("UPDATE evento SET posti_disponibili = posti_disponibili - 1 WHERE id_evento = ? AND posti_disponibili > 0");
    $update_evento->bind_param("i", $evento_id);
    
    if ($update_evento->execute()) {
        echo "Posto disponibile decrementato.";
    } else {
        echo "Errore nell'aggiornamento dei posti disponibili: " . $update_evento->error;
    }

    // Ora aggiorno la tabella `evento` per aumentare i posti occupati di 1
    $update_evento = $conn->prepare("UPDATE evento SET posti_occupati = posti_occupati + 1 WHERE id_evento = ? AND posti_occupati > 0");
    $update_evento->bind_param("i", $evento_id);

    if ($update_evento->execute()) {
        echo "Posto disponibile decrementato.";
    } else {
        echo "Errore nell'aggiornamento dei posti occupati: " . $update_evento->error;
    }

    $update_evento->close();

    // Inserisco la prenotazione
    $stmt2 = $conn->prepare("INSERT INTO prenotazioni (utente, numero_posto) VALUES (?, ?)");
    $stmt2->bind_param("ss", $id_utente, $nposto);
    
    if ($stmt2->execute()) {
        echo "Prenotazione aggiunta con successo.";
    } else {
        echo "Errore nella prenotazione: " . $stmt2->error;
    }

    $stmt2->close();
    $conn->close();
    
    // Dopo aver completato tutto, redirigo
    header("Location: UserHome.php");
    exit();
} else {
    echo "Richiesta non valida.";
}

?>
