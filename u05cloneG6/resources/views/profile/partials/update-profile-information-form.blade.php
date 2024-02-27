<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white-100 dark:bg-gray-900">
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
                <span id="user-info"
                    class="text-sm font-semibold leading-6 text-gray-900">John Doe</span>
                <form action="#" method="post">
                    @csrf
                    <button type="submit"
                        class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">Logout</button>
                </form>
            </div>
        </nav>
    </header>
    <br><br><br><br><br>

    <!-- Profile Information Section -->
    <div class="">
        <section class="bg-white dark:bg-white-800 rounded-lg shadow-lg overflow-hidden mb-12">
            <header class="p-6 bg-white-200 dark:bg-gray-700 border-b border-gray-300 dark:border-gray-600">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Profile Information
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Update your account's profile information and email address.
                </p>
            </header>
            <form id="send-verification" method="post">
                @csrf
            </form>
            <form method="post" action="#" class="p-6 space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" name="name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="John Doe" required autofocus autocomplete="name">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="john@example.com" required autocomplete="email">
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="bg-indigo-600 text-white text-sm font-semibold px-4 py-2 rounded-md">Save</button>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                </div>
            </form>
        </section>

        <div class="text-center text-sm text-gray-600 dark:text-gray-400">
            Welcome to Dashboard, john@example.com
        </div>
    </div>
</body>

</html>
