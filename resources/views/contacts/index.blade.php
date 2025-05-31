<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container availability-form">
        <h1>Neem contact met ons op</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="naam" class="form-label">Naam</label>
                <input type="text" name="naam" id="naam" class="form-control" value="{{ old('naam') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mailadres</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="telefoon" class="form-label">Telefoonnummer (optioneel)</label>
                <input type="tel" name="telefoon" id="telefoon" class="form-control" value="{{ old('telefoon') }}">
            </div>

            <div class="mb-3">
                <label for="bericht" class="form-label">Bericht</label>
                <textarea name="bericht" id="bericht" class="form-control" rows="5" required>{{ old('bericht') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Verstuur bericht</button>
            <a href="{{ url('/') }}" class="btn btn-secondary">Annuleren</a>
        </form>
    </div>
</x-app-layout>
