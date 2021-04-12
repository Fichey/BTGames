<?php
    @require_once('dbfunction.php');
    $db = dbConnect();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?<?php echo time();?>">
    <title>Document</title>
    <script src="script.js" type="text/javascript"></script>
</head>
</head>
<body>
<nav class="fix">
        <div class="container ds-nav">
            <div class="logo">
                <a href="index.php"> <!-- Jakieś parametry ? --->
                    <img src="logo.png" alt="Logo naszego sklepu">
                </a>
            </div>
            <div class="search-bar">
                <form action="index.php" method="post">
                    <input class="searchbar" type="text" 
                    <?php
                        if(isset($_POST['fraza'])){
                            $fraza = $_POST['fraza'];
                            echo 'value="'.$fraza.'" ';
                        }
                    ?>name="fraza" placeholder="Wpisz nazwę lub producenta produktu...">
                    <input class="h-32p litlle-pull-left" type="submit" value="Szukaj" name="szukaj">
                </form>
            </div>
            <div class="user-profile">
                    <?php
                        if(isset($_SESSION['account'])){
                            $sql = "SELECT zdjecie from konto where Konto_id=".$_SESSION['account'];
                            $result = mysqli_query($db, $sql);
                            $row = mysqli_fetch_array($result);
                            echo '<input onClick="dropdown()" class="dropbtn" type="image" src="'.$row[0].'" alt="zdjecie uzytkownika" width="60" height="60"/>'; 
                        }else{
                            echo '<a href="zaloguj.php" class="add-link product-pl panel-button m-n center b">ZALOGUJ SIĘ</a>';
                        }
                    ?>
                <div id="myDropdown" class="dropdown-content">
                    <a href="user-panel.php">Panel użytkownika</a>
                    <a href="koszyk.php">Koszyk</a>
                    <a href="zamowienia.php">Zamówienia</a>
                    <a href="wyloguj.php">Wyloguj</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container center">
            <div class="admin-form-main mt-16 center-panel">
                <h1 class="pb-16">Panel administracyjny</h1>
                <div>
                            <?php
                            if(isset($_POST['gry'])){ // gry
                                echo'<div class="mb-5">';
                                echo'<h4>Podaj dane gry</h4>';
                                echo'<form action="dodawanie_do_bazy.php" method="post">
                                <input type="text" name="nazwa_produktu" placeholder="Tytuł"><br>
                                <input type="number" name="ilosc_produktu" placeholder="Dostępna ilość"><br>
                                <input type="number" step=".01" name="cena_produktu" placeholder="Cena"><br>
                                <input type="text" name="opis_produktu" placeholder="Opis"><br>
                                <input type="number" name="rok_produkcji" placeholder="Rok produkcji"><br>
                                <input type="text" name="grafika" placeholder="URL grafiki"><br>
                                <input type="number" name="wersja" placeholder="Wersja"><br>
                                <input type="number" name="pegi" placeholder="PEGI"><br>';
                                echo'</div>';
                    
                                echo'<h4>Wybierz język</h4>';//  JEZYK
                                echo'<div class="checkbox mb-5">';
                                $sql = "SELECT `id_jezyk`, `jezyk` FROM `jezyk`";
                                $result = mysqli_query($db,$sql);
                                $i = 0;
                                while($row = mysqli_fetch_array($result)){
                                    echo'<input type="checkbox" name="jezyk'.$i.'" value="'.$row[0].'"> '.$row[1].'<br>';
                                    $i++;
                                }
                                echo'</div>';

                                echo'<h4>Wybierz kategorię</h4>'; //  KATEGORIE 
                                echo'<div class="checkbox mb-5">';
                                $sql = "SELECT `id_kat`, `nazwa` FROM `kategorie`";
                                $result = mysqli_query($db,$sql);
                                $i = 0;
                                while($row = mysqli_fetch_array($result)){
                                    echo'<input type="checkbox" name="kategorie'.$i.'" value="'.$row[0].'"> '.$row[1].'<br>';
                                    $i++;
                                }
                                echo'</div>';

                                echo'<h4>Wybierz producenta</h4>
                                <select name="id_producenta">'; //  PRODUCENT
                                $sql = "SELECT `producent_ID`, `producent_nazwa` FROM `producent`";
                                $result = mysqli_query($db,$sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo'<option value="'.$row[0].'">'.$row[1].'</option>';
                                }
                                echo'</select><br>';

                                echo'<input type="submit" class="add-link product-pl panel-button pb-wi center b" name="gry-add" value="Dodaj grę">
                                </form>';
                                echo'<a href="admin-panel.php" class="add-link product-pl pb-w panel-button center b">Powrót</a>';
                                // --------------------------------------------------------------------------------------------------------------------

                            }elseif(isset($_POST['jezyk'])){ // jezyk                                                         // css \/
                                echo '<h4 class="mb-5">Dodaj język</h4>';
                                echo'<form action="dodawanie_do_bazy.php" method="post">
                                <input type="text" name="jezyk" placeholder="Język"><br>
                                <input type="submit" class="add-link product-pl panel-button pb-wi center b" name="jezyk-add">
                                </form>';
                                echo'<a href="admin-panel.php" class="add-link product-pl pb-w panel-button center b">Powrót</a>';
                                // --------------------------------------------------------------------------------------------------------------------

                            }elseif(isset($_POST['kategorie'])){ // kategorie                                                         // css \/
                                echo '<h4 class="mb-5">Dodaj kategorie</h4>';
                                echo'<form action="dodawanie_do_bazy.php" method="post">
                                <input type="text" name="kategorie" placeholder="Nazwa kategorii"><br>
                                <input type="submit" class="add-link product-pl panel-button pb-wi center b" name="kategorie-add">
                                </form>';
                                echo'<a href="admin-panel.php" class="add-link product-pl pb-w panel-button center b">Powrót</a>';
                                // --------------------------------------------------------------------------------------------------------------------

                            }elseif(isset($_POST['producent'])){ // producent                                                         // css \/
                                echo '<h4 class="mb-5">Dodaj producenta</h4>';
                                echo'<form action="dodawanie_do_bazy.php" method="post">
                                <input type="text" name="producent" placeholder="Nazwa producenta"><br>
                                <input type="submit" class="add-link product-pl panel-button pb-wi center b" name="producent-add">
                                </form>';
                                echo'<a href="admin-panel.php" class="add-link product-pl pb-w panel-button center b">Powrót</a>';
                                // --------------------------------------------------------------------------------------------------------------------

                            }elseif(isset($_POST['zamowienia-poj'])){ // zamowienia
                                $sql = "SELECT count(nr_zamowienia) FROM `zamowienia`";
                                $result = mysqli_query($db,$sql);
                                $row = mysqli_fetch_array($result);
                                $liczba1 = $row[0];
                                $liczba_zamowien = array();
                                for($i=1;$i<$liczba1;$i++){
                                    $sql = "SELECT count(nr_zamowienia) FROM `zamowienia` WHERE nr_zamowienia=".$i;
                                    $result = mysqli_query($db,$sql);
                                    $row = mysqli_fetch_array($result);
                                    $liczba_zamowien[$i] = $row[0];
                                }
                                $licznik = 0;
                                foreach($liczba_zamowien as $l){
                                if($l != 0 ){
                                    $licznik++;
                                }
                                }
                                for($i=1;$i<$licznik+1;$i++){
                                    echo'<form action="dodawanie_do_bazy.php" method="post">';                                                        // css \/
                                    $sql = "SELECT * FROM `zamowienia` WHERE nr_zamowienia=".$i;
                                    $result = mysqli_query($db,$sql);
                                    echo '<br>Zamówienie nr: '.$i.'<br>';
                                    while($row = mysqli_fetch_array($result)){
                                        $konto = $row[2];
                                        echo 'ID gry: '.$row[3].'<br>';
                                        if($row[4] == 0)
                                            $stan = 'NIE ZREALIZOWANO';
                                        else
                                            $stan = 'ZREALIZOWANO';
                                        
                                    }
                                    echo '<input type="hidden" value="'.$i.'" name="zamowienie'.$i.'">';
                                    echo '<br>ID konta: '.$konto.'<br>';
                                    echo 'Stan realizacji: '.$stan.'<br>';
                                    echo 'Zmień stań zamówienia<br>';
                                    echo '<select name="zamowienie'.$i.'">';
                                    echo '<option value="'.$i.'/1">ZREALIZOWANO</option>
                                    <option value="'.$i.'/0" name="zamowienie'.$i.'">NIEZREALIZOWANO</option>';
                                    echo '</select><br>';
                                    echo'<input type="submit" class="add-link product-pl panel-button pb-wi center b" name="zamowienia-realizacja">
                                    </form><br>';
                                    }
                                echo'<a href="admin-panel.php" class="add-link product-pl pb-w panel-button center b">Powrót</a>';
                                // --------------------------------------------------------------------------------------------------------------------

                            }elseif(isset($_POST['zamowienia-wiele'])){ // zamowienia                                                        
                                $sql = "SELECT count(nr_zamowienia) FROM `zamowienia`";
                                $result = mysqli_query($db,$sql);
                                $row = mysqli_fetch_array($result);
                                $liczba1 = $row[0];
                                $liczba_zamowien = array();
                                for($i=1;$i<$liczba1;$i++){
                                    $sql = "SELECT count(nr_zamowienia) FROM `zamowienia` WHERE nr_zamowienia=".$i;
                                    $result = mysqli_query($db,$sql);
                                    $row = mysqli_fetch_array($result);
                                    $liczba_zamowien[$i] = $row[0];
                                }
                                $licznik = 0;
                                foreach($liczba_zamowien as $l){
                                if($l != 0 ){
                                    $licznik++;
                                }
                                }
                                echo'<form action="dodawanie_do_bazy.php" method="post">';                                                         // css \/
                                for($i=1;$i<$licznik+1;$i++){
                                    $sql = "SELECT * FROM `zamowienia` WHERE nr_zamowienia=".$i;
                                    $result = mysqli_query($db,$sql);
                                    echo '<br>Zamówienie nr: '.$i.'<br>';
                                    while($row = mysqli_fetch_array($result)){
                                        $konto = $row[2];
                                        echo 'ID gry: '.$row[3].'<br>';
                                        if($row[4] == 0)
                                            $stan = 'NIE ZREALIZOWANO';
                                        else
                                            $stan = 'ZREALIZOWANO';
                                    }
                                    echo '<input type="hidden" value="'.$i.'" name="zamowienie'.$i.'">';
                                    echo '<br>ID konta: '.$konto.'<br>';
                                    echo 'Stan realizacji: '.$stan.'<br>';
                                    echo 'Zmień stań zamówienia<br>';
                                    echo '<select name="zamowienie'.$i.'">';
                                    echo '<option value="'.$i.'/1">ZREALIZOWANO</option>
                                    <option value="'.$i.'/0" name="zamowienie'.$i.'">NIEZREALIZOWANO</option>';
                                    echo '</select><br>';
                                    }
                                echo'
                                <input type="submit" class="add-link product-pl panel-button pb-wi center b" name="zamowienia-realizacja">
                                </form>';
                                echo'<a href="admin-panel.php" class="add-link product-pl pb-w panel-button center b">Powrót</a>';
                                // --------------------------------------------------------------------------------------------------------------------

                            }elseif(isset($_POST['u-gry'])){ // usuwanie----------------------------
                                echo'<div class="checkbox">';
                                echo'<form action="dodawanie_do_bazy.php" method="post">';                                                        // css \/
                                echo'<h4 class="mb-5">Wybierz grę do usunięcia</h4>'; //  GRY
                                $sql = "SELECT `id_gry`, `nazwa_produktu` FROM `gry`";
                                $result = mysqli_query($db,$sql);
                                $i = 0;
                                while($row = mysqli_fetch_array($result)){
                                    echo'<input type="checkbox" name="usun'.$i.'" value="'.$row[0].'"> '.$row[1].'<br>';
                                    $i++;
                                };
                                echo'</div>';
                                echo'<input type="submit" class="add-link product-pl panel-button pb-wi center b" name="gry-delete">
                                </form>';
                                echo'<a href="admin-panel.php" class="add-link product-pl pb-w panel-button center b">Powrót</a>';
                                // --------------------------------------------------------------------------------------------------------------------

                            }elseif(isset($_POST['u-jezyk'])){
                                echo'<div class="checkbox">';
                                echo'<form action="dodawanie_do_bazy.php" method="post">';                                                        // css \/
                                echo'<h4 class="mb-5">Wybierz język do usunięcia</h4>'; //  JEZYK
                                $sql = "SELECT `id_jezyk`, `jezyk` FROM `jezyk`";
                                $result = mysqli_query($db,$sql);
                                $i = 0;
                                while($row = mysqli_fetch_array($result)){
                                    echo'<input type="checkbox" name="usun'.$i.'" value="'.$row[0].'"> '.$row[1].'<br>';
                                    $i++;
                                };
                                echo'</div>';
                                echo'
                                <input type="submit" class="add-link product-pl panel-button pb-wi center b" name="jezyk-delete">
                                </form>';
                                echo'<a href="admin-panel.php" class="add-link product-pl pb-w panel-button center b">Powrót</a>';
                                // --------------------------------------------------------------------------------------------------------------------

                            }elseif(isset($_POST['u-kategorie'])){
                                echo'<div class="checkbox">';
                                echo'<form action="dodawanie_do_bazy.php" method="post">';                                                        // css \/
                                echo'<h4 class="mb-5">Wybierz kategorię do usunięcia</h4>'; //  KATEGORIE
                                $sql = "SELECT `id_kat`, `nazwa` FROM `kategorie`";
                                $result = mysqli_query($db,$sql);
                                $i = 0;
                                while($row = mysqli_fetch_array($result)){
                                    echo'<input type="checkbox" name="usun'.$i.'" value="'.$row[0].'"> '.$row[1].'<br>';
                                    $i++;
                                };
                                echo'</div>';
                                echo'
                                <input type="submit" class="add-link product-pl panel-button pb-wi center b" name="kategorie-delete">
                                </form>';
                                echo'<a href="admin-panel.php" class="add-link product-pl pb-w panel-button center b">Powrót</a>';
                                // --------------------------------------------------------------------------------------------------------------------

                            }elseif(isset($_POST['u-producent'])){
                                echo'<div class="checkbox">';
                                echo'<form action="dodawanie_do_bazy.php" method="post">';                                                        // css \/
                                echo'<h4 class="mb-5">Wybierz producenta do usunięcia</h4>'; //  PRODUCENT
                                $sql = "SELECT `producent_ID`, `producent_nazwa` FROM `producent`";
                                $result = mysqli_query($db,$sql);
                                $i = 0;
                                while($row = mysqli_fetch_array($result)){
                                    echo'<input type="checkbox" name="usun'.$i.'" value="'.$row[0].'"> '.$row[1].'<br>';
                                    $i++;
                                };
                                echo'</div>';
                                echo'
                                <input type="submit" class="add-link product-pl panel-button pb-wi center b" name="producent-delete">
                                </form>';
                                echo'<a href="admin-panel.php" class="add-link product-pl pb-w panel-button center b">Powrót</a>';
                                // --------------------------------------------------------------------------------------------------------------------
                                
                            }else{                                                                                                                 // css \/
                            echo'
                            <form action="" method="post">
                            Gry<br>
                            <input type="submit" class="add-link product-pl panel-button pb-wi mr b" name="gry" value="Dodaj"><input type="submit" class="add-link product-pl panel-button pb-wi ml b" name="u-gry" value="Usuń"><br>
                            Język<br>
                            <input type="submit" class="add-link product-pl panel-button pb-wi mr b" name="jezyk" value="Dodaj"><input type="submit" class="add-link product-pl panel-button pb-wi ml b" name="u-jezyk" value="Usuń"><br>
                            Kategorie<br>
                            <input type="submit" class="add-link product-pl panel-button pb-wi mr b" name="kategorie" value="Dodaj"><input type="submit" class="add-link product-pl panel-button pb-wi ml b" name="u-kategorie" value="Usuń"><br>
                            Producent<br>
                            <input type="submit" class="add-link product-pl panel-button pb-wi mr b" name="producent" value="Dodaj"><input type="submit" class="add-link product-pl panel-button pb-wi ml b" name="u-producent" value="Usuń"><br>
                            Realizacja zamówień:<br>
                            <input type="submit" class="add-link product-pl panel-button pb-wi mr b" name="zamowienia-poj" value="Pojedyncza"><input type="submit" class="add-link product-pl panel-button pb-wi ml b" name="zamowienia-wiele" value="Masowa">
                            </form>';
                            // --------------------------------------------------------------------------------------------------------------------
                            }
                            ?>
                        </div>
            </div>
        </div>
    <footer>
        <div class="container">
            <div class="ds-nav">
                <div class="telephone ds-nav">
                    <div class="icon">
                        <img src="sluchawka.png" alt="Ikona telefonu" height="48" width="48">
                    </div>
                    <div class="smaller_bigger_font">
                        +48 444 222 000<!-- Numer telefonu na linie kontakotwa--> 
                    </div>
                </div>
                <div class="opened-hours">
                    <ul class="list">
                        <li>pon.-pt. 8.00 - 21.00</li>
                        <li>sob. 9:00 - 18:00</li>
                        <li>niedz. 12:00 - 18.00</li>
                    </ul>
                </div>
                <div class="bigger_font">
                    Email: kontakt@smartv.pl
                </div>
                <div class="bigger_font">
                    Fax: 22 123 45 11
                </div>
            </div>
        </div>
    </footer>
    </div>
</body>
</html>