<?php
@require_once('dbfunction.php');
$db = dbConnect();
session_start();

$ajdi = $_GET['id'];
$sql = "SELECT * from gry where id_gry = $ajdi";
$wynik = mysqli_query($db, $sql);
$row = mysqli_fetch_array($wynik);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>BT Games - <?php echo $row[1]; ?></title>
    <script src="script.js" type="text/javascript"></script>
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
            <div class="container">
                <section class="df pb-16 product-container">
                    <article class="article-main center">
                        <div class="main-image litlle-pull-right">
                            
                            <?php
                                $sql = "SELECT * from gry where id_gry = $ajdi";
                                $result = mysqli_query($db, $sql);
                                $row = mysqli_fetch_array($result);
                                echo '<img class="b" src="'.$row[7].'" alt="zdjecie gry" height="500" width="375">';
                            ?>
                            
                        </div>
                    </article>
                    <article class="article-main center">
                        <div class="medium_width litlle-pull-left">
                            <div class="name-of-the-game b">
                                <h1 class="title">
                                    <?php
                                        echo $row[1];
                                    ?>
                                </h1>
                            </div>
                            <div class="tags-game mb-20 b">
                                <p class="tag smaller-bigger-font">
                                    Gatunki: 
                                        <?php
                                            $zapytanie = "SELECT k.nazwa from kategorie_gry as kg inner join kategorie as k on kg.id_kat = k.id_kat where id_gry = $row[0]";
                                            $wynik = mysqli_query($db, $zapytanie);
                                            while($rzad = mysqli_fetch_array($wynik)){
                                                echo "$rzad[0], ";
                                            }
                                        ?>
                                </p>
                                <p class="tag smaller-bigger-font">
                                    Wersja: Wersja cyfrowa
                                    <?php
                                        if($row[8] == 1){
                                            echo ", Wersja pudełkowa";
                                        }
                                    ?>
                                </p>
                                <p class="tag smaller-bigger-font">
                                    Klasyfikacja PEGI: Od lat
                                    <?php
                                        echo " $row[9]";
                                    ?>
                                </p>
                                <p class="tag smaller-bigger-font">
                                    Dostepne jezyki: 
                                    <?php
                                        $zapytanie = "SELECT j.jezyk from jezyk_gry as jg inner join jezyk as j on jg.id_jezyk = j.id_jezyk where id_gry = $row[0]";
                                        $wynik = mysqli_query($db, $zapytanie);
                                        while($rzad = mysqli_fetch_array($wynik)){
                                            echo "$rzad[0], ";
                                        }
                                    ?>
                                </p>

                            </div>
                            <div class="buy-area bigger-font df center">
                                <div class="product-pl price article-main center b m0">
                                    <?php
                                        echo "$row[3] zł";
                                    ?>
                                </div>
                                <?php
                                $onclick = "onclick='alert(\"Dodano do koszyka\")'";
                                $sql_button = "SELECT `ilosc_produktu` FROM `gry` WHERE id_gry=".$row[0];
                                $result_button = mysqli_query($db,$sql_button);
                                $row_button = mysqli_fetch_array($result_button);
                                if($row_button[0] != 0){
                                echo '<a class="add-link product-pl add-to-cart article-main center b m0" '.$onclick.' href="dodaj_do_koszyka.php?id='.$row[0].'">
                                        <div>
                                            Dodaj do koszyka
                                        </div>
                                     </a>';
                                }else{
                                echo '<div class="add-link product-pl lack-of-product article-main center b m0" href="dodaj_do_koszyka.php?id='.$row[0].'">
                                        <div>
                                            Brak produktu
                                        </div>
                                    </div>';
                                }
                                ?>
                               
                            </div>
                        </div>
                    </article>
                </section>
                
                <section>
                    <article>
                        <div class="pad-20 center b mb-16">
                            <h2 class="title">
                                Opis produktu
                            </h2>
                        </div>
                        <div class="pb-16">
                            <p>
                                <?php
                                    echo "$row[4]";
                                ?>
                            </p>
                        </div>
                    </article>
                </section>
            </div>
        </main>

        <footer>
            <div class="container">
                <div class="ds-nav">
                    <div class="telephone ds-nav">
                        <div class="icon">
                            <img src="sluchawka.png" alt="Ikona telefonu" height="48" width="48">
                        </div>
                        <div class="smaller-bigger-font">
                            +48 444 222 000
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
    </div>
</body>