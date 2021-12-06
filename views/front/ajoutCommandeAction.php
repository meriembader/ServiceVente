<?php

    
    include_once "../../Controller/CommandeC.php";
    include_once "../../Model/Commande.php";
   
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
    // Check if the Commande id exists, for example update.php?id=1 will get the Commande with the id of 1
   
        if (!empty($_POST)) {
            $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
            $nomUser = isset($_POST['nomUser']) ? $_POST['nomUser'] : '';
            $prenomUser = isset($_POST['prenomUser']) ? $_POST['prenomUser'] : '';
            $addresse = isset($_POST['addresse']) ? $_POST['addresse'] : '';
            $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
            $id_produit = isset($_POST['id_produit']) ? $_POST['id_produit'] : '';
            $quantite = isset($_POST['quantite']) ? $_POST['quantite'] : '';
            $modeLivraison = isset($_POST['modeLivraison']) ? $_POST['modeLivraison'] : '';
            $modePaiement = isset($_POST['modePaiement']) ? $_POST['modePaiement'] : '';
            $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';

            
            $stmt = $pdo->prepare('INSERT INTO commande VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?)');
            $stmt->execute([$id, $nomUser, $prenomUser, $addresse, $telephone, $id_produit,$quantite, $modeLivraison,  $modePaiement,  $mail, $status]);
            // Output messaddresse
            $msg = 'Created Successfully!';
        }


    
?>
 