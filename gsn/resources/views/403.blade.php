<!-- resources/views/errors/403.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Denied</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 48px;
            color: #333;
        }
        p {
            font-size: 18px;
            color: #666;
        }
        a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>OUPS......</h1>
        <p>Malheureusement, vous n'avez pas la permission d'y accéder</p>
        <p><a href="{{ route('logout.cas') }}">Déconnexion</a></p>
    </div>
</body>
</html>
