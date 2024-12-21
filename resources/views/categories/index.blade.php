<x-master>


    <div class="px-6 py-4">
        <x-heading>Categories List</x-heading>
        <div class="grid grid-cols-4 gap-6 mx-6 my-3">
            @foreach ($categories as $category)
                <x-card>
                    <x-slot:header><span
                            class="text-2xl font-mono text-white-500 capitalize">{{ $category->name }}</span></x-slot:header>
                    <div class="text-center p-2 border border-transparent hover:border-red-500 rounded-xl">
                        <img src="{{ $category->image }}" class="rounded-xl hover:w-[250px]" alt="">
                    </div>
                    <x-slot:footer>{{ $category->created_at->format('j-F-y') }}</x-slot:footer>
                </x-card>
            @endforeach
        </div>
        <div class="mt-6 ">
            {{ $categories->links() }}
    </div>


</x-master>
