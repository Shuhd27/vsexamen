<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        // De pakketten in je view injecteren kan ook via controller (optioneel)
        $packages = [
            ['id' => 1, 'name' => 'Beginner', 'lessons' => 5, 'price' => 199],
            ['id' => 2, 'name' => 'Gevorderd', 'lessons' => 10, 'price' => 349],
            ['id' => 3, 'name' => 'Pro', 'lessons' => 15, 'price' => 499],
            ['id' => 4, 'name' => 'All-in', 'lessons' => 20, 'price' => 649],
        ];

        return view('packages.index', compact('packages'));
    }
}
