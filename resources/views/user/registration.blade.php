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
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="bg-slate-900 min-h-screen flex items-center justify-center">
    <div class="max-w-4xl w-full p-6 bg-black rounded-lg shadow-lg">

        <h1 class="text-2xl text-white font-semibold mb-6">User Registration</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('user_registration') }}" id="form" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="firstname" class="block text-white font-bold mb-2">First Name:</label>
                    <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}"
                        class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                </div>

                <div>
                    <label for="lastname" class="block text-white font-bold mb-2">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}"
                        class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                    @error('lastname')
                        <div class="mt-2 text-red-700">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                 <div>
                <label for="email" class="block text-white font-bold mb-2">Email:</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                @error('email')
                    <div class="mt-2 text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="mobileno" class="block text-white font-bold mb-2">Mobile No:</label>
                <input type="number" id="mobileno" name="mobileno" value="{{ old('mobileno') }}"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300"
                    max="10">
                @error('mobileno')
                    <div class="mt-2 text-red-700">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="username" class="block text-white font-bold mb-2">Username:</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                @error('username')
                    <div class="mt-2 text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-white font-bold mb-2">Password:</label>
                <input type="password" id="password" name="password"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                @error('password')
                    <div class="mt-2 text-red-700">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">    
        <div>
                <label for="address_line_1" class="block text-white font-bold mb-2">Address Line 1:</label>
                <input type="text" id="address_line_1" name="address_line_1" value="{{ old('address_line_1') }}"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                @error('address_line_1')
                    <div class="mt-2 text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="address_line_2" class="block text-white font-bold mb-2">Address Line 2:</label>
                <input type="text" id="address_line_2" name="address_line_2" value="{{ old('address_line_2') }}"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                @error('address_line_2')
                    <div class="mt-2 text-red-700">{{ $message }}</div>
                @enderror
            </div>
        </div>

            {{-- <div>
                <label for="profile_picture" class="block text-white font-bold mb-2">Profile Picture:</label>
                <input type="file" id="profile_picture" name="profile_picture"
                    class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                <!-- Add appropriate validation for the file, if required -->
            </div> --}}

            <div class="col-span-full">
                <label for="cover-photo" class="block text-sm font-medium leading-6 text-white">profile picture</label>
                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-orange-300 px-6 py-10">
                  <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                    </svg>
                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                      <label for="file-upload" class="relative cursor-pointer rounded-md bg-black font-semibold text-orange-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-orange-600 focus-within:ring-offset-2 hover:text-orange-500">
                        <span>Upload a file</span>
                        <input id="profile_picture" name="profile_picture" type="file" class="sr-only">
                      </label>
                      <p class="pl-1 text-white">or drag and drop</p>
                    </div>
                    <p class="text-xs leading-5 text-white">PNG, JPG, GIF up to 10MB</p>
                  </div>
                </div>
              </div>
            
          

            <div>
                <input type="submit" value="Register" id="registerbutton"
                    class="bg-orange-700 text-white py-2 w-full rounded hover:bg-orange-800 cursor-pointer mt-4">
            </div>
        </form>
    </div>
</body>

</html>

<script>
    jQuery('#form').validate({
        rules: {
            firstname: 'required',
            lastname: 'required',
            username: 'required',
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 8,
            },
            mobileno: {
                required: true,
                maxlength: 10,
            },
        },

        submitHandler: function(form) {
            form.submit();
        }
    });
</script>
