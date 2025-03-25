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

        /* Aggiunto maggiore spazio dopo il select */
        .mb-3 {
            margin-bottom: 30px;
        }

        /* Sistemato spazio per i pulsanti */
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .card {
            padding: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1 class="text-primary">Canzoni</h1>
            <form action="ModificaCanzoniPHP.php" method="POST">
                <div class="mb-3">
                    <label for="Nome" class="form-label">ID Canzone</label>
                    <input type="text" class="form-control" id="id_canzone" name="id_canzone">
                </div>
                <div class="mb-3">
                    <label for="Nome" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="titolo" name="titolo" required>
                </div>
                <div class="mb-3">
                    <label for="Indirizzo" class="form-label">Orario</label>
                    <input type="text" class="form-control" id="orario" name="orario" required>
                </div>
                <div class="mb-3">
                    <label for="cantante" class="form-label">Cantante</label>
                    <select class="form-control" name="cantante" id="cantante" required>
                        <option value="" disabled selected>Seleziona un cantante</option>
                        <?php
                            require_once("connection.php");
                            
                            $result = $conn->query("SELECT id_cantante, nome, cognome FROM cantante");

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . htmlspecialchars($row["id_cantante"]) . "'>" . 
                                        htmlspecialchars($row["nome"] . " " . $row["cognome"] ." - " . $row["id_cantante"]) . 
                                        "</option>";
                                }
                            } else {
                                echo "<option value='' disabled>Nessun cantante trovato</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="btn-group">
                    <button type="submit" name="action" value="add" class="btn btn-success">
                        <i class="bi bi-file-earmark-plus"></i>
                        Aggiungi
                    </button>
                    <button type="submit" name="action" value="update" class="btn btn-primary">
                        <i class="bi bi-file-diff"></i>
                        Modifica
                    </button>
                    <button type="submit" name="action" value="delete" class="btn btn-danger">
                        <i class="bi bi-file-earmark-minus"></i>
                        Elimina
                    </button>
                </div>
                
                <p class="text-muted text-center mt-3">Nota: Id canzone è da mettere solo in caso si aggiunge una canzone</p>

                <a href="index.php" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);" class="btn btn-secondary btn-block mt-3">Torna alla Home</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0V93FGtS+MKV1w4vmgQDKY4i2+fS3yyTupknDO3dzVgSpxAd"
        crossorigin="anonymous"></script>
</body>

</html>