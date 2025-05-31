<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Package;

class RegistrationController extends Controller
{

    // Toon alle gekochte pakketten (registraties)
    public function index()
    {
        // Haal alle registraties op met de bijbehorende pakketten (relatie)
        $registrations = Registration::with('package')->get();

        // Return een view met de registraties
        return view('registrations.index', compact('registrations'));
    }


    public function create(Request $request)
    {
        $packageId = $request->query('package_id');

        // Controleer of het pakket bestaat, anders redirect met foutmelding
        if ($packageId && !Package::find($packageId)) {
            return redirect()->route('packages.index')->withErrors('Gekozen pakket bestaat niet.');
        }

        return view('registrations.create', compact('packageId'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'package_id' => 'required|integer|exists:packages,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Maak nieuwe registratie aan met alleen de gevalideerde data
        Registration::create($validatedData);

        return redirect()->route('packages.index')->with('success', 'Inschrijving succesvol!');
    }
}
