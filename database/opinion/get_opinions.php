<?php
require_once '../database/config_database.php';
require_once 'opinion.php';

function getOpinions() {


    global $dsn, $username, $password, $options;

    try {
        // Connexion à la base de données
        $pdo = new PDO($dsn, $username, $password, $options);
        
        // Vérifie si la table 'opinion' existe
        $result = $pdo->query("SHOW TABLES LIKE 'opinion'");
        if ($result === false || $result->rowCount() == 0) {
            throw new Exception("La table 'opinion' n'existe pas.");
        }

        // Récupère les opinions visibles
        $sql = "SELECT name_visitor, visitor_opinion, created_at FROM opinion WHERE is_visible = 1 ORDER BY created_at";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $opinions = [];
        while ($opinion = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($opinion['created_at']);
            $formattedDate = $date->format('l d F Y à H:i'); 
            $opinions[] = [
                'nameVisitor' => htmlspecialchars($opinion['name_visitor']),
                'visitorOpinion' => htmlspecialchars($opinion['visitor_opinion']),
                'createdAt' => htmlspecialchars($formattedDate)
            ];
        }

        return $opinions;

    } catch (PDOException $e) {
        // Gère les erreurs de connexion à la base de données
        echo json_encode(["error" => "Erreur de connexion à la base de données : " . $e->getMessage()]);
        exit;
    } catch (Exception $e) {
        // Gère les autres exceptions
        echo json_encode(["error" => $e->getMessage()]);
        exit;
    }
}

// Récupère les opinions et encode en JSON pour utilisation par le fichier HTML



