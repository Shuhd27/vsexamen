<x-app-layout>
    <div class="container mt-10 max-w-lg mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Inschrijven voor jouw pakket</h1>
        <form action="{{ route('registrations.store') }}" method="POST" class="registration-form space-y-6">
            @csrf

            <input type="hidden" name="package_id" value="{{ request('package_id') }}">

            <h1>Inschrijven voor jouw pakket</h1>

            <label for="name">Naam</label>
            <input type="text" id="name" name="name" required value="{{ old('name') }}">
            @error('name')
            <p class="text-red-600">{{ $message }}</p>
            @enderror

            <label for="email">E-mailadres</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}">
            @error('email')
            <p class="text-red-600">{{ $message }}</p>
            @enderror

            <label for="phone">Telefoonnummer</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
            @error('phone')
            <p class="text-red-600">{{ $message }}</p>
            @enderror

            <div class="text-center">
                <button type="submit" class="btn-submit">Start met lessen</button>
            </div>
        </form>

    </div>
</x-app-layout>