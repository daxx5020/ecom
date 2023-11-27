<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <style>
        .error {
            color: red;
            width: 100%;
            margin-bottom: 10px;

        }
    </style>

</head>

<body class=" bg-slate-900 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full p-6 bg-black rounded-lg shadow-lg">

        <h1 class="text-2xl text-white font-semibold mb-6">User Login</h1>
        <form method="post" action="{{ route('userauth') }}" id="form">
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-white font-bold mb-2">Username:</label>
                <input type="username" id="username" name="username" value="{{ old('username') }}"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                @error('username')
                    <div class="mt-2 mb-4 text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-white font-bold mb-2">Password:</label>
                <input type="password" id="password" name="password"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                @error('password')
                    <div class="mt-2 mb-4 text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <a class=" text-blue-500 underline hover:text-blue-700" href="/user/register">Sign up</a>
            </div>

            @if ($errors->has('login_error'))
                <div class="mt-2 mb-4 text-red-700">
                    {{ $errors->first('login_error') }}
                </div>
            @endif

            <div class="mb-4">
                <input type="submit" value="Login" id="loginbutton"
                    class="bg-orange-700 text-white py-2 w-full rounded hover:bg-orange-800 cursor-pointer mt-2">
            </div>
        </form>
    </div>

</body>

</html>



<script>
    jQuery('#form').validate({
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
                minlength: 8,
            },
        },

        submitHandler: function(form) {
            form.submit();
        }
    });
</script>