<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Overzicht Registraties</h1>

        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Naam</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Telefoon</th>
                    <th class="border border-gray-300 px-4 py-2">Gekozen pakket</th>
                    <th class="border border-gray-300 px-4 py-2">Aantal lessen</th>
                    <th class="border border-gray-300 px-4 py-2">Prijs</th>
                    <th class="border border-gray-300 px-4 py-2">Registratie datum</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registrations as $registration)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $registration->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $registration->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $registration->phone }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $registration->package->name ?? 'Onbekend' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $registration->package->lessons_count ?? '-' }}</td>
                    <td class="border border-gray-300 px-4 py-2">€{{ number_format($registration->package->price ?? 0, 2, ',', '.') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $registration->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
