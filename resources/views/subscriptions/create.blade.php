<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container availability-form">
        <h1>Inschrijven voor jouw pakket</h1>

        @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 1rem;">
            <strong>Er zijn fouten gevonden:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('subscriptions.store') }}" method="POST">
            @csrf

            {{-- Verborgen veld voor het gekozen pakket --}}
            <input type="hidden" name="package_id" value="{{ request('package_id') }}">

            <div class="mb-3">
                <label for="name" class="form-label">Naam</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mailadres</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefoonnummer (optioneel)</label>
                <input type="tel" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            </div>

            <button type="submit" class="btn btn-primary">Start met lessen</button>
            <a href="{{ url('/') }}" class="btn btn-secondary">Annuleren</a>
        </form>
    </div>
</x-app-layout>
