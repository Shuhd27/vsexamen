<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Overzicht Registraties</h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($registrations->isEmpty())
            <p>Er zijn nog geen registraties.</p>
        @else
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-2 px-4 text-left">Naam</th>
                        <th class="py-2 px-4 text-left">E-mail</th>
                        <th class="py-2 px-4 text-left">Telefoon</th>
                        <th class="py-2 px-4 text-left">Gekozen Pakket</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $registration)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $registration->name }}</td>
                            <td class="py-2 px-4">{{ $registration->email }}</td>
                            <td class="py-2 px-4">{{ $registration->phone ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $registration->package->name ?? 'Onbekend pakket' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
