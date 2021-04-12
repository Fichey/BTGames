<?php
@require_once('dbfunction.php');
$db = dbConnect();
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="script.js" type="text/javascript"></script>
    <title>BT Games</title>
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
            <main>
            <div class="container df">
                <div class="main-left">
                    <div class="container">
                        <h1>Wszystkie produkty</h1>
                        <form action="index.php" method="POST">
                            <div class="filter b">
                                <div class="price pad-20">
                                    <h2 class="subtitle">Cena:</h2>
                                    <div class="price-holder">
                                        <div class="price-filter">
                                            <input class="price-range" type="number" placeholder="Od" value="<?php 
                                            
                                            if(isset($_POST['p-min'])){
                                                echo $_POST['p-min'];
                                            }
                                            else{
                                                echo "0";
                                            }?>" name="p-min">
                                        </div>
                                        <span>&nbsp;-&nbsp;</span>    
                                        <div class="price-filter">
                                            <input class="price-range" type="number" placeholder="Do" value="<?php 
                                            if(isset($_POST['p-max'])){
                                                echo $_POST['p-max'];
                                            }
                                            else{
                                                echo "1000";
                                            }?>" name="p-max">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter b">
                                <div class="producent pad-20">
                                    <h2 class="subtitle">Producent:</h2>
                                    <select name="producent">
                                        <?php 
                                            $sql = "SELECT distinct(producent_nazwa), producent_ID from producent inner join gry on gry.Id_producenta = producent.producent_ID";
                                            $result = mysqli_query($db, $sql);
                                            echo '<option value="-1" ';
                                            if(!isset($_POST['producent'])){
                                                echo "selected";
                                            }
                                            echo '>Wszyscy producenci</option>';
                                            while($row = mysqli_fetch_array($result)){
                                                if($_POST['producent'] == $row[1]){
                                                    echo '<option value="'.$row[1].'" selected>'.$row[0].'</option>';
                                                }else{
                                                    echo '<option value="'.$row[1].'">'.$row[0].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="filter b">
                                <div class="genre pad-20">
                                    <h2 class="subtitle">Kategorie:</h2>
                                    <?php 

                                        $sql = "SELECT distinct(k.id_kat), k.nazwa from kategorie as k 
                                        inner join kategorie_gry as kg on k.id_kat = kg.id_kat 
                                        inner join gry as g on kg.id_gry = g.id_gry";
                                        $result = mysqli_query($db, $sql);
                                        $ke = [];
                                        $kz = [];
                                        while($row = mysqli_fetch_array($result)){
                                            $ke[] = [$row[0],$row[1]];
                                        }
                                        for($i=0; $i<count($ke); $i++){
                                            if(isset($_POST['kat'.$i])){
                                                $kz[] = [$i, $ke[$i][0], $ke[$i][1]];
                                            }
                                        }
                                        
                                        for($i=0; $i<count($ke); $i++){
                                            echo "<input type='checkbox' name='kat$i'";
                                            foreach($kz as $wartosc){
                                                if($wartosc[0] == $i){
                                                    echo " checked";
                                                }
                                            }
                                            echo "> ".$ke[$i][1]."<br>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="filter b">
                                <div class="pegi pad-20">
                                    <h2 class="subtitle">PEGI:</h2>
                                        <?php 
                                            $sql = "SELECT distinct(pegi) from gry order by pegi desc";
                                            $result = mysqli_query($db, $sql);
                                            $pe = [];
                                            $pg = [];
                                            while($row = mysqli_fetch_array($result)){
                                                $pe[] = $row[0];
                                            }
                                            for($i=0; $i<count($pe); $i++){
                                                if(isset($_POST['pegi'.$i])){
                                                    $pg[] = [$i, $pe[$i]];
                                                }
                                            }
                                            
                                            for($i=0; $i<count($pe); $i++){
                                                echo "<input type='checkbox' name='pegi$i'";
                                                foreach($pg as $wartosc){
                                                    if($wartosc[0] == $i){
                                                        echo " checked";
                                                    }
                                                }
                                                echo "> $pe[$i]<br>";
                                            }

                                        ?>
                                </div>
                            </div>
                            <div class="filter b">
                                <div class="genre pad-20">
                                    <h2 class="subtitle">Język:</h2>

                                        <?php 
                                            $sql = "SELECT distinct(j.id_jezyk), j.jezyk from jezyk as j 
                                            inner join jezyk_gry as jg on j.id_jezyk = jg.id_jezyk 
                                            inner join gry as g on jg.id_gry = g.id_gry";
                                            $result = mysqli_query($db, $sql);
                                            $je = [];
                                            $jz = [];
                                            while($row = mysqli_fetch_array($result)){
                                                $je[] = [$row[0],$row[1]];
                                            }
                                            for($i=0; $i<count($je); $i++){
                                                if(isset($_POST['jezyk'.$i])){
                                                    $jz[] = [$i, $je[$i][0], $je[$i][1]];
                                                }
                                            }
                                            
                                            for($i=0; $i<count($je); $i++){
                                                echo "<input type='checkbox' name='jezyk$i'";
                                                foreach($jz as $wartosc){
                                                    if($wartosc[0] == $i){
                                                        echo " checked";
                                                    }
                                                }
                                                echo "> ".$je[$i][1]."<br>";
                                            }
                                        ?>

                                </div>
                            </div>
                            <div class="filter b">
                                <div class="genre pad-20">
                                    <h2 class="subtitle">Dodatkowe:</h2>
                                    <?php
                                        echo '<input type="checkbox" name="pudelkowa"';
                                        if(isset($_POST['pudelkowa'])){
                                            echo ' checked';
                                        }
                                        echo '>';
                                    ?> Wersja pudełkowa<br>
                                </div>
                            </div>
                            <div class="filter b">
                                <div class="genre pad-20">
                                    <h2 class="subtitle">Sortowanie:</h2>
                                    <select name="sorting">
                                    <?php
                                        $sort = [];
                                        $sort[0] = "Od najtańszej";
                                        $sort[1] = "Od najdrożeszej";
                                        $sort[2] = "Alfabetycznie";
                                        $sort[3] = "Od najnowszej";
                                        $sort[4] = "Od najstarszej";
                                        
                                        for($i=0; $i<count($sort); $i++){
                                            echo "<option value='$i'";
                                            if(isset($_POST['sorting']) and $i == $_POST['sorting'])
                                                echo " selected";
                                            echo ">".$sort[$i];

                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="filter df input-search">
                                <input class="w-75 delete-styling green add-link smaller-bigger-font b-l pointer" type="submit" value="Wyszukaj" name="search">
                            </form>
                            <form class="input-search w-25" action="index.php" method="POST">
                                <input class="fill delete-styling b-r pointer" type="submit" value="X" name="reset">
                            </form>
                            </div>

                    </div>
                </div>
                <div class="main-right">
                    <div class="container">
                        <!-- for wyswietlający 7 produktów na pętli pobieranych z bazy -->  
                        <?php
                                if(isset($_POST['search'])){
                                    $sql = "SELECT * from gry as g
                                    inner join kategorie_gry as kg on g.id_gry = kg.id_gry 
                                    inner join jezyk_gry as jg on g.id_gry = jg.id_gry 
                                    where g.id_gry > 0";

                                    $as = "";
                                    if(isset($_POST['p-min'])){
                                        $min = $_POST['p-min'];
                                        $as = $as." and cena_produktu >= '$min'";
                                    }
                                    if(isset($_POST['p-max'])){
                                        $max = $_POST['p-max'];
                                        $as = $as." and cena_produktu <= '$max'";
                                    }
                                    if(isset($_POST['producent'])){
                                        $producent = $_POST['producent'];
                                        if($_POST['producent']!= -1){
                                            $as = $as." and Id_producenta = '$producent'";
                                        }
                                    }
                                    if(count($kz)>0){
                                        $ksql = "SELECT * from kategorie_gry order by id_gry asc";
                                        $kresult = mysqli_query($db, $ksql);
                                        $kats = [];
                                        $vic = [];
                                        while($krow = mysqli_fetch_array($kresult)){
                                            $kats[$krow[0]][] = $krow[1];
                                        }
                                        
                                        foreach($kats as $gra => $gra_kat){
                                            $bool = true;
                                            foreach($kz as $kategoria){
                                                $czy_kat = false;
                                                foreach($gra_kat as $kat){
                                                    if($kategoria[1] == $kat){
                                                        $czy_kat = true;
                                                    }
                                                }
                                                if($czy_kat == false){
                                                    $bool = false;
                                                    break;
                                                }
                                            }
                                            if($bool == true){
                                                $vic[] = $gra;
                                            }

                                        }
                                        if(count($vic)>1){
                                            $as = $as." and (g.id_gry = ".$vic[0];
                                            for($i=1; $i<count($vic); $i++){
                                                $as = $as." or g.id_gry = ".$vic[$i];
                                            }
                                            $as = $as.")";
                                        }elseif(count($vic) == 1){
                                            $as = $as." and g.id_gry = ".$vic[0];
                                        }elseif(count($vic) == 0){
                                            $as = $as." and g.id_gry = 0";
                                        }
                                    }
                                    if(count($pg)>1){
                                        $as = $as." and (pegi = ".$pg[0][1];
                                        for($i=1; $i<count($pg); $i++){
                                            $as = $as." or pegi = ".$pg[$i][1];
                                        }
                                        $as = $as.")";
                                    }if(count($pg) == 1){
                                        $as = $as." and pegi = ".$pg[0][1];
                                    }
                                    if(count($jz)>1){
                                        $as = $as." and (jg.id_jezyk = ".$jz[0][1];
                                        for($i=1; $i<count($jz); $i++){
                                            $as = $as." or jg.id_jezyk = ".$jz[$i][1];
                                        }
                                        $as = $as.")";
                                    }if(count($jz) == 1){
                                        $as = $as." and jg.id_jezyk = ".$jz[0][1];
                                    }
                                    if(isset($_POST['pudelkowa'])){
                                        $pudelkowa = 1;
                                        $as = $as." and wersja <= '$pudelkowa'";
                                    }else{
                                        $pudelkowa = 0;
                                    }
                                    if(isset($_POST['sorting'])){
                                        $jezyk = $_POST['sorting'];
                                        if($jezyk == 0){
                                            $as = $as." order by cena_produktu asc";
                                        }
                                        if($jezyk == 1){
                                            $as = $as." order by cena_produktu desc";
                                        }
                                        if($jezyk == 2){
                                            $as = $as." order by nazwa_produktu asc";
                                        }
                                        if($jezyk == 3){
                                            $as = $as." order by rok_produkcji desc";
                                        }
                                        if($jezyk == 4){
                                            $as = $as." order by rok_produkcji asc";
                                        }
                                    }
                                    $sql = $sql.$as;
                                }elseif(isset($_POST['szukaj'])){
                                    $fraza = $_POST['fraza'];
                                    $sql = "SELECT * from gry as g
                                    inner join kategorie_gry as kg on g.id_gry = kg.id_gry 
                                    inner join jezyk_gry as jg on g.id_gry = jg.id_gry 
                                    inner join producent as p on g.Id_producenta = p.producent_ID 
                                    where g.nazwa_produktu like '%$fraza%' or p.producent_nazwa like '%$fraza%' order by g.id_gry asc";
                                }
                                else{
                                    $sql = "SELECT * from gry as g
                                    inner join kategorie_gry as kg on g.id_gry = kg.id_gry 
                                    inner join jezyk_gry as jg on g.id_gry = jg.id_gry 
                                    where g.id_gry > 0 order by g.id_gry asc";
                                }

                            $index = 0;
                            
                            $zpt = explode("*", $sql)[0]."count(g.id_gry)".explode("*", $sql)[1];
                            $rst = mysqli_query($db, $zpt);
                            $rzd = mysqli_fetch_array($rst);
                            if($rzd[0] == 0){
                                echo '<script>alert("Żadna gra nie pasuje do podanych kategorii")</script>';
                                $sql = "SELECT * from gry as g
                                    inner join kategorie_gry as kg on g.id_gry = kg.id_gry 
                                    inner join jezyk_gry as jg on g.id_gry = jg.id_gry 
                                    where g.id_gry > 0 order by g.id_gry asc";
                            }
                            $result = mysqli_query($db, $sql);
                            while($row = mysqli_fetch_array($result)){
                                
                                if($index == $row[0]){
                                    continue;
                                }
                                $index = $row[0];

                                echo "<div class='product df py-12 my-12 b'> ";
                                echo "  <div class='product-thumbnail center m0'>";
                                echo "      <img class='b' src='$row[7]' alt='zdjecie gry' height='256' width='196'>";
                                echo "  </div>";
                                echo "  <div class='df'>";
                                echo "  <div class='description'>";
                                echo "      <h2 class='bigger-font pt-5'> $row[1] </h2>";
                                echo "      <div class='pad-20 smallest-bigger-font'>";
                                echo "      <p>Gatunek: ";
                                $zapytanie = "SELECT k.nazwa from kategorie_gry as kg inner join kategorie as k on kg.id_kat = k.id_kat where id_gry = $row[0]";
                                $wynik = mysqli_query($db, $zapytanie);
                                while($rzad = mysqli_fetch_array($wynik)){
                                    echo "$rzad[0], ";
                                }
                                echo "</p>";
                                echo "      <p>Wersja: cyfrowa";
                                $zapytanie = "SELECT wersja from gry where id_gry = $row[0]";
                                $wynik = mysqli_query($db, $zapytanie);
                                $rzad = mysqli_fetch_array($wynik);
                                if($rzad[0] == 1){
                                    echo ", pudełkowa";
                                }
                                echo "</p>";
                                echo "      <p>Klasyfikacja wiekowa: ";
                                $zapytanie = "SELECT pegi from gry where id_gry = $row[0]";
                                $wynik = mysqli_query($db, $zapytanie);
                                $rzad = mysqli_fetch_array($wynik);
                                echo "$rzad[0]";
                                echo "</p>";
                                echo "      <p>Wersja językowa: ";
                                $zapytanie = "SELECT j.jezyk from jezyk as j inner join jezyk_gry as jg on jg.id_jezyk = j.id_jezyk where id_gry = $row[0]";
                                $wynik = mysqli_query($db, $zapytanie);
                                while($rzad = mysqli_fetch_array($wynik)){
                                    echo "$rzad[0], ";
                                }
                                echo "</p>";
                                echo "  </div>";
                                echo "  </div>";
                                echo "  <div class='center ml-16'>";
                                echo "  <div>";
                                echo "      <div class='price'>";
                                echo "          <p class='title pt-5'>$row[3] zł</p>";
                                echo "      </div>";
                                $sql_button = "SELECT `ilosc_produktu` FROM `gry` WHERE id_gry=".$row[0];
                                $result_button = mysqli_query($db,$sql_button);
                                $row_button = mysqli_fetch_array($result_button);
                                if($row_button[0] != 0){
                                echo "      <a class='buy-button add-link product-pl add-to-cart center b m0' href='produkt.php?id=$row[0]'>";
                                echo "          <div class='buy-now biggest-font'>";
                                echo "              Kup teraz";
                                echo "          </div>";
                                echo "      </a>";
                                }else{
                                echo "      <a class='buy-button add-link product-pl lack-of-product center b m0'>";
                                echo "          <div class='buy-now biggest-font'>";
                                echo "              BRAK";
                                echo "          </div>";
                                echo "      </a>";
                                }
                                echo "  </div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                            
                        
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <div class="container">
            <div class="ds-nav">
                <div class="telephone ds-nav">
                    <div class="icon">
                        <img src="sluchawka.png" alt="Ikona telefonu" height="48" width="48">
                    </div>
                    <div class="smaller-bigger-font">
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
                <div class="bigger-font">
                    Email: kontakt@btgames.pl
                </div>
                <div class="bigger-font">
                    Fax: 22 123 45 11
                </div>
            </div>
        </div>
    </footer>
</body>
</html>