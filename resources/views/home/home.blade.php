<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SportLessen</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header class="topbar">
    <div class="contact-info">
      <span>030-1234567</span>
      <span>info@sportlessen.nl</span>
    </div>
  </header>

  <nav class="navbar">
    <div class="logo">SportLessen</div>
    <ul class="nav-links">
      <li><a href="{{ ('/') }}">Home</a></li>
      <li><a href="#">Boek een les</a></li>
      <li><a href="#">Instructeurs</a></li>
      <li><a href="{{ route('availabilities.index') }}">Beschikbaarheid</a></li>
      <li><a href="{{ route('login') }}"
      class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">Inloggen</a></li>
      <li><a href="{{ route('register') }}"
      class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Registreren</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

  <section class="hero">
    <h1>Welkom bij SportLessen</h1>
    <p>Boek eenvoudig sportlessen, beheer je beschikbaarheid als instructeur, of houd overzicht als beheerder.</p>
    <a href="#" class="cta-button">Boek nu een les</a>
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
</body>
</html>
