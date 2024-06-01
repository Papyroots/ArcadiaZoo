<?php
require_once "../database/config_database.php";
require_once "service.php";

function getServices()
{
    global $dsn, $username, $password, $options;

    try {
        // Connexion à la base de données
        $pdo = new PDO($dsn, $username, $password, $options);

        // Vérifie si la table 'service' existe
        $result = $pdo->query("SHOW TABLES LIKE 'service'");
        if ($result === false || $result->rowCount() == 0) {
            throw new Exception("La table 'service' n'existe pas.");
        }

        // Récupère les services
        $sql = "SELECT service_id, name_service, description_service, created_at, updated_at FROM service ORDER BY created_at";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $services = [];
        while ($service = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $services[] = new Service(
                $service['service_id'],
                htmlspecialchars($service['name_service']),
                htmlspecialchars($service['description_service']),
                $service['created_at'],
                $service['updated_at']
            );
        }

        return $services;
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