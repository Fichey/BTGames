<?php
@require_once('dbfunction.php');
$db = dbConnect();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Document</title>
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
    <div class="zamowienia content">
        <div class="container center">
            <div>
                <?php
                    $sql = "SELECT `zamowienie_id` FROM ZAMOWIENIA WHERE `zamowienie_konto_id`=".$_SESSION['account'];
                    $result = mysqli_query($db,$sql);
                    $row = mysqli_fetch_array($result);
                    if(!isset($row['zamowienie_id'])){                                                        // css \/
                        echo "<h1>NIE ZŁOŻYŁEŚ ŻADNEGO ZAMÓWIENIA</h1><br>";
                        echo '<a href="index.php">POWRÓT NA STRONĘ GŁÓWNĄ</a>';
                        // --------------------------------------------------------------------------------------------------------------------
                    }
                    $sql = "SELECT `realizacja`,`nr_zamowienia`,`id_gry`,`zamowienie_id` FROM `zamowienia` WHERE `zamowienie_konto_id` =".$_SESSION['account'];
                    $result = mysqli_query($db,$sql);
                    while($row = mysqli_fetch_array($result)){
                        if($row[0]==0)
                            $realizacja = "NIE ZREALIZOWANE";
                        else
                            $realizacja = "ZREALIZOWANO";
                    }
                    $sql = "SELECT * FROM (`gry` JOIN `zamowienia` ON gry.id_gry=zamowienia.id_gry) JOIN `konto` on zamowienia.zamowienie_konto_id=konto.Konto_id WHERE konto.konto_id=".$_SESSION['account'];
                    $result = mysqli_query($db,$sql);
                    $nr = 0;
                    $i=0;
                    $suma = 0;
                    while($row = mysqli_fetch_array($result)){
                        
                        $sql2 = "SELECT count(`nr_zamowienia`) FROM `zamowienia` WHERE `zamowienie_konto_id` =".$_SESSION['account']." AND `nr_zamowienia` = ".$row[11];
                        $result2 = mysqli_query($db,$sql2);
                        while($row2 = mysqli_fetch_array($result2)){
                            $count = $row2[0];
                        }
                            if($nr != $row[11]){
                                                                                    // css \/
                            echo '<div class="center">
                            <div class="pad-10">
                            <div>
                            <table>
                            <tr>
                                <th>Tytuł</th>
                                <th>Cena</th>
                            </tr>';
                            }
                            echo'<tr class="table_element">
                                <td class="py-6 title">'.$row[1].'</td>
                                <td class="py-6 price">'.$row[3].'zł</td>
                                </tr>';
                                // --------------------------------------------------------------------------------------------------------------------
                        $i++;
                        $suma += $row[3];
                        $nr = $row[11];
                            if($i == $count){
                                                                                    // css \/
                                echo '</table>
                                </div>
                                <div class="checkout">
                                    Numer Zamówienia: '.$nr.'<br>
                                    Wartość zamówienia: '.$suma.'zł<br>
                                    Stan zamówienia: '.$realizacja.'
                                </div>';
                                // --------------------------------------------------------------------------------------------------------------------
                                $i = 0;
                                $suma = 0;
                            }
                        echo '</div>';
                        echo '</div>';
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
    </div>
</body>
</html>