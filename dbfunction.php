<?php
    function dbConnect(){
        try{
            $db=mysqli_connect('localhost', 'root', '', 'btgames');
            return $db;
        }

        catch (Exception $error)
        {
            echo 'Błąd połączenia z bazą';
        }
    }
?>