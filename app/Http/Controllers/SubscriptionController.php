<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    // Toon alle inschrijvingen met pakketten
    public function index()
    {
        // Stored procedure naam aangepast
        $subscriptions = DB::select('CALL GetSubscriptionsWithPackages()');
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function create(Request $request)
    {
        $packageId = $request->query('package_id');
        $package = $packageId ? Package::findOrFail($packageId) : null;
        return view('subscriptions.create', compact('package'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'package_id' => 'required|integer|exists:packages,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        Subscription::create($validatedData);

        return redirect('/')
            ->with('success', 'Inschrijving succesvol! We nemen zo snel mogelijk contact met je op.');
    }

    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('subscriptions.edit', compact('subscription'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'package_id' => 'required|integer|exists:packages,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription->update($data);

        return redirect()->route('subscriptions.index')->with('success', 'Registratie succesvol bijgewerkt.');
    }

    public function destroy($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return redirect()->route('subscriptions.index')
                ->with('error', 'Pakket gegevens niet gevonden.');
        }

        try {
            $subscription->delete();

            return redirect()->route('subscriptions.index')
                ->with('success', 'Pakket gegevens succesvol verwijderd.');
        } catch (\Exception $e) {
            Log::error('Error deleting Subscription: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Er is een fout opgetreden bij het verwijderen van de Pakket gegevens.');
        }
    }
}
