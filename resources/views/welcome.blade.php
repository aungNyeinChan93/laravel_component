<x-master>
    <section class="px-8 mt-4">
        <main class="container mx-auto">

            <x-heading>Home</x-heading>

            <x-tag href="">One</x-tag>
            <x-tag href="">Two</x-tag>
            <x-tag href="">Three</x-tag>
            <x-tag href="">Four</x-tag>

            <div class="mt-5">
                <x-card>
                    <x-slot name="header"> this is next way slot</x-slot>
                    <div>
                        <img src="http://placehold.it/150/150" alt="">
                        This is some text within card body.
                    </div>
                    <x-slot:footer>This is footer</x-slot:footer>
                </x-card>

                <x-card>
                    <x-slot:header>This is Card header 2</x-slot:header>
                    <div>This is some text within card body 2.</div>
                    <x-slot:footer>This is footer 2</x-slot:footer>
                </x-card>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-8">
                <x-card>
                    <x-slot:header>This is Card header 1</x-slot:header>
                    <div>This is some text within card body 1.</div>
                    <x-slot:footer>This is footer 1</x-slot:footer>
                </x-card>

                <x-card>
                    <x-slot:header>This is Card header 1</x-slot:header>
                    <div>This is some text within card body 1.</div>
                    <x-slot:footer>This is footer 1</x-slot:footer>
                </x-card>

                <x-card>
                    <x-slot:header>This is Card header 1</x-slot:header>
                    <div>This is some text within card body 1.</div>
                    <x-slot:footer>This is footer 1</x-slot:footer>
                </x-card>

                <x-card>
                    <x-slot:header>This is Card header 1</x-slot:header>
                    <div>This is some text within card body 1.</div>
                    <x-slot:footer>This is footer 1</x-slot:footer>
                </x-card>
            </div>

            <div class="mt-8">
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
                <div class="space-y-4 mt-4">
                    {{ $users->links() }}
                </div>
            </div>

            {{-- <x-login></x-login> --}}

            <x-grid-image />

            <div class="grid grid-cols-4 gap-6 px-6 mx-auto container my-4 bg-white rounded-xl shadow-lg">
                <x-image :width="200" />
                <x-image :width="200" />
                <x-image :width="200" />
                <x-image :width="200" />
            </div>

        </main>
    </section>
</x-master>
