<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        /* Example: */
        .profile-dropdown {
            position: relative;
        }

        .profile-dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 0;
        }

        .profile-dropdown:hover .profile-dropdown-content {
            display: block;
        }

        .profile-dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .profile-dropdown-content a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <!-- Navigation bar -->
    <header class="bg-red" style="position: fixed; width: 100%; margin-top: 0px; background-color: rgb(246, 236, 255); box-shadow: 2px 2px 20px 2px rgba(137, 43, 226, 0.098);">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global"
            style="padding: 20px 20px;">
            <div class="flex lg:flex-1" style="margin-top: -11px;">
                <h1>
                    <a href="/" class="-m-1.5 p-1.5" style="font-size: 30px; font-weight: 900;">
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
                <a href="/movies" class="text-sm font-semibold leading-6 text-gray-900">Movies</a>
                <a href="/genres" class="text-sm font-semibold leading-6 text-gray-900">Genres</a>
                <a href="/watchlist" class="text-sm font-semibold leading-6 text-gray-900">Watchlist</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                
                <a href="/home" style="padding:10px 14px;"><button type="submit"
                    class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">{{ Auth::user()->name }}</button>
                </a>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit"
                        class="text-white text-sm font-semibold leading-6 ml-4 bg-gradient-to-r from-purple-600 to-indigo-600 px-4 py-2 rounded-md">Logout</button>
                </form>
            </div>
        </nav>
    </header>
    <br /><br /><br /><br />

    <!-- Profile section -->
    <div class="max-w-7xl mx-auto p-8">
        <h2 class="text-xl font-semibold mb-4">Profile</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Profile Information</h3>
                <p>Update your account's profile information and email address.</p>
                <form action="/profile/update" method="post">
                    @csrf
                    <!-- Profile information update form fields -->
                    <label for="name" class="block mt-4 font-semibold">Name</label>
                    <input type="text" id="name" name="name" value="elias_testing" class="block w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">

                    <label for="email" class="block mt-4 font-semibold">Email</label>
                    <input type="email" id="email" name="email" value="elias_testing@gmail.com" class="block w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">

                    <button type="submit" class="text-white font-semibold bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md mt-4">SAVE</button>
                </form>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Update Password</h3>
                <p>Ensure your account is using a long, random password to stay secure.</p>
                <form action="/password/update" method="post">
                    @csrf
                    <!-- Password update form fields -->
                    <label for="current-password" class="block mt-4 font-semibold">Current Password</label>
                    <input type="password" id="current-password" name="current-password" placeholder="•••••••••••••••" class="block w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">

                    <label for="new-password" class="block mt-4 font-semibold">New Password</label>
                    <input type="password" id="new-password" name="new-password" placeholder="New Password" class="block w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">

                    <label for="confirm-password" class="block mt-4 font-semibold">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" class="block w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">

                    <button type="submit" class="text-white font-semibold bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md mt-4">SAVE</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Account section -->
    <div class="max-w-7xl mx-auto p-8">
        <h2 class="text-xl font-semibold mb-4">Delete Account</h2>
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
            <form action="/user/delete" method="post" onsubmit="return confirm('Are you sure you want to delete your account?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-white font-semibold bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md mt-4">DELETE ACCOUNT</button>
            </form>
        </div>
    </div>
</body>

</html>
