<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends Controller
{
    // Index: lijst van beschikbaarheden pagineren
    public function index()
    {
        $availabilities = Availability::all();  // Load all availabilities

        return view('availabilities.index', compact('availabilities'));
    }


    // Create: formulier tonen
    public function create()
    {
        $users = User::all(); // of eventueel filteren op rol
        return view('availabilities.create', compact('users'));
    }

    // Store: nieuwe beschikbaarheid opslaan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',  //Verwijder deze regel
            'instructor_name' => 'required|string|max:255', // Voeg deze regel toe
            'status' => 'required|in:beschikbaar,niet beschikbaar',
        ]);

        try {
            // Voeg de ingelogde gebruiker toe
            $validated['user_id'] = Auth::id(); // of auth()->id()

            Availability::create($validated);

            return redirect()->route('availabilities.index')
                ->with('success', 'Beschikbaarheid succesvol toegevoegd.');
        } catch (\Exception $e) {
            Log::error('Error creating availability: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Er is een fout opgetreden bij het toevoegen van de beschikbaarheid.');
        }
    }

    // Edit: formulier voor bewerken tonen
    public function edit($id)
    {
        $availability = Availability::find($id);

        if (!$availability) {
            return redirect()->route('availabilities.index')
                ->with('error', 'Beschikbaarheid niet gevonden.');
        }

        return view('availabilities.edit', compact('availability'));
    }

    // Update: wijzigingen opslaan
    public function update(Request $request, $id)
    {
        $availability = Availability::find($id);

        if (!$availability) {
            return redirect()->route('availabilities.index')
                ->with('error', 'Beschikbaarheid niet gevonden.');
        }

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'instructor_name' => 'required|string|max:255', // Zorg ervoor dat deze regel aanwezig is
            'status' => 'required|in:beschikbaar,niet beschikbaar',
        ]);

        try {
            $availability->update($validated);

            return redirect()->route('availabilities.index')
                ->with('success', 'Beschikbaarheid succesvol bijgewerkt.');
        } catch (\Exception $e) {
            Log::error('Error updating availability: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Er is een fout opgetreden bij het bijwerken van de beschikbaarheid.');
        }
    }

    // Destroy: verwijderen
    public function destroy($id)
    {
        $availability = Availability::find($id);

        if (!$availability) {
            return redirect()->route('availabilities.index')
                ->with('error', 'Beschikbaarheid niet gevonden.');
        }

        try {
            $availability->delete();

            return redirect()->route('availabilities.index')
                ->with('success', 'Beschikbaarheid succesvol verwijderd.');
        } catch (\Exception $e) {
            Log::error('Error deleting availability: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Er is een fout opgetreden bij het verwijderen van de beschikbaarheid.');
        }
    }
}
