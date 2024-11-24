<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Truck Ordering App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            font-size: 2.5rem;
            color: #222;
        }
        p {
            margin: 0.5rem 0;
            font-size: 1.2rem;
        }
        a {
            margin-top: 1rem;
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Truck Ordering App</h1>
    <p>Simplify your logistics with our reliable truck ordering platform.</p>
    <a href="/admin">Go to Admin Panel</a>
    <footer style="margin-top: 20px;">
        <p>Truck Ordering App © {{ date('Y') }}</p>
    </footer>
</body>
</html>
