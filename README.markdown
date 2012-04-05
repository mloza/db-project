# Projekt z baz danych

## Struktura tego wszystkiego
Całość jest zrobiona według wzorca projektowego MVC (http://pl.wikipedia.org/wiki/Model-View-Controller). 

W modelu trzymamy rzeczy związane z wykonywaniem zapytań do DB (tak w skrócie). Kontroler pobiera dane z modelu, obrabia i przekazuje do widoku. 
Widok prezentuje przekazane mu dane. Jest zrobiony przykład na skoczku, pobieranie skoczka pojedynczego oraz wszystkich. Domyślnie jest ładowany template z folderu
views/templates/default.php oraz tworzony dla niego widok z views/kontorler/action_akcja.php. Aby dobrać się do szablony piszemy $this->template a do widoku $this->template->view.
Możemy przypisywać zmienne normalnieczyli $this->template->asd = 'asdf'; i w template będzie dostępna zmienna $asd o wartości asdf oraz przez metodę set, wtedy można ustawić kilka zmiennych 
w następujący sposób: $this->template->view->set('asd', 'asdf')->set('zmienna2', 'wartość2'); Przekazywanie zmiennych do widoku itp dzieje sie automagicznie. Tworzenie nowego Widoku (można stworzyć 
i przekazać go jak normalną zmienną oraz potem wyśiwetlić) lib_View::factory('nazwa') stworzy widok z pliku 'views/nazwa.php'. 

Domyślnie jest również tworzony podstawowy obiekt modelu (jeśli istnieje), towrzy się model o takiej nazwie jak kontroler czyli dla Controller_Skoczek tworzony jest model Model_Skoczek.
Przechowywany jest w kontrolerze w zmeinnej model czyli np. aby odwołać się do metody getJumper z modelu wywołujemy $this->model->getJumper();

# UWAGA!!!
Biblioteki są ładowane automagicznie przez autoloader więc aby utworzyć widok, kontroler czy model nie trzeba nic dołączać includem ani niczym podobnym.  

## URL
Zasada działania URL jest bardzo prosta, całość posiada strukturę: http://db-proj.com/kontroler/akcja/parametr1/parametr2.html Nie wszystkie elementy są wymagane.
Domyślnie jest usationy kontroler dashboard i akcja index. Nie używajcie konstruktorów i destruktorów w kontrolerze, aby wykonać jakąś akcje zawsze przed wywołaniem metody akcji
należy użyć metody before a po akcji after. Jeśli potrzebujecie konstruktora trzeba pamiętać o dodaniu parent::__construct i analogicznie do destruktora, jeśli tego zabraknie
nie zostaną załadowane domyślne widoki, modele itp.

## Konfiguracja
Katalog config. Bazę konfiguruje się w pliku database. Dodajcie go sobie później do ignorowanych w gicie żeby wam nie nadpisywało ustawień. W conf.php ustawia się domyślny kontroler i akcje. 
Url służy do ustawienia podstawowego katalogu (czyli jak jest projekt w http://localhost/db-projekt/) to w url wpisujesz db-projekt/, mimo wszystko polecam skonfigurować virtualny serwer w apache
i dodać domenkę do hosts i cieszyć się projektem pod domeną wtedy będzie działać bo z url nie testowałem jeszcze.

### Pytania?
Wiecie jak się kontaktować (nie przez facebooka!)

# May the force be with you


