<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <style>
        .error {
            color: red;
            display: block;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<div class="min-h-screen bg-no-repeat bg-cover bg-center"
	style="background-image: url('https://images.unsplash.com/photo-1486520299386-6d106b22014b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80')">
    <div class="flex justify-end">
        <div class="bg-white min-h-screen w-1/2 flex justify-center items-center">
            
            <div>
                @if(session('success'))
                <div class="bg-green-700 text-white px-4 py-2 mb-4 mt-4 rounded-md">
                    {{ session('success') }}
                </div>
                @endif
                <form method="post" action="{{ route('user_registration') }}" id="form" class="space-y-4">
                    @csrf
                    <div>
						<span class="text-sm text-gray-900">Welcome</span>
						<h1 class="text-2xl font-bold">Register your account</h1>
					</div>

                    <div class="grid grid-cols-1 gap-4">
                        <div >
                            <label for="firstname" class="block text-md mb-2">First Name:</label>
                            <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}"
                                class="px-4 w-full border-2 py-2 rounded-md text-sm outline-none">
                                @error('firstname')
                                <div class="mt-2 text-red-700">{{ $message }}</div>
                                @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-md mb-2">Email:</label>
                            <input type="text" id="email" name="email" value="{{ old('email') }}"
                                class="px-4 w-full border-2 py-2 rounded-md text-sm outline-none">
                            @error('email')
                            <div class="mt-2 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label for="username" class="block text-md mb-2">Username:</label>
                            <input type="text" id="username" name="username" value="{{ old('username') }}"
                                class="px-4 w-full border-2 py-2 rounded-md text-sm outline-none">
                            @error('username')
                            <div class="mt-2 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-md mb-2">Password:</label>
                            <input type="password" id="password" name="password"
                                class="px-4 w-full border-2 py-2 rounded-md text-sm outline-none">
                            @error('password')
                            <div class="mt-2 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <input type="submit" value="Register" id="registerbutton"
                            class="mt-2 w-full bg-green-500 hover:bg-green-400 text-white py-2 rounded-md transition duration-100">
                    </div>
                    <div class="flex  space-x-2 justify-center items-end bg-gray-700 hover:bg-gray-600 text-white py-2 rounded-md transition duration-100"">

                        <img class=" h-5 cursor-pointer" src="https://i.imgur.com/arC60SB.png" alt="">
                                                <button >Or sign-in with google</button>
                                            </div>
                </form>
                <p class="mt-4 mb-4">Already have an account? 
                    <a href="/user/login"> <span class="cursor-pointer text-sm text-blue-600">Login now</span></p> </a>
            </div>
        </div>
    </div>
</div>
</body>

</html>

{{-- <script>
    jQuery('#form').validate({
        rules: {
            firstname: 'required',
            username: 'required',
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
</script> --}}
