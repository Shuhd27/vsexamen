<x-app-layout>
    <div class="container mt-10">
        <h1 class="text-4xl font-bold mb-8 text-center">Kies jouw kitesurf pakket</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 max-w-5xl mx-auto">

            @php
                $packages = [
                    ['id' => 1, 'name' => 'Beginner', 'lessons' => 5, 'price' => 199],
                    ['id' => 2, 'name' => 'Gevorderd', 'lessons' => 10, 'price' => 349],
                    ['id' => 3, 'name' => 'Pro', 'lessons' => 15, 'price' => 499],
                    ['id' => 4, 'name' => 'All-in', 'lessons' => 20, 'price' => 649],
                ];
            @endphp

            @foreach ($packages as $package)
                <div class="border rounded-lg p-6 shadow-md text-center hover:shadow-lg transition">
                    <h2 class="text-2xl font-semibold mb-2">{{ $package['name'] }}</h2>
                    <p class="text-lg mb-2">{{ $package['lessons'] }} lessen</p>
                    <p class="text-xl font-bold mb-4">€{{ number_format($package['price'], 2, ',', '.') }}</p>

                    <a href="{{ route('registrations.create', ['package_id' => $package['id']]) }}"
                       class="inline-block bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700 transition">
                        Kies dit pakket
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
