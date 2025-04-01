<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJRCp1L7nA20kzNcsVs3t8gZq5Xn19xh+kseT1ZJh37wVFGJz9Q3Rjcqf4g1" crossorigin="anonymous">
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
            max-width: 600px;
            margin-top: 50px;
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

        .btn-success {
            background-color: #4CAF50;
            border: none;
        }

        .btn-success:hover {
            background-color: #45a049;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn i {
            margin-right: 10px;
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
        
        /* Stile per i messaggi di errore */
        .error-message {
            color: #dc3545;
            font-size: 0.9em;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1 class="text-primary">Evento</h1>
            <form id="eventoForm" action="GestisciEventoPHP.php" method="POST" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="ide" class="form-label">ID evento</label>
                    <input type="text" class="form-control" id="ide" name="ide" value="1" readonly>
                </div>
                <div class="mb-3">
                    <label for="Data" class="form-label">Data</label>
                    <input type="date" class="form-control" id="Data" name="Data" required>
                </div>
                <div class="mb-3">
                    <label for="Location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="Location" name="Location" required>
                </div>
                <div class="mb-3">
                    <label for="Posti" class="form-label">Posti Totali</label>
                    <input type="number" class="form-control" id="Posti" name="Posti" required min="0" oninput="validateSeats()">
                </div>
                <div class="mb-3">
                    <label for="Posti-dis" class="form-label">Posti disponibili</label>
                    <input type="number" class="form-control" id="Posti-dis" name="Posti-dis" required min="0" oninput="validateSeats()">
                </div>
                <div class="mb-3">
                    <label for="Posti-occ" class="form-label">Posti occupati</label>
                    <input type="number" class="form-control" id="Posti-occ" name="Posti-occ" required min="0" oninput="validateSeats()">
                    <div id="seatsError" class="error-message">Errore: I posti disponibili + posti occupati devono essere uguali ai posti totali.</div>
                </div>



                <!-- <button type="submit" name="action" value="insert" class="btn btn-success mb-1">
                    <i class="bi bi-file-diff"></i>
                    <a href="GestisciEventoPHP.php" class="text-white">Aggiungi</a>
                </button> -->
                <button type="submit" name="action" value="update" class="btn btn-primary mb-1">
                    <i class="bi bi-file-diff"></i>
                    <span class="text-white">Modifica</span>
                </button>
                <button type="submit" name="action" value="delete" class="btn btn-danger mb-1">
                    <i class="bi bi-file-earmark-minus"></i>
                    <span class="text-white">Elimina</span>
                </button>


    
                <p class="text-muted text-center mt-3">Nota: I campi sono obbligatori.</p>

                <a href="index.php" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);" 
                    class="btn btn-secondary btn-block mt-1">Torna alla Home</a>
            </form>
        </div>
    </div>

    <script>
        function validateSeats() {
            const postiTotali = parseInt(document.getElementById('Posti').value) || 0;
            const postiDisponibili = parseInt(document.getElementById('Posti-dis').value) || 0;
            const postiOccupati = parseInt(document.getElementById('Posti-occ').value) || 0;
            
            const errorElement = document.getElementById('seatsError');
            
            // Verifica se tutti i campi sono stati compilati
            if (postiTotali && postiDisponibili && postiOccupati) {
                if (postiDisponibili + postiOccupati !== postiTotali) {
                    errorElement.style.display = 'block';
                    return false;
                } else {
                    errorElement.style.display = 'none';
                    return true;
                }
            }
            return true; // Non mostrare errori se non tutti i campi sono stati compilati
        }
        
        function validateForm() {
            return validateSeats();
        }
        
        // Esegui la validazione iniziale
        document.addEventListener('DOMContentLoaded', function() {
            validateSeats();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0V93FGtS+MKV1w4vmgQDKY4i2+fS3yyTupknDO3dzVgSpxAd"
        crossorigin="anonymous"></script>
</body>

</html>
