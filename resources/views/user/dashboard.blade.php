<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include your Vite CSS here -->
    @vite('resources/css/app.css')
    <title>User Dashboard</title>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full p-6 bg-black rounded-lg shadow-lg">
        <h1 class="text-2xl text-white font-semibold mb-6">Admin Dashboard</h1>
        <p class="text-md text-white font-semibold mb-6">Welcome to the dashboard, {{ Session::get('user')->firstname }} !!!</p>
        <form method="post" action="{{ route('user.logout') }}">
            @csrf
            <div class="mb-4">
                <input type="submit" value="Logout" class="bg-red-700 text-white py-2 w-full rounded hover:bg-red-800 cursor-pointer mt-2">
            </div>
        </form>
    </div>
</body>
</html>
