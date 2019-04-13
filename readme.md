PHP 7.x, Laravel   5.4+, MySQL, Template graficzny AdminLTE

 

System ma dwie listy i operuje na dwóch typach obiektów – pracownik i dział

Przy założeniu, że jeden pracownik może należeć do kilku działów.

 

Każdy pracownik ma dział posiada swój profil wraz z informacjami:

Dane pracownika : zdjęcie (obrazek),imię, nazwisko, tel, email, opis, działy do których należy oraz możliwość generowanie informacji z profilu do PDF

Dział: nazwa działu, krótki opis działu, przynależni pracownicy oraz możliwość generowanie informacji z profilu do PDF

 

System ma możlwość listowania tych obiektów w dwóch niezależnych zakładkach z możliwością sortowania i filtrowania.

 

W systemie występują dwie role:

Administrator - dodaje/usuwa działy i użytkowników (z walidacją)

Zwykły użytkownik – edycja swoich danych/ wgląd do wszystkiego w katalogu

 

Użytkownicy nie mogą sami się rejestrować. Rejestracja jest realizowana za pomocą administratora.
