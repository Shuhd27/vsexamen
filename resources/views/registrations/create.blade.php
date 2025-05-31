<x-app-layout>
    <div class="container mt-10 max-w-lg mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Inschrijven voor jouw pakket</h1>

        <form action="{{ route('registrations.store') }}" method="POST" class="space-y-6">
            @csrf

            <input type="hidden" name="package_id" value="{{ request('package_id') }}">

            <div>
                <label for="name" class="block font-medium mb-1">Naam</label>
                <input type="text" id="name" name="name" required
                       class="w-full border rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-600"
                       value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block font-medium mb-1">E-mailadres</label>
                <input type="email" id="email" name="email" required
                       class="w-full border rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-600"
                       value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block font-medium mb-1">Telefoonnummer</label>
                <input type="tel" id="phone" name="phone"
                       class="w-full border rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-600"
                       value="{{ old('phone') }}">
                @error('phone')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
                    Start met lessen
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
