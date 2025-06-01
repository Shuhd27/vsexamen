<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SportLessen</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <header class="topbar">
        <div class="contact-info">
            <span>030-1234567</span>
            <span>info@sportlessen.nl</span>
        </div>
    </header>

    <nav class="navbar" role="navigation">
        <div class="logo">SportLessen</div>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('packages.index') }}">Boek een les</a></li>
            <!-- <li><a href="{{ route('availabilities.index') }}">Beschikbaarheid</a></li> -->
            <li><a href="{{ route('contacts.index') }}">Contact</a></li>
            <li><a href="{{ route('dashboard') }}">ADMIN</a></li>
        </ul>
    </nav>