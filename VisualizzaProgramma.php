<?php
// Impostare la zona oraria predefinita
date_default_timezone_set('Europe/Rome');

// Connessione al database
require('connection.php');

// Recupera tutti gli eventi
$query_evento = "SELECT * FROM evento";
$result_evento = $conn->query($query_evento);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza Programma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f6f9;
            color: #333;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin-top: 20px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            color: #2d3b45;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn {
            font-size: 1em;
            padding: 10px 20px;
            border-radius: 50px;
            margin-bottom: 10px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            width: 90.5%;
        }

        .form-label {
            font-weight: bold;
        }

        .text-muted {
            font-size: 0.9em;
        }

        /* Margine tra il pulsante e gli input */
        .btn-success {
            margin-top: 15px;
        }

        /* Spaziatura tra gli input e il pulsante */
        .mb-3 {
            margin-bottom: 20px;
            /* Maggiore spaziatura tra input */
        }

        /* Aggiungi uno spazio tra il form e la card */
        .card {
            padding: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1 class="text-primary">Visualizza Programma</h1>

            <?php
            if ($result_evento->num_rows > 0) {
                while ($evento = $result_evento->fetch_assoc()) {
            ?>
                    <h4 class="text-center text-success">Informazioni:</h4>
                    <p class="text-center"><?php echo "Luogo: ". $evento['luogo']; ?></p>
                    <p class="text-center"><?php echo "Posti totali: ". $evento['posti_totali']; ?></p>
                    <p class="text-center"><?php echo "Posti disponibili: ". $evento['posti_disponibili']; ?></p>
                    <p class="text-center"><?php echo "Posti occupati: ". $evento['posti_occupati']; ?></p>
                    <p class="text-center"><?php echo date('d-m-Y', strtotime($evento['data'])); ?></p>

                    <!-- Elenco delle canzoni per questo evento -->
                    <h4 class="text-center text-success">Canzoni:</h4>
                    <ul class="list-group">
                        <?php
                        // Recupero tutte le canzoni senza filtro evento_id
                        $query_canzone = "SELECT * FROM canzone ORDER BY orario";
                        $result_canzone = $conn->query($query_canzone);

                        if ($result_canzone->num_rows > 0) {
                            while ($canzone = $result_canzone->fetch_assoc()) {
                                // Recupero il nome del cantante dalla tabella cantante
                                $cantante_id = $canzone['cantante'];
                                $query_cantante = "SELECT nome, cognome FROM cantante WHERE id_cantante = $cantante_id";
                                $result_cantante = $conn->query($query_cantante);
                                
                                // Se il cantante è trovato, concateno nome e cognome
                                if ($result_cantante->num_rows > 0) {
                                    $cantante = $result_cantante->fetch_assoc();
                                    $nome_cantante = $cantante['nome'] . ' ' . $cantante['cognome'];
                                } else {
                                    $nome_cantante = "Cantante sconosciuto"; // Se il cantante non è trovato
                                }
                        ?>
                                <li class="list-group-item">
                                    <strong><?php echo $canzone['titolo']; ?></strong> 
                                    - Cantante: <?php echo $nome_cantante; ?> 
                                    - Orario: <?php echo date('H:i', strtotime($canzone['orario'])); ?>
                                </li>
                        <?php
                            }
                        } else {
                        ?>
                            <li class="list-group-item">Nessuna canzone prevista per questo evento.</li>
                        <?php 
                        }
                        ?>
                    </ul>

                    <hr>
            <?php
                }
            } else {
            ?>
                <p class="text-center">Nessun evento trovato.</p>
            <?php 
            }
            ?>
            <a href="login.php" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);"
            class="btn btn-secondary btn-block mt-1">Torna alla Home</a>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>

<?php
$conn->close();
?>
