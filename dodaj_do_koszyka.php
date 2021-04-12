<?php
    session_start();
    if(isset($_SESSION['account'])){
    $id = $_GET['id'];
    $sql = "select * from gry where id_gry = ".$id;
    @require_once('dbfunction.php');
    $db = dbConnect();  
    $wynik = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($wynik);
    $kn = $_SESSION['account'];
    $sql = "INSERT INTO koszyk VALUE (NULL,'$kn','$row[0]')";
    $zap = mysqli_query($db, $sql);
    $ilosc = $row[2]-1;
    $sql2 = "UPDATE `gry` SET `ilosc_produktu` = $ilosc WHERE `gry`.`id_gry`=".$id;
    mysqli_query($db,$sql2);
    header("Location: produkt.php?id=$id");
    }else{
    header("Location: zaloguj.php?k=1&id=$id");
    }
?>