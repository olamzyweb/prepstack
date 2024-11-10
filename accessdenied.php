<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Fullscreen container styling */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .error-container {
            text-align: center;
            padding: 40px;
            background: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 500px;
            width: 100%;
        }

        .error-container h1 {
            font-size: 8rem;
            font-weight: bold;
            color: #dc3545;
        }

        .error-container h2 {
            font-size: 1.5rem;
            font-weight: 500;
            color: #333;
            margin-bottom: 20px;
        }

        .error-container p {
            color: #6c757d;
            margin-bottom: 30px;
        }

        .btn-back-home {
            font-size: 1rem;
            font-weight: 600;
            background-color: #f39c12;
            border-color: black;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-back-home:hover {
            background-color: #f39c12;
            border-color: black;
        }
    </style>
</head>
<body>

<div class="error-container">
    <h1>Access Denied</h1>
    <h2>Oops! Something went wrong</h2>
    <p>Payment not confirmed</p>
    <p>Need Help?  <a>Chat Support</a></p>
    <a href="catalog.php" class="btn btn-back-home">Back to Home</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
