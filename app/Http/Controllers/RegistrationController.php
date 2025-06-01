<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{

    // Toon alle gekochte pakketten (registraties)
    public function index()
    {
        // Haal alle registraties op met de bijbehorende pakketten (relatie)
        $registrations = DB::select('CALL GetRegistrationsWithPackages()');

        // Return een view met de registraties
        return view('registrations.index', compact('registrations'));
    }


    public function create(Request $request)
    {
        $packageId = $request->query('package_id');
        $package = $packageId ? Package::findOrFail($packageId) : null;

        return view('registrations.create', compact('package'));
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

        return redirect('/')
        ->with('success', 'Inschrijving succesvol! We nemen zo snel mogelijk contact met je op.');
    }
}
