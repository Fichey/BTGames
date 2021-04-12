<?php
    @require_once('dbfunction.php');
    $db = dbConnect();
    session_start();
    $sql = "SELECT `nr_zamowienia` FROM `zamowienia` ORDER BY `nr_zamowienia` DESC LIMIT 1";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    if($row[0] == 0){
        $nr = 1;
    }
    else{
        $nr = $row[0] + 1;
    }
    $account = $_SESSION['account'];
    $suma = 0;
    $sql = "SELECT `gry`.`id_gry`,`gry`.`cena_produktu`,`gry`.`ilosc_produktu` FROM `gry` JOIN `koszyk` ON `gry`.`id_gry`=`koszyk`.`id_gry` WHERE `koszyk`.`Koszyk_konto_id` =".$account;
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_array($result)){
        $suma += $row[1];
        $sql2 = "INSERT INTO `zamowienia`(`Zamowienie_id`, `nr_zamowienia`, `Zamowienie_konto_id`, `id_gry`) VALUES (NULL,$nr,$account,$row[0])";
        mysqli_query($db,$sql2);
        $sql2 = "DELETE FROM `koszyk` WHERE `koszyk`.`Koszyk_konto_id`= $account AND `koszyk`.`id_gry` = $row[0]";
        mysqli_query($db,$sql2);
    }
                                                            // css \/
    echo '<h1>ZŁOŻONO ZAMÓWIENIE</h1><br>';
    echo '<h3>CAŁKOWITA KWOTA ZAMÓWIENIA: '.$suma.'zł</h3>';
    echo '<a href="index.php">POWRÓT NA STRONĘ GŁÓWNĄ</a>';
    // --------------------------------------------------------------------------------------------------------------------
    mysqli_close($db);
?>