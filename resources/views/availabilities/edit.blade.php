<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="container availability-form">
        <h1>Beschikbaarheid Bewerken</h1>

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

        <form action="{{ route('availabilities.update', $availability->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Verborgen user_id veld --}}
            <input type="hidden" name="user_id" value="{{ $availability->user_id }}">

            <div class="mb-3">
                <label for="instructor_name" class="form-label">Naam instructeur</label>
                <input type="text" name="instructor_name" id="instructor_name" class="form-control" 
                    value="{{ old('instructor_name', $availability->instructor_name) }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">-- Kies status --</option>
                    <option value="beschikbaar" {{ (old('status', $availability->status) == 'beschikbaar') ? 'selected' : '' }}>Beschikbaar</option>
                    <option value="niet beschikbaar" {{ (old('status', $availability->status) == 'niet beschikbaar') ? 'selected' : '' }}>Niet beschikbaar</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Bijwerken</button>
            <a href="{{ route('availabilities.index') }}" class="btn btn-secondary">Annuleren</a>
        </form>
    </div>
</x-app-layout>
