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
        @if(session('warning'))
        <div class="bg-red-700 text-white px-4 py-2 mb-4 rounded-md">
            {{ session('warning') }}
        </div>
        @endif

        <h1 class="text-2xl text-white font-semibold mb-6">Admin Registration</h1>
        <form method="post" action="{{ route('adminstore') }}" id="form">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-white font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                @error('name')
                    <div class="mt-2 mb-4 text-red-700">{{ $message }}</div>
                @enderror
            </div>
            
            
            <div class="mb-4">
                <label for="email" class="block text-white font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                @error('email')
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
                <label for="key" class="block text-white font-bold mb-2">Private Key:</label>
                <input type="key" id="key" name="key"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                @error('key')
                    <div class="mt-2 mb-4 text-red-700">{{ $message }}</div>
                @enderror
            </div>

            @if ($errors->has('login_error'))
                <div class="mt-2 mb-4 text-red-700">
                    {{ $errors->first('login_error') }}
                </div>
            @endif

            <div class="mb-4">
                <input type="submit" value="Register" id="loginbutton"
                    class="bg-orange-700 text-white py-2 w-full rounded hover:bg-orange-800 cursor-pointer mt-2">
            </div>
        </form>
    </div>

</body>

</html>


<script>
    jQuery('#form').validate({
        rules: {
            name : "required",
            key : "required",
            email: {
                required: true,
                email: true,
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
