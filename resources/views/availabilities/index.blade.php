<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beschikbaarheden') }}
        </h2>
    </x-slot>

    <main class="py-10 bg-[#F2F8FC] min-h-screen">
        <!-- Titelbalk -->
        <section class="w-11/12 md:w-3/4 mx-auto mb-8">
            <div class="bg-[#004d40] p-6 rounded-xl shadow text-white text-center md:text-left">
                <h3 class="text-2xl font-bold">Beschikbaarheden beheren</h3>
            </div>
        </section>

        <!-- Flash berichten -->
        <section class="w-11/12 md:w-3/4 mx-auto mb-6">
            @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded shadow mb-4">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded shadow mb-4">
                {{ session('error') }}
            </div>
            @endif
        </section>

        <!-- Toevoegen knop -->
        <div class="w-11/12 md:w-3/4 mx-auto flex justify-end mb-6">
            <a href="{{ route('availabilities.create') }}"
                class="bg-[#00796b] hover:bg-[#004d40] text-white text-lg font-semibold px-6 py-2 rounded shadow transition-all">
                + Nieuwe beschikbaarheid
            </a>
        </div>

        <!-- Beschikbaarheden tabel -->
        <section class="w-11/12 md:w-3/4 mx-auto">
            <div class="overflow-x-auto bg-white shadow rounded-xl">
                <table class="w-full text-left text-[#4F4F4F]">
                    <thead class="bg-[#00796b] text-white uppercase">
                        <tr>
                            <th class="px-6 py-4 border-r border-gray-300">Instructeur</th>
                            <th class="px-6 py-4 border-r border-gray-300">Status</th>
                            <th class="px-6 py-4">Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($availabilities as $availability)
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4 border-r border-gray-300">
                                {{ $availability->instructor_name ?? 'Onbekend' }}
                            </td>
                            <td class="px-6 py-4 border-r border-gray-300">
                                {{ ucfirst($availability->status) }}
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('availabilities.edit', $availability->id) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow text-sm">
                                    Bewerken
                                </a>
                                <form onsubmit="return false;">
                                    <button type="button"
                                        onclick="openModal({{ $availability->id }})"
                                        class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded shadow text-sm">
                                        Verwijderen
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-red-600 px-6 py-4">
                                Geen beschikbaarheden gevonden.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Paginatie -->
        <section class="w-11/12 md:w-3/4 mx-auto mt-6">
            {{ $availabilities->links() }}
        </section>

        <!-- Modal voor verwijderen -->
        <!-- Verwijderbevestiging Modal -->
        <div id="confirmDeleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-amber-50 p-6 rounded-xl shadow-xl w-[90%] max-w-sm text-center">
                <p class="text-lg font-semibold text-gray-800 mb-6">
                    Weet u zeker dat u dit wil verwijderen?
                </p>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-center gap-4">
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow">
                            Verwijderen
                        </button>
                        <button type="button" onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 text-black px-4 py-2 rounded shadow">
                            Terug
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function openModal(id) {
            const modal = document.getElementById('confirmDeleteModal');
            const form = document.getElementById('deleteForm');

            // Stel de juiste route dynamisch in (Laravel route helper kan niet in JS)
            form.action = `/availabilities/${id}`;

            modal.classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('confirmDeleteModal').classList.add('hidden');
        }
    </script>
</x-app-layout>