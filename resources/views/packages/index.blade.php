<x-app-layout>
    <div class="container mt-14 px-4 max-w-6xl mx-auto">
        <h1 class="text-4xl font-extrabold mb-10 text-center text-[#004d40] tracking-wide">
            Kies jouw kitesurf pakket
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @php
                $packages = [
                    ['id' => 1, 'name' => 'Beginner', 'lessons' => 5, 'price' => 199],
                    ['id' => 2, 'name' => 'Gevorderd', 'lessons' => 10, 'price' => 349],
                    ['id' => 3, 'name' => 'Pro', 'lessons' => 15, 'price' => 499],
                    ['id' => 4, 'name' => 'All-in', 'lessons' => 20, 'price' => 649],
                ];
            @endphp

            @foreach ($packages as $package)
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 p-8 flex flex-col justify-between border-2 border-transparent hover:border-[#004d40]">
                <h2 class="text-3xl font-semibold text-[#00796b] mb-4">{{ $package['name'] }}</h2>

                <div class="mb-6 space-y-1">
                    <p class="text-lg text-gray-700 font-medium">
                        <span class="font-bold text-[#004d40]">{{ $package['lessons'] }}</span> lessen
                    </p>
                    <p class="text-2xl font-extrabold text-[#004d40]">
                        €{{ number_format($package['price'], 2, ',', '.') }}
                    </p>
                </div>

                <a href="{{ route('subscriptions.create', ['package_id' => $package['id']]) }}"
                   class="inline-block bg-[#00796b] text-white font-semibold px-6 py-3 rounded-lg hover:bg-[#004d40] focus:outline-none focus:ring-4 focus:ring-[#004d40]/50 transition">
                    Kies dit pakket
                </a>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
