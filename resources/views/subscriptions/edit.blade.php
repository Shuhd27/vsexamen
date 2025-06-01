<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription Bewerken') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container availability-form">
        <h1>Subscription Bewerken</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Er zijn fouten gevonden:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Verborgen package_id veld --}}
            <input type="hidden" name="package_id" value="{{ old('package_id', $subscription->package_id) }}">

            <div class="mb-3">
                <label for="name" class="form-label">Naam</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $subscription->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $subscription->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefoon</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Optioneel"
                    value="{{ old('phone', $subscription->phone) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Gekozen Pakket</label>
                <input type="text" class="form-control bg-light" value="{{ $subscription->pakket_naam ?? 'Onbekend' }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Aantal Lessen</label>
                <input type="text" class="form-control bg-light" value="{{ $subscription->aantal_lessons ?? '-' }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Prijs (€)</label>
                <input type="text" class="form-control bg-light"
                    value="{{ number_format($subscription->pakket_prijs ?? 0, 2, ',', '.') }}" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Bijwerken</button>
            <a href="{{ route('subscriptions.index') }}" class="btn btn-secondary">Annuleren</a>
        </form>
    </div>
</x-app-layout>
