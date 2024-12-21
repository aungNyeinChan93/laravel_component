<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="text-2xl bg-gray-500 p-3 mx-auto text-white font-mono">{{$header}}</div>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-800 text-left text-xs font-semibold text-white uppercase tracking-wider">
                    Name
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-800 text-left text-xs font-semibold text-white uppercase tracking-wider">
                    Email
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-800 text-left text-xs font-semibold text-white uppercase tracking-wider">
                    Address
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-800 text-left text-xs font-semibold text-white uppercase tracking-wider">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- More rows can be added here -->
            {{ $slot }}
            {{-- <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    John Doe
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    john@example.com
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    123 Main St
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </td>
            </tr> --}}

        </tbody>
    </table>
</div>
