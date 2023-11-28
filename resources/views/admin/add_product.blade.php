@include('layouts.header')
@if(session('success'))
<div class="bg-green-500 text-white px-4 py-2 mb-4">
    {{ session('success') }}
</div>
@endif
{{-- <div class="min-h-screen flex items-center justify-center">
<h2 class="text-white text-2xl">Add Products</h2>
</div> --}}

<div class="bg-slate-900 min-h-screen flex items-center justify-center mt-10 mb-10">

<div class="max-w-4xl w-full p-6 bg-black rounded-lg shadow-lg">
    <h1 class="text-2xl text-white font-semibold mb-6">Product Registration</h1>
    <form method="post" action="{{ route('admin.storeproduct') }}" id="productForm" class="space-y-4" enctype="multipart/form-data" >
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="product_name" class="block text-white font-bold mb-2">Product Name:</label>
            <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}"
                class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
            @error('product_name')
                <div class="mt-2 text-red-700">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="parent_category_id" class="block text-white font-bold mb-2">Category:</label>
            
            <select name="parent_category_id" id="parent_category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="" selected>Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="basic_price" class="block text-white font-bold mb-2">Basic Price:</label>
            <input type="number" id="basic_price" name="basic_price" value="{{ old('basic_price') }}"
                class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
            @error('basic_price')
                <div class="mt-2 text-red-700">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="discounted_price" class="block text-white font-bold mb-2">Discounted Price:</label>
            <input type="number" id="discounted_price" name="discounted_price" value="{{ old('discounted_price') }}"
                class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300">
            @error('discounted_price')
                <div class="mt-2 text-red-700">{{ $message }}</div>
            @enderror
        </div>
    </div>

        <div>
            <label for="small_description" class="block text-white font-bold mb-2">Small Description:</label>
            <textarea id="small_description" name="small_description"
                class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300"
                rows="3">{{ old('small_description') }}</textarea>
            @error('small_description')
                <div class="mt-2 text-red-700">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="detail_description" class="block text-white font-bold mb-2">Detail Description:</label>
            <textarea id="detail_description" name="detail_description"
                class="w-full px-3 py-2 border rounded shadow-md focus:outline-none focus:ring focus:border-blue-300 bg-slate-300"
                rows="5">{{ old('detail_description') }}</textarea>
            @error('detail_description')
                <div class="mt-2 text-red-700">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-span-full">
            <label for="cover-photo" class="block text-sm font-medium leading-6 text-white">Product Image</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-orange-300 px-6 py-10">
              <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                </svg>
                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                  <label for="file-upload" class="relative cursor-pointer rounded-md bg-black font-semibold text-orange-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-orange-600 focus-within:ring-offset-2 hover:text-orange-500">
                    <span>Upload a file</span>
                    <input id="product_images" name="product_images[]" type="file" multiple >
                  </label>
                  <p class="pl-1 text-white">or drag and drop</p>
                </div>
                <p class="text-xs leading-5 text-white">PNG, JPG, GIF</p>
              </div>
            </div>
            @error('product_images')
                <div class="mt-2 text-red-700">{{ $message }}</div>
            @enderror
          </div>

        <div>
            <input type="submit" value="Register" id="registerButton"
                class="bg-orange-700 text-white py-2 w-full rounded hover:bg-orange-800 cursor-pointer mt-4">
        </div>
    </form>
</div>
</div>

<script>
    jQuery('#productForm').validate({
        rules: {
            product_name: 'required',
            basic_price: 'required',
        },

        submitHandler: function (form) {
            form.submit();
        }
    });
</script>
