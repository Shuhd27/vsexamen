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
      <!-- @auth
        <li><a href="{{ route('registrations.index') }}">ADMIN</a></li>
      @endauth -->
    </ul>
  </nav>

  <section class="hero">
    <h1>Welkom bij SportLessen</h1>
    <p>Boek eenvoudig sportlessen, beheer je beschikbaarheid als instructeur, of houd overzicht als beheerder.</p>
    <a href="{{ route('packages.index') }}" class="cta-button">Boek nu een les</a>
  </section>

  <main class="main-content">
    <section class="features">
      <h2>Waarom kiezen voor SportLessen?</h2>
      <ul>
        <li>Eenvoudig lessen boeken en annuleren</li>
        <li>Instructeurs beheren zelf hun beschikbaarheid</li>
        <li>Beheerders kunnen reserveringen aanpassen</li>
        <li>Beveiligd inloggen met versleutelde wachtwoorden</li>
        <li>Automatische bevestiging per e-mail</li>
      </ul>
    </section>
  </main>

  <footer class="footer">
    <p>&copy; 2025 SportLessen. Alle rechten voorbehouden.</p>
  </footer>
  @if(session('success'))
  <div id="popup" class="popup-overlay">
    <div class="popup-content">
      <p>{{ session('success') }}</p>
      <button id="closePopup">Sluiten</button>
    </div>
  </div>

  <style>
    .popup-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    .popup-content {
      background: white;
      padding: 2rem;
      border-radius: 8px;
      text-align: center;
      max-width: 90%;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    #closePopup {
      margin-top: 1rem;
      padding: 0.5rem 1rem;
      background-color: #004d40;
      /* blauwe knop */
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    #closePopup:hover {
      background-color: #004d40;
    }
  </style>

  <script>
    const popup = document.getElementById('popup');
    const closeBtn = document.getElementById('closePopup');

    closeBtn.addEventListener('click', () => {
      popup.style.display = 'none';
    });

    // Optioneel: sluit popup automatisch na 5 seconden
    setTimeout(() => {
      if (popup) popup.style.display = 'none';
    }, 5000);
  </script>
  @endif


</body>

</html>