<?php
    session_start();
    @require_once('dbfunction.php');
    $db = dbConnect();  
    $kn = $_SESSION['account'];
    $id_gry = $_GET['id_gry'];
    $sql = "SELECT * FROM `gry` WHERE id_gry=".$id_gry;
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $ilosc = $row[2]+1;
    $sql2 = "UPDATE `gry` SET `ilosc_produktu` = $ilosc WHERE `gry`.`id_gry`=".$id_gry;
    mysqli_query($db,$sql2);
    $sql = "DELETE FROM `koszyk` WHERE koszyk_id = ".$_GET['id'];
    mysqli_query($db, $sql);
    header("Location: koszyk.php")
?>