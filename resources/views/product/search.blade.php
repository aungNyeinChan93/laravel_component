<x-master>
    <div class="px-10">
        <x-heading>
            Products
        </x-heading>
    </div>
    @if ($products->isEmpty())
        <div class="py-3 text-center mx-5 rounded text-3xl  bg-red-400 text-white">Empty</div>
    @endif
    <div class="px-8 mx-auto grid grid-cols-3 gap-4">
        @foreach ($products as $product)
        <x-card>
            <x-slot name="header">
                <h1 class="text-xl font-bold">{{$product->title}}</h1>
            </x-slot>
            <x-slot name="slot">
                <a href="#">
                    <img src="{{asset('storage/'.$product->image)}}" alt="product" class=" block w-full h-[300px] rounded-xl p-2 object-cover border border-transparent hover:border-red-700">
                </a>
                <p class="text-gray-700 mt-4"><a href="#">{{$product->description}}</a></p>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    <p class="text-gray-700">Price: $100</p>
                    <span class="px-3 py-1 rounded bg-red-400 text-white">{{$product->category->name}}</span>
                </div>
            </x-slot>
        </x-card>
        @endforeach
    </div>
</x-master>
