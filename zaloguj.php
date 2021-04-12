

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Zaloguj</title>
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
        <div>
            <?php
            if((isset($_SESSION['dane'])) || (isset($_SESSION['bhaslo']))){
                unset($_SESSION['dane']);
                unset($_SESSION['bhaslo']);
            }
            if(isset($_POST['login']) && isset($_POST['haslo'])){
                $login = $_POST['login'];
                $haslo = $_POST['haslo'];
                @require_once('dbfunction.php');
                $db = dbConnect();
                if($db){
                    $sql = "Select `login`, `haslo`, `email`,`konto_id` from `konto`";
                    $wynik = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_array($wynik)){
                        if(($row[0] == $login && $row[1] == $haslo) || ($row[2] == $login && $row[1] == $haslo)){
                            session_start();
                            $_SESSION['account'] = $row[3];
                            if(isset($_SESSION['k'])){
                                $id = $_GET['id'];
                                header("location: produkt.php?id=$id");
                            }else{
                                header("location: index.php");
                            }
                        }
                    }                                                        // css \/
                    echo "<h2>Niepoprawny login lub hasło!</h2>";
                    // --------------------------------------------------------------------------------------------------------------------
                }
            }
        ?>  
            <h1>Logowanie</h1>
            <form action="" method="post">
                <div class="mb-8">
                    <input class="login mt-16" type="text" name="login" placeholder="login lub email" required>
                </div>
                <div class="mb-8">
                    <input class="login" type="password" name="haslo" placeholder="hasło" required>
                </div>
                <div class="mb-20">
                    <input class="login-submit pointer green font-white smaller-bigger-font" type="submit" value="Zaloguj">
                </div>
            </form>
            <form action="zarejestruj.php" method="POST">
                <div class="ds-nav">
                    Nie masz konta? <input class="pointer add-link product-pl panel-button m-n center bn" type="submit"  name="create" value="Załóż konto"><br>
                    <input class="pointer add-link product-pl panel-button m-n center bn" type="submit" name="remember" value="Zapomniałem hasła">
                </div>
            </form>
            <!--// ---------------------------------------------------------------------------------------------------------------------->
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