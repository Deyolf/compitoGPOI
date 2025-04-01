<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prenotazione</title>
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
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1 class="text-primary">Prenotazione</h1>
            <form action="PrenotaPHP.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cognome" class="form-label">Cognome</label>
                        <input type="text" class="form-control" id="cognome" name="cognome" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="data_nascita" class="form-label">Data di Nascita</label>
                        <input type="date" class="form-control" id="data_nascita" name="data_nascita" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="provincia" class="form-label">Provincia</label>
                        <input type="text" class="form-control" id="provincia" name="provincia">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nazionalita" class="form-label">Nazionalità</label>
                        <input type="text" class="form-control" id="nazionalita" name="nazionalita">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="citta" class="form-label">Città</label>
                        <input type="text" class="form-control" id="citta" name="citta">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="via" class="form-label">Via</label>
                        <input type="text" class="form-control" id="via" name="via">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="cap" class="form-label">CAP</label>
                        <input type="text" class="form-control" id="cap" name="cap">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="civico" class="form-label">Civico</label>
                        <input type="text" class="form-control" id="civico" name="civico">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="IBAN" class="form-label">IBAN</label>
                        <input type="text" class="form-control" id="IBAN" name="IBAN" required maxlength="34" minlength="27" pattern="[A-Za-z0-9]{27,34}" title="L'IBAN deve essere compreso tra 27 e 34 caratteri alfanumerici.">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nposto" class="form-label">Numero Posto</label>
                        <input type="number" class="form-control" id="nposto" name="nposto" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Prenota</button>
            
                <a href="UserHome.php" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); "
                class="btn btn-secondary btn-block mt-1">Torna alla Home</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
