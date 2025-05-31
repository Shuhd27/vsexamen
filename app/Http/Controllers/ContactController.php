<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    /**
     * Show the form for creating a new contact message.
     */
    public function create()
    {
        return view('contacts.index');
    }
    /**
     * Store a newly created contact message in storage.
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'email' => 'required|email',
            'telefoon' => 'nullable|string',
            'bericht' => 'required|string',
        ]);

        Contact::create($validated);


        // hier zou je bijvoorbeeld een mail kunnen versturen of het opslaan in de database

        return redirect()->route('contacts.index')->with('success', 'Bedankt voor je bericht!');
    }
}
