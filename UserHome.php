<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJRCp1L7nA20kzNcsVs3t8gZq5Xn19xh+kseT1ZJh37wVFGJz9Q3Rjcqf4g1" crossorigin="anonymous"> <!-- Aggiungi il link a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> <!-- Aggiungi il link per le icone Bootstrap -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f6f9;
            color: #333;
            height: 100vh;
        }
        .container {
            max-width: 500px;
            margin-top: 50px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 3em;
            color: #2d3b45;
            margin-bottom: 30px;
        }
        .btn {
            font-size: 1.2em;
            padding: 15px 30px;
            border-radius: 50px;
            margin-bottom: 15px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
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

        /* Centra il contenitore sia orizzontalmente che verticalmente */
        .full-screen-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="full-screen-container">
        <div class="container"> <!-- Per allineare i pulsanti uno sotto l'altro-->
            <div class="card">
                <h1 class="text-center text-primary">User</h1>
                <div class="d-grid gap-3">
                    <button class="btn btn-success">
                        <i class="bi bi-file-earmark-text"></i>
                        <a href="Prenota.php" class="text-white">Prenota</a>
                    </button>
                    <button class="btn btn-primary">
                        <i class="bi bi-book"></i>
                        <a href="VisualizzaProgramma.php" class="text-white">Visualizza Programma</a>
                    </button>
                    <button class="btn btn-light">
                        <i class="bi bi-book"></i>
                        <a href="login.php" class="text-white">Logout</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0V93FGtS+MKV1w4vmgQDKY4i2+fS3yyTupknDO3dzVgSpxAd" crossorigin="anonymous"></script>
</body>
</html>
