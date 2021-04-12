<?php
@require_once('dbfunction.php');
$db = dbConnect();
session_start();
if(isset($_POST['updated'])){
    $sql = "SELECT `login`,`haslo`,`imie`,`nazwisko`,`adres`,`telefon`,`zdjecie` FROM `konto` WHERE konto.konto_id=".$_SESSION['account'];
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_array($result)){

        $login  = ($_POST['login'])!=NULL?$_POST['login']:$row[0];
        $haslo  = ($_POST['haslo'])!=NULL?$_POST['haslo']:$row[1];
        $imie  =  ($_POST['imie'])!=NULL?$_POST['imie']:$row[2];
        $nazwisko  = ($_POST['nazwisko'])!=NULL?$_POST['nazwisko']:$row[3];
        $adres  = ($_POST['adres'])!=NULL?$_POST['adres']:$row[4];
        $telefon  = ($_POST['telefon'])!=NULL?$_POST['telefon']:$row[5];
        $explode = explode(".",$_POST['zdjecie']);
        if(end($explode) == 'png' || end($explode) == 'jpg'){
        $zdjecie = ($_POST['zdjecie'])!=NULL?$_POST['zdjecie']:$row[6];
        }
        else{
            echo '<script type="text/javascript">alert("Podano zły format zdjęcia\nUstawiono zdjęcie podstawowe")</script>';
            $zdjecie = 'https://cdn0.iconfinder.com/data/icons/set-ui-app-android/32/8-512.png';
        }
        $sql2 = "UPDATE `konto` SET `Login`='$login',`Haslo`='$haslo',`Imie`='$imie',`Nazwisko`='$nazwisko',`Adres`='$adres',`Telefon`='$telefon',`zdjecie`='$zdjecie' WHERE `konto`.konto_id=".$_SESSION['account'];
        mysqli_query($db,$sql2);
        $_SESSION['verify'] = 1;
        $_SESSION['newpassword'] = $haslo;
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?<?php echo time()?>">
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
        <div class="content">
            <div class="container">
                    <?php
                        $sql = "SELECT `konto`.`Uprawnienia` FROM `konto` WHERE konto.konto_id=".$_SESSION['account'];
                        $result = mysqli_query($db,$sql);
                        $row = mysqli_fetch_array($result);
                        if($row[0] == 2){
                                                                                  // css \/
                            echo'<a href="admin-panel.php" class="add-link product-pl add-to-cart center b">Przejdź do panelu administracyjnego</a>';
                            // --------------------------------------------------------------------------------------------------------------------
                        }
                    ?>
                <div class="center">
                    <div class="user-profile-panel fl">
                        <?php
                        $sql = "SELECT `zdjecie` FROM `konto` WHERE konto.konto_id=".$_SESSION['account'];
                        $result = mysqli_query($db,$sql);
                        while($row = mysqli_fetch_array($result)){
                            echo'
                            <img src="'.$row[0].'" width="256" height="256" alt="zdjecie uzytkownika"/>
                            ';
                        }
                        ?>
                    </div>
                    <div class="u-info fl">
                        <div class="user-info">
                        <?php
                        if(isset($_POST['update'])){
                                                                                            // css \/
                            echo'<div class="update-form">
                                <form action="" method="POST">
                                    <input type="text" name="login" placeholder="Podaj nowy login"><br>
                                    <input type="text" name="haslo" placeholder="Podaj nowe hasło"><br>
                                    <input type="text" name="imie" placeholder="Podaj nowe imię"><br>
                                    <input type="text" name="nazwisko" placeholder="Podaj nowe nazwisko"><br>
                                    <input type="text" name="adres" placeholder="Podaj nowy adres"><br>
                                    <input type="number" name="telefon" placeholder="Podaj nowy numer"><br>
                                    <input type="text" name="zdjecie" placeholder="Podaj URL zdjęcia"><br>
                                    <input type="submit" class="add-link product-pl panel-button center b" name="updated" value="Zaktualizuj dane">
                                </form>
                                </div>';
                                // --------------------------------------------------------------------------------------------------------------------
                        }elseif(isset($_POST['password']) || isset($_SESSION['verify'])){
                            if(isset($_POST['password'])){
                                $haslo = $_POST['password'];
                            }else{
                                $haslo = $_SESSION['newpassword'];
                            }
                            $sql = "SELECT `login`,`haslo`,`imie`,`nazwisko`,`adres`,`telefon` FROM `konto` WHERE konto.konto_id=".$_SESSION['account'];
                            $result = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_array($result)){
                                if(($row[1] == $haslo || isset($_SESSION['verify'])))
                                {
                                unset($_SESSION['newpassword']);
                                unset($_SESSION['verify']);
                                                                                            // css \/
                                echo'LOGIN : '.$row[0].'<br>';
                                echo'HASŁO : '.$row[1].'<br>';
                                echo'IMIĘ : '.$row[2].'<br>';
                                echo'NAZWISKO : '.$row[3].'<br>';
                                echo'ADRES : '.$row[4].'<br>';
                                echo'TELEFON : '.$row[5].'<br>';
                                echo'<form action="" method="POST">
                                        <input type="submit" name="update" class="add-link product-pl panel-button center b" value="Zaktualizuj dane">
                                    </form>';
                                    // --------------------------------------------------------------------------------------------------------------------
                                    }else{
                                        unset($_SESSION['verify']); 
                                                                                            // css \/
                                        echo'
                                        <h2>Wprowadzono błędne hasło</h2>
                                        <form action="" method="POST">
                                            Podaj hasło by wyświetlić dane<br>
                                            <input type="password" name="password" placeholder="Wpisz hasło">
                                            <input class="add-link product-pl panel-button center b" type="submit" value="Prześlij">
                                        </form>';
                                        // --------------------------------------------------------------------------------------------------------------------
                                    }
                            }
                                }else{
                                    unset($_SESSION['verify']);
                                                                                            // css \/
                                    echo'
                                    <form action="" method="POST">
                                        Podaj hasło by wyświetlić dane<br>
                                        <input type="password" name="password" placeholder="Wpisz hasło"><br>
                                        <input class="add-link product-pl panel-button center b" type="submit" value="Prześlij">
                                    </form>';
                                    // --------------------------------------------------------------------------------------------------------------------
                                    }
                        ?>
                        </div>
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