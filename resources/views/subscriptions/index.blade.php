<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inschrijvingen') }}
        </h2>
    </x-slot>

    <main class="py-10 bg-[#F2F8FC] min-h-screen">
        <!-- Titelbalk -->
        <section class="w-11/12 md:w-3/4 mx-auto mb-8">
            <div class="bg-[#004d40] p-6 rounded-xl shadow text-white text-center md:text-left">
                <h3 class="text-2xl font-bold">Gekozen pakketten</h3>
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

        <!-- Inschrijvingen Tabel -->
        <section class="w-11/12 md:w-3/4 mx-auto">
            @if(empty($subscriptions) || count($subscriptions) === 0)
            <div class="text-center text-red-600 px-6 py-4 bg-white shadow rounded-xl">
                Er zijn nog geen inschrijvingen.
            </div>
            @else
            <div class="overflow-x-auto bg-white shadow rounded-xl">
                <table class="w-full text-left text-[#4F4F4F]">
                    <thead class="bg-[#00796b] text-white uppercase">
                        <tr>
                            <th class="px-6 py-4 border-r border-gray-300">Naam</th>
                            <th class="px-6 py-4 border-r border-gray-300">E-mail</th>
                            <th class="px-6 py-4 border-r border-gray-300">Telefoon</th>
                            <th class="px-6 py-4 border-r border-gray-300">Gekozen Pakket</th>
                            <th class="px-6 py-4 border-r border-gray-300">Aantal Lessen</th>
                            <th class="px-6 py-4 border-r border-gray-300">Prijs (€)</th>
                            <th class="px-6 py-4">Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $subscription)
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4 border-r border-gray-300">{{ $subscription->Naam }}</td>
                            <td class="px-6 py-4 border-r border-gray-300">{{ $subscription->Email }}</td>
                            <td class="px-6 py-4 border-r border-gray-300">{{ $subscription->Telefoon ?? '-' }}</td>
                            <td class="px-6 py-4 border-r border-gray-300">{{ $subscription->pakket_naam ?? 'Onbekend pakket' }}</td>
                            <td class="px-6 py-4 border-r border-gray-300">{{ $subscription->aantal_lessons ?? '-' }}</td>
                            <td class="px-6 py-4 border-r border-gray-300">
                                {{ $subscription->pakket_prijs !== null ? number_format($subscription->pakket_prijs, 2, ',', '.') : '-' }}
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('subscriptions.edit', $subscription->subscription_id) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow text-sm">
                                    Bewerken
                                </a>

                                <button type="button"
                                    onclick="openModal({{ $subscription->subscription_id }})"
                                    class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded shadow text-sm">
                                    Verwijderen
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </section>

        <!-- Modal voor verwijderen -->
        <div id="confirmDeleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-amber-50 p-6 rounded-xl shadow-xl w-[90%] max-w-sm text-center">
                <p class="text-lg font-semibold text-gray-800 mb-6">
                    Weet u zeker dat u dit wilt verwijderen?
                </p>

                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-center gap-4">
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow">
                            Verwijderen
                        </button>
                        <button type="button" onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 text-black px-4 py-2 rounded shadow">
                            Annuleren
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function openModal(subscriptionId) {
            const modal = document.getElementById('confirmDeleteModal');
            const form = document.getElementById('deleteForm');

            // Dynamische route genereren
            form.action = `/subscriptions/${subscriptionId}`;

            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('confirmDeleteModal');
            modal.classList.add('hidden');
        }
    </script>

</x-app-layout>