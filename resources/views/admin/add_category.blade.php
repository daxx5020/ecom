@include('layouts.header')
@if(session('success'))
<div class="bg-green-500 text-white px-4 py-2 mb-4">
    {{ session('success') }}
</div>
@endif
    <div class=" bg-slate-900 min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full p-6 bg-black rounded-lg shadow-lg">

            <h1 class="text-2xl text-white font-semibold mb-6">Add Category</h1>
            <form method="post" action="{{ route('admin.addcategory') }}" id="form">
                @csrf
    
                <div class="mb-4">
                    <label for="category_name" class="block text-white font-bold mb-2">Category Name:</label>
                    <input type="text" id="category_name" name="category_name"
                        class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
                    @error('category_name')
                        <div class="mt-2 mb-4 text-red-700">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="parent_category_id" class="block text-white font-bold mb-2">Parent Category:</label>
                    
                    <select name="parent_category_id" id="parent_category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="" selected>Select Parent Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
    
                @if ($errors->has('login_error'))
                    <div class="mt-2 mb-4 text-red-700">
                        {{ $errors->first('login_error') }}
                    </div>
                @endif
    
                <div class="mb-4">
                    <input type="submit" value="submit" id="loginbutton"
                        class="bg-orange-700 text-white py-2 w-full rounded hover:bg-orange-800 cursor-pointer mt-2">
                </div>
            </form>
        </div>
    
    </div>

    
      
</body>
</html>

