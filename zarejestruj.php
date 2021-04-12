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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?<?php echo time()?>">
    <title>Zarejestruj</title>
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
    <div class="container center is-full-height">
        <div class="medium-width">
            <?php
                if(isset($_POST['newpassword'])){
                    $nhaslo = $_POST['newpassword'];
                    $pnhaslo = $_POST['pnewpassword'];
                    $id = $_POST['id'];
                    if($nhaslo == $pnhaslo){
                        $sql = "UPDATE `konto` SET `haslo` = '$nhaslo' WHERE `konto_id` = $id";
                        mysqli_query($db,$sql);
                        unset($_SESSION['dane']);
                        unset($_SESSION['bhaslo']);                                                        // css \/
                        echo'<h1>Zmieniono hasło</h1>';
                        echo '<a href="index.php">POWRÓT NA STRONĘ GŁÓWNĄ</a>';
                        }else{
                            echo 'Hasła się nie zgadzają';
                     }// --------------------------------------------------------------------------------------------------------------------
                }
                if((isset($_POST['check'])) || (isset($_SESSION['bhaslo']))){
                    unset($_SESSION['bhaslo']);
                    $yn = 1;
                    $sql = "SELECT `email`,`telefon`,`konto_id` FROM `konto`";
                    $result = mysqli_query($db,$sql);
                    while($row = mysqli_fetch_array($result)){
                        if(isset($_SESSION['dane'])){
                            if(($_SESSION['dane'][0] == $row[0]) && ($_SESSION['dane'][1])){
                                $yn = 0;                                                        // css \/
                                echo'<form action="" method="post">
                                Wpisz nowe hasło <br>
                                <input type="password" name="newpassword"><br>
                                Potwierdź hasło <br>
                                <input type="password" name="pnewpassword"><br>
                                <input type="hidden" name="id" value="'.$row[2].'">
                                <input type="submit" value="Zmień hasło">
                                </form>';
                                // --------------------------------------------------------------------------------------------------------------------
                                $_SESSION['bhaslo'] = 1;
                                break;
                            }
                        
                    }
                    elseif(($_POST['email'] == $row[0]) && ($_POST['telefon'] == $row[1])){
                            $yn = 0;                                                        // css \/
                            echo'<form action="" method="post">
                            Wpisz nowe hasło <br>
                            <input type="password" name="newpassword"><br>
                            Potwierdź hasło <br>
                            <input type="password" name="pnewpassword"><br>
                            <input type="hidden" name="id" value="'.$row[2].'">
                            <input type="submit" value="Zmień hasło">
                            </form>';
                            // --------------------------------------------------------------------------------------------------------------------
                            $_SESSION['dane'] = array();
                            $em = $_POST['email'];
                            $tel = $_POST['telefon'];
                            $_SESSION['dane'] = [$em,$tel];
                            $_SESSION['bhaslo'] = 1;
                            break;
                        }
                    }
                    if($yn == 1){                                                        // css \/
                        echo'Podano błędny email lub numer telefonu<br>
                        <br><form action="" method="post">
                            Podaj adres email <input type="text" name="email" placeholder="email" required><br>
                            Podaj numer telefonu<input type="text" name="telefon" placeholder="nr telefonu" required><br>
                            <input type="submit" name="check" value="Odzyskaj hasło">
                        </form>
                        ';
                        // --------------------------------------------------------------------------------------------------------------------
                    }
                }
                if(isset($_POST['create'])){
                                                                            // css \/
                echo'
                    <h1>Zarejestruj się</h1>
                    <form action="" method="post">
                        <div class="mb-8 mt-16">
                            <input class="login" type="text" name="login" placeholder="login" required>
                        </div>
                        <div class="mb-8">
                            <input class="login" type="text" name="email" placeholder="email" required>
                        </div>
                        <div class="mb-8">
                            <input class="login" type="text" name="haslo" placeholder="hasło" required>
                        </div>
                        <div class="mb-8">
                            <input class="login" type="text" name="phaslo" placeholder="potwierdź hasło" required>
                        </div>
                        <div class="mb-8">
                            <input class="login" type="text" name="imie" placeholder="imię" required>
                        </div>
                        <div class="mb-8">
                            <input class="login" type="text" name="nazwisko" placeholder="nazwisko" required>
                        </div>
                        <div class="mb-8">
                            <input class="login" type="text" name="adres" placeholder="adres (obowiązkowe w przypadku dostawy)">
                        </div>
                        <div class="mb-8">
                            <input class="login" type="text" name="telefon" placeholder="nr telefonu">
                        </div>
                        <div class="mb-8">
                            <input class="login-submit pointer green font-white smaller-bigger-font" type="submit" name="acc-create" value="Załóż konto">
                        </div>
                    </form>
                ';
                // --------------------------------------------------------------------------------------------------------------------
                }
                if(isset($_POST['remember'])){
                    unset($_SESSION['dane']);
                    unset($_SESSION['bhaslo']);
                                                                            // css \/
                    echo'
                        <h2>Resetowanie Hasła</h2>
                        <p class="px-32">W celu zrestartowania hasła prosimy o podanie adresu e-mail i numeru telefonu</p>
                        <form action="" method="post">
                        <div class="mt-16 mb-8">
                            <input class="login" type="text" name="email" placeholder="email" required>
                        </div>
                        <div class="mb-8">
                            <input class="login " type="text" name="telefon" placeholder="nr telefonu" required>
                        </div>
                        <div class="mb-20">
                            <input class="login-submit pointer green font-white smaller-bigger-font" type="submit" name="check" value="Odzyskaj hasło">
                        </div>
                            
                            
                            
                        </form>
                    ';
                    // --------------------------------------------------------------------------------------------------------------------
                }
                if(isset($_POST['acc-create'])){
                if(( (isset($_POST['login']) && isset($_POST['haslo'])) && (isset($_POST['phaslo']) 
                && isset($_POST['imie'])) ) && (isset($_POST['nazwisko']) && isset($_POST['email'])) ){

                    $login  = (isset($_POST['login']))?$_POST['login']:NULL;
                    $haslo  = (isset($_POST['haslo']))?$_POST['haslo']:NULL;
                    $phaslo  = (isset($_POST['phaslo']))?$_POST['phaslo']:NULL;
                    $imie  = (isset($_POST['imie']))?$_POST['imie']:NULL;
                    $nazwisko  = (isset($_POST['nazwisko']))?$_POST['nazwisko']:NULL;
                    $adres  = (isset($_POST['adres']))?$_POST['adres']:NULL;
                    $telefon  = (isset($_POST['telefon']))?$_POST['telefon']:NULL;
                    $email  = (isset($_POST['email']))?$_POST['email']:NULL;

                
                    $sql = "SELECT * from konto";
                    $result = mysqli_query($db, $sql);
                    $correct = 1;
                    while($row = mysqli_fetch_array($result)){
                        if($login != $row[1]){
                            if($email != $row[7]){
                                continue;
                            }else{                                                        // css \/
                                $correct = 0;
                                echo "<h2>Ten email jest zajęty</h2>";
                            }
                        }else{
                            $correct = 0;
                            echo "<h2>Ten login jest zajęty</h2>";
                        }
                        // --------------------------------------------------------------------------------------------------------------------
                    }
                    if($correct == 1){
                        if($haslo == $phaslo){
                            $sql = "INSERT INTO `konto` (`Konto_id`,`Login`,`Haslo`,`Imie`,`Nazwisko`,`Adres`,`Telefon`,`Email`,`Uprawnienia`,`zdjecie`) VALUES (NULL, '$login', '$haslo', '$imie', '$nazwisko', '$adres', '$telefon', '$email', '1', 'https://cdn0.iconfinder.com/data/icons/set-ui-app-android/32/8-512.png')";
                            mysqli_query($db, $sql);                                                        // css \/
                            echo '<h1>Stworzono konto</h1>';
                            echo '<a class="subtitle" href="zaloguj.php">Powrót do logowania</a>';
                        }
                        else{
                            echo '<h2>hasło i potwirdzone hasło nie są identyczne</h2>';
                        }
                        // --------------------------------------------------------------------------------------------------------------------
                    }
                }
                }
            ?>
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
    
</body>
</html>