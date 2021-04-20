 # BTGames
 
 
 ## Spis treści 

Polkowski Cezary --\/ 

 

* [Wprowadzenie](#Wprowadzenie) 

* [Języki](#Języki) 

* [Instalacja](#Instalacja) 

* [Zakresy funkcjonalności](#Zakresy-funkcjonalności) 

 - [Instrukcja](#Instrukcja) 

 - [Logowanie](#Logowanie) 

 - [Rejestracja](#Rejestracja) 

 - [Przypominanie hasła](#Przypominanie-hasła) 

 - [Wylogowanie](#Wylogowanie) 

 - [Wyszukiwanie i filtry](#Wyszukiwanie-i-filtry) 

 - [Brak produktów](#Brak-produktów) 

 - [Panel administracyjny](#Panel-administracyjny) 

 - [Koszyk](#Koszyk) 

 - [Panel użytkownika](#Panel-użytkownika) 

 - [Zamówienia](#Zamówienia) 

* [Inne informacje](#Inne-informacje) 

 

 

  

## Wprowadzenie 

Michał Malinowski 

BTGames to projekt sklepu internetowego z grami video. Program pomaga w odnalezieniu gier o pożądanych przez nas wartościach, takich jak: kategoria, cena, przedział wiekowy, język, producent etc. Wyniki wyszukiwania można ostatecznie posortować według: ceny, daty wydania oraz nazwy. BTGames powstał w ramach zajęć z Zarządzania projektem programistycznym. 

## Języki 

Polkowski Cezary --\/ 

Przy tworzeniu projektu zostały użyte: 

* PHP: 8.0.3 

* HTML: 5 

* CSS: 4 

* MySQL 8.0.3 

* ECMA Script(JavaScript) 2018 

 

 

 

## Instalacja 

Polkowski Cezary --\/ 

Aby projekt działał, należy mieć zainstalowany pakiet XAMPP o minimalnej wersji PHP 7.3.25.  umieścić W folderze xampp znajduje się folder o nazwie htdocs. To w nim należy stworzyć folder o nazwie projektu i do niego wypakować wszystkie pliki tworzące projekt. Aby uruchomić projekt należy: 

Włączyć usługi Apache i MySQL.  

Otworzyć przeglądarkę internetową. 

Wpisać w pasek wyszukiwania ścieżkę względną od folderu htdocs do pliku index.php (Jeśli nie były tworzone pod-foldery to ścieżka powinna wyglądać następująco “localhost/*nazwa folderu z plikami projektu*/index.php”) 

 

## Zakresy funkcjonalności 

Łukasz Dmitruk --\/ 

* Strona główna wyświetla listę gier zawartych w bazie danych. 

* Wyszukiwanie z użyciem filtrów lub nazwy produktów. 

* Dodawanie danych do koszyka oraz składanie zamówień. 

* Poza zalogowaniem się, możemy również założyć konto oraz przypomnieć hasło. 

* Panel użytkownika pozwala użytkownikowi na podejrzenie swoich danych oraz ich zmianę, a także wylogowanie się. 

* Koszyk i zamówienia przechowują dane o wybranych przez użytkownika artykułach oraz o złożonych przez niego zamówieniach. 

* Panel administracyjny umożliwia dodawanie i usuwanie gier, języków, kategorii oraz producentów, a także zmianę stanu realizacji zamówień złożonych przez użytkownika. 

  

 

## Instrukcja 

 

Polkowski Cezary --\/ 

### Logowanie 

 

Po wejściu na stronę główną w prawym głównym rogu wyświetla się zielony przycisk “ZALOGUJ SIĘ”. 

![nawigacja](scr/nawigacja_przed_zalogowaniem.jpg) 

Po jego kliknięciu użytkownik zostanie przeniesiony na stronę logowania. Jeśli użytkownik posiada konto i wpisze jego odpowiednie dane to zostanie zalogowany i przeniesiony na stronę index.php 

![panel logowania](scr/logowanie.jpg) 

 

### Rejestracja 

 

W przypadku gdy użytkownik nie posiada konta w panelu logowania należy kliknąć opcję “Załóż konto”. Po jego kliknięciu użytkownik zostanie przeniesiony na stronę rejestracji. 

![panel rejestracji](scr/rejestracja.jpg) 

Użytkownik powinien wpisać dane, które będą przypisane do założonego konta, według schematu. 

Po wprowadzeniu danych należy kliknąć przycisk “Załóż konto”. Po udanej rejestracji powinna wyświetlić się informacja oraz link do strony głównej. 

![powiadomienie o udanej rejestracji](scr/po_rejestracji.jpg) 

 

### Przypominanie hasła 

 

W przypadku gdy użytkownik nie pamięta hasła do konta należy w panelu logowania kliknąć przycisk “Zapomniałem hasła”. Poprzez podanie e-maila oraz numeru telefonu wyświetlony zostanie formularz ustawiający nowe hasło. Po jego wypełnieniu wyświetli się informacja, że hasło zostało zaktualizowane oraz link to strony głównej 

 

### Wylogowanie 

 

Gdy użytkownik jest zalogowany może się on wylogować poprzez: 

Kliknięcie swojego zdjęcia profilowego w prawym górnym rogu strony 

Kliknięcie przycisku wyloguj na wyświetlonej liście 

 

### Wyszukiwanie i filtry 

 

Na stronie są 2 sposoby znajdowania wybranych produktów: 

Wyszukiwanie po nazwie/producencie 

Na górze strony znajduje się panel wyszukiwania. Po wipsaniu frazy lub kliknięciu na jeden z zaproponowanych elementów i potwierdzeniu wyszukiwania przez przycisk ‘Szukaj’ zadziała skrypt który wyszukuje produkty. 

![Nawigacja](scr/nawigacja_przed_zalogowaniem.jpg) 

Wyszukiwanie po filtrach 

![Filtry](scr/filtry.jpg) 

 

W lewej części strony znajduje się panel z filtrami. Są w nim umieszczone: 

-Miejsca do wpisania minimalnej i maksymalnej ceny, 

-Rozwijana lista producentów, 

-Pola typu checkbox z kategoriami, 

-Pola typu checkbox z kategoriami wiekowymi, 

-Pola typu checkbox z wersjami językowymi, 

- Rozwijana lista sposobów sortowania. 

Po wybraniu filtrów należy kliknąć przycisk ‘Wyszukaj’. Aby wyzerować filtry należy kliknąć w ikonkę ‘X’. 

![Przycisk wyszukaj](scr/wyszukaj-htdosc.jpg) 

 

 

### Brak produktów  

Michał Malinowski --\/ 

 

Po załadowaniu strony z bazy danych wczytywana jest ilość każdego produktu. Następnie, jeżeli okaże się, że nie ma odpowiedniej ilości sztuk produktu w celu sprzedaży to przycisk “Kup teraz” zmieni kolor na szary, treść przycisku będzie pisała Brak oraz klikanie przycisku nie przyniesie żadnego wyniku. Takie zabezpieczenie jest także zastosowane na stronie z produktem. 

 

Łukasz Dmitruk --\/ 

 

### Panel administracyjny 

 

Po wejściu do panelu administratora możemy wybrać operację, którą chcemy dokonać. 

![Panel administracyjny](scr/panel_administratora_po_przejściu_do_panelu.jpg) 

W przypadku dodawania gier, zmiany stanu realizacji zamówień oraz usuwania gier, języka, kategorii i producenta, wyświetlane są aktualne dane i wszystkie możliwe opcje. 

#### Przykładowe dodawanie 

![Panel administracyjny](scr/panel_administratora_po_kliknieciu_gry_dodaj.jpg) 

#### Przykładowe usuwanie 

![Panel administracyjny](scr/panel_administratora_po_kliknieciu_gry_usun.jpg) 

 Po specyfikowaniu parametrów przekazywane są one do bazy danych. 

 

### Koszyk 

 

Koszyk przechowuje informacje o dodanych przez użytkownika artykułach. Użytkownik może usuwać pozycje z koszyka, a także złożyć zamówienie. 

![Koszyk](scr/koszyk.jpg) 

 

### Panel użytkownika 

 

Po wejściu do panelu użytkownika dostajemy możliwość wyświetlenia danych użytkownika po wpisaniu hasła. 

![Panel użytkownika](scr/panel_uzytkownika_1.jpg) 

Po podaniu hasła na stronie zostaną wypisane wszystkie przechowywane dane dotyczące konta użytkownika takie jak: login, hasło, imię, nazwisko, adres i telefon. 

![Panel użytkownika](scr/panel_uzytkownika_2.jpg) 

Po kliknięciu przycisku ‘Zaktualizuj dane’ użytkownik ma możliwość zmiany swoich danych. 

![Panel użytkownika](scr/panel_uzytkownika_zmiany.jpg) 

 

### Zamówienia 

Zamówienia przechowują informacje o produktach zamówionych przez użytkownika, o ich cenie jednostkowej jak i cenie łącznej. 

![Zamówienia](scr/zamowienia.jpg) 

 

 

 

## Inne informacje 

 

* Status projektu: Zakończony 

 

* Autorzy: 

Michał Malinowski 

Cezary Polkowski  

Łukasz Dmitruk 

 

* Licencja: Freeware 

 

* Projekt został zakończony i nie jest planowane jego dalsze rozwijanie 

 

 Ilustracje - Michał Malinowski 
