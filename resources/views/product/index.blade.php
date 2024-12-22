<x-master>

    <div class="px-8">
        @if (session('success'))
        <div class="px-8 py-4 bg-green-100 text-green-700 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif
    </div>
    <div class="px-8">
        <x-heading>
            Products List
        </x-heading>

        @auth
        <div class="flex justify-end mt-4">
            <form action="{{route('products.index')}}" method="GET">
                @csrf
                <input value="{{request()->search}}" type="text" name="search" class="px-3 mx-1 py-1 border border-gray-300 rounded-xl" placeholder="Search">
                <button type="submit" class="px-3 py-1 bg-blue-400 hover:bg-blue-500 rounded-xl text-white me-4">Search</button>
            </form>
            <a href="{{route('products.create')}}" class="px-3 py-1 bg-green-400 hover:bg-green-500 rounded-xl text-white">Add Product</a>
        </div>
        @endauth
    </div>
    <div class="grid grid-cols-4 gap-4 PX-6 px-4  my-3">
        @foreach ($products as $product)
            <x-card >
                <x-slot name="header">
                    <h1 class="text-xl font-bold">{{$product->title}}</h1>
                </x-slot>
                <x-slot name="slot">
                    <a href="{{route('products.show',$product->id)}}">
                        <img src="{{asset('storage/'.$product->image)}}" alt="product" class=" block w-full h-[300px] rounded-xl p-2 object-cover border border-transparent hover:border-red-700">
                    </a>
                    <p class="text-gray-700 mt-4"><a href="{{route('products.show',$product->id)}}">{{Str::limit($product->description, 20, ' ... ')}}</a></p>

                </x-slot>
                <x-slot name="footer" >
                    <div class="flex justify-between items-center">
                        <p class="text-gray-700">Price: ${{$product->price}}</p>
                        <span class="px-3 py-1 rounded bg-red-400 text-white">{{$product->category->name}}</span>
                    </div>
                </x-slot>
            </x-card>
        @endforeach
    </div>
    <div class="px-8">
        {{-- {{$products->links()}} --}}
    </div>

</x-master>
