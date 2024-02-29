<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | CMDb</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px; /* Adjust as needed */
        }
        .heading {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        .content {
            color: #555;
            margin-bottom: 20px;
        }
        .navbar {
            background-color: rgb(246, 236, 255);
            box-shadow: 2px 2px 20px 2px rgba(137, 43, 226, 0.098);
            position: fixed;
            width: 100%;
            z-index: 999; /* Ensure it's above other elements */
        }
        .navbar a {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-right: 20px;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }
        .navbar a:hover {
            color: #6c63ff;
        }
        .navbar .logo {
            font-size: 30px;
            font-weight: 900;
        }
        .logout-btn {
            background-color: #6c63ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        .logout-btn:hover {
            background-color: #5649b3;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <nav class="max-w-7xl mx-auto flex items-center justify-between p-6 lg:px-8">
            <div class="flex lg:flex-1">
                <h1>
                    <a href="#" class="logo">CMDb</a>
                </h1>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="/movies">Movies</a>
                <a href="/userdashboard">My Reviews</a>
                <a href="/watchlist">Watchlist</a>
            </div>
            <div class="flex lg:flex-1 lg:justify-end">
                <span id="user-info" class="text-sm font-semibold leading-6 text-gray-900" style="margin-top:7px;">{{ Auth::user()->name }}</span>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </nav>
    </header>
    <br /><br /><br /><br />
    
    <div class="container">
        <div class="heading">Admin Dashboard</div>
        <div class="content">
            You're logged in as {{ Auth::user()->role ? "user" : "admin" }}
        </div>
    </div>
</body>
</html>
