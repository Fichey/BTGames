<?php
    @require_once('dbfunction.php');
    $db = dbConnect();
    session_start();
    // dodawanie gier
    if(isset($_POST['gry-add'])){
        $nazwa = $_POST['nazwa_produktu'];
        $ilosc = $_POST['ilosc_produktu'];
        $cena = $_POST['cena_produktu'];
        $opis = $_POST['opis_produktu'];
        $producent = $_POST['id_producenta'];
        $rok = $_POST['rok_produkcji'];
        $grafika = $_POST['grafika'];
        $wersja = $_POST['wersja'];
        $pegi = $_POST['pegi'];

        $sql = "INSERT INTO `gry`(`id_gry`, `nazwa_produktu`, `ilosc_produktu`, `cena_produktu`, `opis_produktu`, `Id_producenta`, `rok_produkcji`, `grafika`, `wersja`, `pegi`) VALUES (NULL,'$nazwa','$ilosc','$cena','$opis','$producent','$rok','$grafika','$wersja','$pegi')";
        mysqli_query($db,$sql);

        $sql = "SELECT `id_gry` FROM `gry` ORDER BY `id_gry` DESC LIMIT 1";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        $id = $row[0];

        $sql = "SELECT count(jezyk) FROM JEZYK";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        $ilosc_jezykow = $row[0];

        $jezyki = array();
        for($i = 0;$i<$ilosc_jezykow;$i++){
            $jezyki[$i] = $_POST['jezyk'.$i];
        }
        foreach($jezyki as $j){
        if($j != 0){
            $sql = "INSERT INTO `jezyk_gry`(`id_jezyk`, `id_gry`) VALUES ('$j','$id')";
            mysqli_query($db,$sql);
            }
        }

        $sql = "SELECT count(nazwa) FROM kategorie";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        $ilosc_kategorii = $row[0];
        
        $kategorie = array();
        for($i = 0;$i<$ilosc_kategorii;$i++){
            $kategorie[$i] = $_POST['kategorie'.$i];
        }
        foreach($kategorie as $k){
        if($k != 0){
            $sql = "INSERT INTO `kategorie_gry`(`id_gry`, `id_kat`) VALUES ('$id','$k')";
            mysqli_query($db,$sql);
            }
        }
        header("Location:admin-panel.php");
    }
    // dodawanie jezykow
    if(isset($_POST['jezyk-add'])){
        $jezyk = $_POST['jezyk'];
        $sql = "INSERT INTO `jezyk`(`jezyk`) VALUES ('$jezyk')";
        mysqli_query($db,$sql);
        header("Location:admin-panel.php");
    }

    // dodawanie kategorii
    if(isset($_POST['kategorie-add'])){
        $kategorie = $_POST['kategorie'];
        $sql = "INSERT INTO `kategorie`(`nazwa`) VALUES ('$kategorie')";
        mysqli_query($db,$sql);
        header("Location:admin-panel.php");
    }
    
    // dodawanie producenta
    if(isset($_POST['producent-add'])){
        $producent = $_POST['producent'];
        $sql = "INSERT INTO `producent`(`producent_nazwa`) VALUES ('$producent')";
        mysqli_query($db,$sql);
        header("Location:admin-panel.php");
    }
    if(isset($_POST['gry-delete'])){
        $sql = "SELECT count(id_gry) FROM `gry`";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        $ilosc_usun = $row[0];
        $usun = array();
        for($i = 0;$i<$ilosc_usun;$i++){
            $usun[$i] = $_POST['usun'.$i];
        }
        foreach($usun as $u){
        if($u != 0){
            $sql = "DELETE FROM `gry` WHERE `id_gry`=".$u;
            mysqli_query($db,$sql);
            }
        }
        header("Location:admin-panel.php");
    }
    if(isset($_POST['jezyk-delete'])){
        $sql = "SELECT count(id_jezyk) FROM `jezyk`";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        $ilosc_usun = $row[0];
        $usun = array();
        for($i = 0;$i<$ilosc_usun;$i++){
            $usun[$i] = $_POST['usun'.$i];
        }
        foreach($usun as $u){
        if($u != 0){
            $sql = "DELETE FROM `jezyk` WHERE `id_jezyk`=".$u;
            mysqli_query($db,$sql);
            }
        }
        header("Location:admin-panel.php");
    }
    if(isset($_POST['kategorie-delete'])){
        $sql = "SELECT count(id_kat) FROM `kategorie`";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        $ilosc_usun = $row[0];
        $usun = array();
        for($i = 0;$i<$ilosc_usun;$i++){
            $usun[$i] = $_POST['usun'.$i];
        }
        foreach($usun as $u){
        if($u != 0){
            $sql = "DELETE FROM `kategorie` WHERE `id_kat`=".$u;
            mysqli_query($db,$sql);
            }
        }
        header("Location:admin-panel.php");
    }
    if(isset($_POST['producent-delete'])){
        $sql = "SELECT count(producent_ID) FROM `producent`";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        $ilosc_usun = $row[0];
        $usun = array();
        for($i = 0;$i<$ilosc_usun;$i++){
            $usun[$i] = $_POST['usun'.$i];
        }
        foreach($usun as $u){
        if($u != 0){
            $sql = "DELETE FROM `producent` WHERE `producent_ID`=".$u;
            mysqli_query($db,$sql);
            }
        }
        header("Location:admin-panel.php");
    }
    // dodawanie zamowienia
    if(isset($_POST['zamowienia-realizacja'])){
        $sql = "SELECT count(nr_zamowienia) FROM `zamowienia`";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        $ilosc_zamowien = $row[0];
        
        $zamowienia = array();
        for($i = 0;$i<$ilosc_zamowien;$i++){
            $zamowienia[$i] = $_POST['zamowienie'.$i];
        }
        foreach($zamowienia as $z){
        if($z != 0){
            $nr = explode("/",$z)[0];
            $tn = explode("/",$z)[1];
            $sql = "UPDATE `zamowienia` SET `realizacja`=".$tn." WHERE `nr_zamowienia` =".$nr;
            mysqli_query($db,$sql);
            }
        }
        header("Location:admin-panel.php");
    }
    
?>
