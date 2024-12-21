<x-master>
    <div class="px-8">
        <x-heading>
            Update Product
        </x-heading>

        <div class="px-8 mx-auto w-[70%] rounded-xl bg-gray-300 py-4">
            <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="flex flex-col space-y-4">
                    <div>
                        <label for="title" class="block">Title</label>
                        <input type="text" name="title" id="title"
                            class="w-full rounded-lg p-2 border border-gray-300" value="{{ old('title',$product->title) }}">
                        @error('title')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="block">Description</label>
                        <textarea name="description" id="description" class="w-full rounded-lg p-2 border border-gray-300">{{ old('description',$product->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="price" class="block">Price</label>
                        <input type="number" name="price" id="price"
                            class="w-full rounded-lg p-2 border border-gray-300" value="{{ old('price',$product->price) }}">
                        @error('price')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="category_id" class="block">Category</label>
                        <select name="category_id" id="category_id" class="w-full rounded-lg p-2 border border-gray-300">
                            <option :value="null">Choose</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($product->category->id == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="stock" class="block">Stock</label>
                        <input type="number" name="stock" id="stock"
                            class="w-full rounded-lg p-2 border border-gray-300" value="{{ old('stock',$product->stock) }}">
                        @error('stock')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <img src="{{asset('storage/'.$product->image)}}" class="w-100" id="imagePreview" >
                        <label for="image" class="block">Image</label>
                        <input type="file" name="image" id="image" onchange="loadFile(event) "
                            class="w-full rounded-lg p-2 border border-gray-300">
                        @error('image')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="px-3 py-1 bg-green-400 hover:bg-green-500 rounded-xl text-white">Update Product
                        </button>
                        <a href="{{route('products.index')}}" class="px-3 py-1 bg-gray-400 hover:bg-gray-500 rounded-xl text-white"> Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-master>
