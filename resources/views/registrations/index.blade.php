<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registraties') }}
        </h2>
    </x-slot>

    <main class="py-10 bg-[#F2F8FC] min-h-screen">
        <!-- Titelbalk -->
        <section class="w-11/12 md:w-3/4 mx-auto mb-8">
            <div class="bg-[#004d40] p-6 rounded-xl shadow text-white text-center md:text-left">
                <h3 class="text-2xl font-bold">Gekozen paketten</h3>
            </div>
        </section>

        <!-- Flash berichten -->
        <section class="w-11/12 md:w-3/4 mx-auto mb-6">
            @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded shadow mb-4">
                {{ session('success') }}
            </div>
            @endif
        </section>

        <!-- Registratie Tabel -->
        <section class="w-11/12 md:w-3/4 mx-auto">
            @if(empty($registrations))
            <div class="text-center text-red-600 px-6 py-4 bg-white shadow rounded-xl">
                Er zijn nog geen registraties.
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
                            <th class="px-6 py-4">Prijs (€)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4 border-r border-gray-300">{{ $registration->Naam }}</td>
                            <td class="px-6 py-4 border-r border-gray-300">{{ $registration->Email }}</td>
                            <td class="px-6 py-4 border-r border-gray-300">{{ $registration->Telefoon ?? '-' }}</td>
                            <td class="px-6 py-4 border-r border-gray-300">{{ $registration->pakket_naam ?? 'Onbekend pakket' }}</td>
                            <td class="px-6 py-4 border-r border-gray-300">{{ $registration->aantal_lessons ?? '-' }}</td>
                            <td class="px-6 py-4">{{ number_format($registration->pakket_prijs, 2, ',', '.') ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            @endif
        </section>
    </main>
</x-app-layout>
