@include('layouts.header')
{{-- @if(session('success'))
<div class="bg-red-500 text-white px-4 py-2 mb-4">
    {{ session('success') }}
</div>
@endif --}}
<!-- component -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- ====== Table Section Start -->
<section class="bg-slate-900 px-10 py-10 pl-10 pr-10">
    <div class="container">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="max-w-full overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-orange-700 text-center">
                                <th
                                    class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           border-l border-transparent
                           ">
                                    Product
                                </th>
                                <th
                                    class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           ">
                                    Category
                                </th>
                                <th
                                    class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           ">
                                    Basic Price
                                </th>
                                <th
                                    class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           ">
                                    Discounted Price
                                </th>
                                <th
                                    class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           ">
                                    Small Description
                                </th>
                                <th
                                    class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           border-r border-transparent
                           ">
                                    Detail  Description
                                </th>
                                <th
                                    class="
                        w-1/6
                        min-w-[160px]
                        text-lg
                        font-semibold
                        text-white
                        py-4
                        lg:py-7
                        px-3
                        lg:px-4
                        border-r border-transparent
                        ">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td
                                        class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-[#F3F6FF]
                           border-b border-l border-[#E8E8E8]
                           ">

                                        {{ $product->product_name }}


                                    </td>
                                    <td
                                        class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-white
                           border-b border-[#E8E8E8]
                           ">
                                        {{ $product->category->category_name ?? '' }}
                                    </td>
                                    <td
                                        class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-[#F3F6FF]
                           border-b border-[#E8E8E8]
                           ">
                                        {{ $product->basic_price }}
                                    </td>
                                    <td
                                        class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-white
                           border-b border-[#E8E8E8]
                           ">
                                        {{ $product->discounted_price }}
                                    </td>
                                    <td
                                        class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-[#F3F6FF]
                           border-b border-[#E8E8E8]
                           ">
                                        {{ $product->small_description }}
                                    </td>
                                    <td
                                        class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-white
                           border-b border-r border-[#E8E8E8]
                           ">
                                        {{ $product->detail_description }}
                                    </td>
                                    <td
                                        class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-white
                           border-b border-r border-[#E8E8E8]
                           ">
                                        <a href="javascript:void(0)"
                                            class="
                              border border-primary
                              py-2
                              px-6
                              text-primary
                              inline-block
                              rounded
                              hover:bg-primary hover:text-white
                              ">
                                            Edit
                                        </a>
                                        <a 
                                        href="#"
                                        onclick="deleteProduct({{ $product->id }})"    
                                        id="deleteLink"
                                            class="
                              border border-primary
                              py-2
                              px-6
                              mt-2
                              text-primary
                              inline-block
                              rounded
                              hover:bg-red-600 hover:text-white
                              ">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- {{ $products->links('custom-pagination') }} --}}
<!-- ====== Table Section End -->

</body>

</html>


<script>
    function deleteProduct(productId) {
        // if (confirm('Are you sure you want to delete this product?')) {
            var url = '/admin/delete/' + productId;

            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle success, you might want to update the UI or show a message
                var divToRemove = document.getElementById('myDiv');
                if (divToRemove) {
                    divToRemove.remove();
                }
                alert(data.message);
            })
            .catch(error => {
                // Handle errors here
                console.error('There was a problem with the fetch operation:', error);
            });
        // }
    }
</script>
