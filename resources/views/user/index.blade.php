<x-master>
    <div class="px-6 py-4">
        <x-heading >User List</x-heading>
        <x-table>
            <x-slot:header>User Lists</x-slot:header>
            @foreach ($users as $user)
                <tr class="">
                    <td class="px-5 py-5 border-b border-gray-200  bg-white text-sm">
                        {{ $user->name }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200  bg-white text-sm">
                        {{ $user->email }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200  bg-white text-sm">
                        {{ $user->address }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200  bg-white text-sm">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </x-table>
        <div class="mt-6 ">
            {{ $users->links() }}
        </div>
    </div>
</x-master>
