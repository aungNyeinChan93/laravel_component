<x-master>
    <div class="px-8">
        <x-heading>
            Product Details
        </x-heading>
        <div class="px-8 mx-auto w-[70%]">
            <x-card>
                <x-slot name="header">
                    <h1 class="text-xl font-bold">{{ $product->title }}</h1>
                </x-slot>
                <x-slot name="slot">
                    <a href="">
                        <img src="{{ asset("storage/$product->image") }}" alt="product"
                            class=" block w-full h-[500px] rounded-xl p-2 object-contain border border-transparent hover:border-red-700">
                    </a>
                    <p class="text-gray-700 mt-4"><a href="">{{ $product->description }}</a></p>
                </x-slot>
                <x-slot name="footer">
                    <div class="flex justify-between items-center">
                        <p class="text-gray-700">Price: ${{ $product->price }}</p>
                        <span class="px-3 py-1 rounded bg-red-400 text-white">{{ $product->category->name }}</span>
                    </div>
                </x-slot>
            </x-card>
            <div class="mt-4 bg-white p-4 rounded-lg shadow-md">
                <button>
                    <a class=" px-3 py-1 bg-green-400 hover:bg-green-500 rounded-xl "
                        href="{{ route('products.index') }}">back</a>
                </button>
                @can('update', $product)
                    <button>
                        <a class=" px-3 py-1 bg-blue-400 hover:bg-blue-500 rounded-xl "
                            href="{{ route('products.edit', $product->id) }}">edit</a>
                    </button>
                @endcan
                @can('delete', $product)
                    <button form="delete-product" type="submit"
                        class=" px-3 py-1 bg-red-400 hover:bg-red-500 rounded-xl ">delete</button>
                @endcan
            </div>
        </div>
    </div>

    <form action="{{ route('products.destroy', $product->id) }}" id="delete-product" class="hidden" method="post">
        @csrf
        @method('DELETE')
    </form>
</x-master>
