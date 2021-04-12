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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
    <div class="content">
        <main class="my-12">
                    
    <div class="container df center">
        <div>
            <?php
            $sql = "SELECT `koszyk_id` FROM `koszyk` WHERE Koszyk_konto_id =".$_SESSION['account'];
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result);
            if(!isset($row['koszyk_id'])){                                                        // css \/
                echo "<h1>TWÓJ KOSZYK JEST PUSTY</h1><br>";
                echo '<a href="index.php">POWRÓT NA STRONĘ GŁÓWNĄ</a>';
                // --------------------------------------------------------------------------------------------------------------------
                
            }else{
                                                                    // css \/
            echo'
            <h1 class="title">Koszyk</h1>
            <table class="my-12">
            <tr>
                <th>Gra</th>
                <th>Tytuł</th>
                <th>Cena</th>

                <th>Usuń</th>
            </tr>';
            // --------------------------------------------------------------------------------------------------------------------

            $sql = "SELECT * FROM (`gry` JOIN `koszyk` ON gry.id_gry=koszyk.id_gry) JOIN `konto` on koszyk.Koszyk_konto_id=konto.Konto_id WHERE konto.konto_id=".$_SESSION['account'];
            $result = mysqli_query($db,$sql);
            $suma = 0;
            while($row = mysqli_fetch_array($result)){
                                                                        // css \/
                echo 
                '
                    <tr class="table_element">
                        <td class="highlight image px-32"><img src="'.$row[7].'" alt="zdjecie" height="128" width="98"></td>
                        <td class="highlight smaller-bigger-font px-32">'.$row[1].'</td>
                        <td class="highlight price px-32">'.$row[3].'zł</td>
                        <td class="highlight delete px-32"><a href="usun_z_koszyka.php?id='.$row[10].'&id_gry='.$row[0].'"><img src="trashcan.jpg" width="20" height="20"></a></td>
                    </tr>';
                // --------------------------------------------------------------------------------------------------------------------

                $suma += $row[3];
            }                                                        // css \/
                echo'
                </table>
                <div class="checkout">';
            
                echo'Wartość zamówienia: '.$suma.'zł ';
                echo'<a href="dodaj_do_zamowienia.php" class="order_button">ZAMÓW</a>';
                echo'</div>';
                // --------------------------------------------------------------------------------------------------------------------
            }
                mysqli_close($db);

            ?>
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
    </div>
</body>
</html>