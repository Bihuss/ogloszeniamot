<h2>Opis projektu</h2>
<p>
    Ogłoszenia motoryzacyjne - <strong>Alemoto</strong> to aplikacja webowa, która umożliwia:
</p>
<ul>
    <li>przeglądanie ogłoszeń motoryzacyjnych,</li>
    <li>dodawanie nowych ogłoszeń po zalogowaniu,</li>
    <li>zarządzanie ogłoszeniami poprzez panel administratora (usuwanie niepożądanych ogłoszeń oraz edycja błędnych wpisów).</li>
</ul>
<p>Projekt został zrealizowany jako praca inżynierska, którą obroniłem na ocenę 5.</p>

<h2>Technologie</h2>
<p>Projekt został stworzony przy użyciu następujących technologii:</p>
<ul>
    <li><strong>Framework:</strong> Laravel (PHP)</li>
    <li><strong>Baza danych:</strong> MySQL</li>
</ul>

<h2>Funkcjonalności</h2>
<ul>
    <li>Przeglądanie ogłoszeń motoryzacyjnych według kategorii i filtrów.</li>
    <li>Dodawanie nowych ogłoszeń (dostępne po zalogowaniu).</li>
    <li>Zarządzanie ogłoszeniami przez administratora (usuwanie, edycja).</li>
</ul>

<h2>Instalacja</h2>
<p>Aby uruchomić projekt lokalnie, wykonaj poniższe kroki:</p>
<ol>
    <li>Sklonuj repozytorium:
        <pre><code>git clone https://github.com/twoje-uzytkownik/alemoto.git</code></pre>
    </li>
    <li>Przejdź do folderu projektu:
        <pre><code>cd alemoto</code></pre>
    </li>
    <li>Zainstaluj zależności przy użyciu Composer:
        <pre><code>composer install</code></pre>
    </li>
    <li>Skopiuj plik konfiguracyjny .env:
        <pre><code>cp .env.example .env</code></pre>
    </li>
    <li>Skonfiguruj połączenie z bazą danych w pliku <code>.env</code>:
        <pre><code>
