<?php

    
    include_once "../../../../Controller/PaiementC.php";
    include_once "../../../../Model/paiement.php";
   
    function pdo_connect_mysql() {
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'ventebd';
        try {
            return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        } catch (PDOException $exception) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to database!');
        }
    }
    $msg = '';   
    $pdo = pdo_connect_mysql();
    // Check if the paiement id exists, for example update.php?id=1 will get the paiement with the id of 1
   
        if (!empty($_POST)) {
            $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
            $commandeRef = isset($_POST['commandeRef']) ? $_POST['commandeRef'] : '';
            $produit = isset($_POST['produit']) ? $_POST['produit'] : '';
            $prix = isset($_POST['prix']) ? $_POST['prix'] : '';
            $date = isset($_POST['date']) ? $_POST['date'] : '';
            $mode = isset($_POST['mode']) ? $_POST['mode'] : '';
            
            $stmt = $pdo->prepare('INSERT INTO paiement VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$id, $commandeRef, $produit, $prix, $date, $mode]);
            // Output messprix
            $msg = 'Created Successfully!';
        }


    
?>
 