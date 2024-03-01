<?php

// Utworzenie obiektu sluzacego do komunikacji z baza danych MySQL
$con = new mysqli('localhost', 'root', '', 'personal_bookcase_database');

// Sprawdzenie czy polaczono sie z baza danych pomyslnie
if (!$con) {
    // Zatrzymuje wykonywanie skryptu i wyswietla komunikat bledu
    die(mysqli_error($con));
}
