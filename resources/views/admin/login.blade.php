<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class=" bg-slate-900 min-h-screen flex items-center justify-center">

  <div class="max-w-md w-full p-6 bg-black rounded-lg shadow-lg">
  
       <h1 class="text-2xl text-white font-semibold mb-6">Admin Login</h1>

      
  
       <form method="post" action="{{route('adminauth')}}">
        @csrf
  
          <div class="mb-4">
              <label for="email" class="block text-white font-bold mb-2">Email:</label>
              <input type="text" id="email" name="email" 
                     class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300" >
                     @error('email')
    <div class="mt-2 mb-4 text-red-500">{{ $message }}</div>
@enderror
          </div>
  
           <div class="mb-4">
              <label for="password" class="block text-white font-bold mb-2">Password:</label>
              <input type="password" id="password" name="password"
                     class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300" >
                     @error('password')
    <div class="mt-2 mb-4 text-red-500">{{ $message }}</div>
@enderror
          </div>
  
           <div class="mb-4">
              <input type="submit" value="Login"
                     class="bg-orange-700 text-white py-2 w-full rounded hover:bg-orange-800 cursor-pointer mt-2">
          </div>
  
      </form>
    
  
  </div>
  
  </body>
</html>