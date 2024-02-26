<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <!-- Navigation bar -->
    <header class="bg-red" style="position: fixed; width: 100%; margin-top: 0px; background-color: rgb(246, 236, 255); box-shadow: 2px 2px 20px 2px rgba(137, 43, 226, 0.098);">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global"
            style="padding: 20px 20px;">
            <div class="flex lg:flex-1" style="margin-top: -11px;">
                <h1>
                    <a href="#" class="-m-1.5 p-1.5" style="font-size: 30px; font-weight: 900;">
                        CMDb
                    </a>
                </h1>
            </div>
            <div class="flex lg:hidden">
                <button type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Movies</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">My Reviews</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">My Watchlist</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <span id="user-info" class="text-sm font-semibold leading-6 text-gray-900"></span>
                <button id="logout-btn"
                    class="text-sm font-semibold leading-6 text-gray-900 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">Logout</button>
            </div>
        </nav>
    </header>

    <!-- Main content -->
    <div class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
                    <p id="logged-in-as" class="mb-2"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fetch user info and update the UI
        document.addEventListener("DOMContentLoaded", function () {
            fetchUserInfo();
        });

        // Logout button click event handler
        document.getElementById('logout-btn').addEventListener('click', function () {
            logout();
        });

        // Function to fetch user info and update the UI
        function fetchUserInfo() {
            fetch('/user-info') // Replace with your route to fetch user info
                .then(response => response.json())
                .then(data => {
                    document.getElementById('user-info').textContent = `Logged in as ${data.name} (${data.email})`;
                })
                .catch(error => {
                    console.error('Error fetching user info:', error);
                });
        }

        // Function to logout
        function logout() {
            fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Use Laravel's csrf token
                    }
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = '/login'; // Redirect to login page after logout
                    } else {
                        console.error('Logout failed:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Logout failed:', error);
                });
        }
    </script>
</body>

</html>
