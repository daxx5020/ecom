<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        .error {
            color: red;
            display: block;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body class="min-h-screen bg-no-repeat bg-cover bg-center"
    style="background-image: url('https://images.unsplash.com/photo-1486520299386-6d106b22014b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80')">
    <div class="flex justify-end">
        <div class="bg-white min-h-screen w-1/2 flex justify-center items-center">
            <div>

                <form method="post" action="{{ route('userauth') }}" id="form">
                    @csrf

                    <div>
                        <span class="text-sm text-gray-900">Welcome back</span>
                        <h1 class="text-2xl font-bold">Login to your account</h1>
                    </div>

                    <div class="my-3">
                        <label class="block text-md mb-2" for="loginname">Username/Email:</label>
                        <input class="px-4 w-full border-2 py-2 rounded-md text-sm outline-none @error('username') border-red-600  @enderror" type="text"
                            id="loginname" name="loginname" value="{{ old('loginname') }}" placeholder="Username/Email">
                        @error('loginname')
                            <div class="mt-2 mb-4 text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-5">
                        <label class="block text-md mb-2" for="password">Password:</label>
                        <input class="px-4 w-full border-2 py-2 rounded-md text-sm outline-none @error('password') border-red-600  @enderror" type="password"
                            id="password" name="password" placeholder="Password">
                        @error('password')
                            <div class="mt-2 mb-4 text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex justify-between pt-4">
                        <div>
                            <input class="cursor-pointer" type="radio" name="rememberme">
                            <span class="text-sm">Remember Me</span>
                        </div>
                        <span class="text-sm text-blue-700 hover:underline cursor-pointer">Forgot password?</span>
                    </div>
                    <div class="">
                        <button class="mt-4 mb-3 w-full bg-green-500 hover:bg-green-400 text-white py-2 rounded-md transition duration-100"
                            id="loginbutton">Login now</button>
                        <div class="flex space-x-2 justify-center items-end bg-gray-700 hover:bg-gray-600 text-white py-2 rounded-md transition duration-100">
                            <img class="h-5 cursor-pointer" src="https://i.imgur.com/arC60SB.png" alt="">
                            <button>Or sign-in with Google</button>
                        </div>
                    </div>
                </form>
                @if ($errors->has('login_error'))
                    <div class="mt-2 mb-4 text-red-700">
                        {{ $errors->first('login_error') }}
                    </div>
                @endif
                <p class="mt-8">Don't have an account? 
                    <a href="/user/register"> <span class="cursor-pointer text-sm text-blue-600">Sign Up</span></p> </a>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
    
    var customErrorMessages = {
    loginname: {
        required: 'Username or Email is required.',
    },
    password: {
        required: 'Password is required.',
        minlength: 'Password must be at least {0} characters.',
        maxlength: 'Password must not be more than {0} characters.',
    },
};
messages: customErrorMessages,

    jQuery('#form').validate({
        rules: {
            loginname: {
                required: true,
            },
            password: {
                required: true,
                minlength: 8,
            },  
        },
        messages: customErrorMessages,
        
    highlight: function(element) {
        // Add the red border class when an error occurs
        $(element).addClass('border-red-600');
    },

    unhighlight: function(element) {
        // Remove the red border class when the error is cleared
        $(element).removeClass('border-red-600');
    },

    submitHandler: function(form) {
        form.submit();
    }
    });
</script>