<?php
require '../config_database.php';
require 'opinion.php';


$offset = 0;
$limit = 3;
function fetchOpinions($offset, $limit) {
    global $dsn, $username, $password, $options;

    try {
        // Connexion à la base de données
        $pdo = new PDO($dsn, $username, $password, $options);

        // Préparation de la requête SQL
        $stmt = $pdo->prepare("SELECT * FROM opinion WHERE is_visible = 1 ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    } catch (PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}





$opinions = fetchOpinions($offset, $limit);
echo json_encode($opinions);